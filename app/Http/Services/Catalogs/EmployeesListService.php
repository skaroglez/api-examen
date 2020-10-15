<?php 
    namespace App\Services\Catalogs;

    use App\Models\Catalogs\EmployeesList;

    use App\EntityFields\Catalogs\EmployeesListFields;
    use App\EntityFields\Catalogs\JobsFields;
    use App\EntityFields\Configuration\SchedulesFields;
    use App\EntityFields\Configuration\StatusFields;  

    class EmployeesListService 
    {
        private $employeesListModel;

        private $employeesListFields;
        private $jobsFields;
        private $schedulesFields;
        private $statusFields;            

        public function __construct(){
            $this->employeesListModel = new EmployeesList;

            $this->employeesListFields = new EmployeesListFields;
            $this->jobsFields = new JobsFields;
            $this->schedulesFields = new SchedulesFields;
            $this->statusFields = new StatusFields;               
        }
      
        public function getById( $id ){
            $employee =  $this->employeesListModel
                ->select( $this->employeesListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereIdEmployee($id)
                ->get();
            return $employee;
        }


        public function getByParams( $request ) {
            $employees = $this->employeesListModel
                ->select($this->employeesListFields->getFieldsValuesAdd([
                        $this->statusFields->nameStatus,
                        $this->jobsFields->desJob,
                        $this->schedulesFields->desSchedule
                    ]))
                ->joinStatus()
                ->joinJobs()
                ->joinSchedules();

            if( $request->firstName ) {
                $employees->whereFirstName( $request->firstName );
            } 
            if( $request->middleName ) {
                $employees->whereMiddleName( $request->middleName );
            } 
            if( $request->lastName ) {
                $employees->whereLastName( $request->lastName );
            } 
            if( $request->secondLastName ) {
                $employees->whereSecondLastName( $request->secondLastName );
            } 
            if( $request->idStatus ) {
                $employees->whereStatus( $request->idStatus );
            }
            $employees->orderById();
            return $employees->paginate(10);
        }

        public function save( $request ){
            $employeeValues = $this->employeesListFields->getValuesAssingned($request->all());
            $employee = $this->employeesListModel->create($employeeValues);
                        
            return array('idEmployee' => $employee->id);         
        }

        public function update( $request, $id ){
            $employeeValues = $this->employeesListFields->getValuesAssingned($request->all() );
            $employee = $this->employeesListModel->findOrFail( $id );
            $employee->update( $employeeValues );

            return $employee;
        }

        public function exists($request){
              $employee = $this->employeesListModel
                ->select($this->employeesListFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereFirstNameExact($request->firstName)
                ->whereMiddleNameExact($request->middleName)
                ->whereLastNameExact($request->lastName)
                ->whereSecondLastNameExact($request->secondLastName);
                
                if($request->idEmployee){
                    $employee->whereIsDifferentIdEmployee($request->idEmployee);
                }
               return $employee->get();
        }
    }