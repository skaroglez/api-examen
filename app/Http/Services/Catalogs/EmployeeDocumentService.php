<?php 
    namespace App\Services\Catalogs;

    use App\EntityFields\Catalogs\EmployeeDocumentFields;
    use App\Models\Catalogs\EmployeeDocument;

    class EmployeeDocumentService 
    {
        private $employeeDocumentFields;
        private $employeeDocumentModel;

        public function __construct() {
            $this->employeeDocumentModel       = new EmployeeDocument;
            $this->employeeDocumentFields      = new EmployeeDocumentFields;
            $this->documentData = [];
        }
        
        public function getAll(){
            return  $this->employeeDocumentModel
                ->select($this->employeeDocumentFields->getFieldsValuesAdd($this->documentData))
                ->paginate(5);
        }
        
        public function getById( $id ){
            $client =  $this->employeeDocumentModel
                ->select( $this->employeeDocumentFields->getFieldsValuesAdd($this->documentData))
                ->whereIdEmployee($id )
                ->get();
            return $client;
        }

        public function save( $request ) {
            $documentsValues = $this->employeeDocumentFields->getValuesAssingned( $request );
            $document = $this->employeeDocumentModel->create($documentsValues);

            return $document;
        }

        public function update( $request, $id ){
            $documentsValues = $this->employeeDocumentFields->getValuesAssingned( $request );
            $document = $this->employeeDocumentModel->findOrFail( $id );
            $document->update( $documentsValues );

            return $document;
        }
        public function delete( $request ){
            $documentsValues = $this->employeeDocumentFields->getValuesAssingned( $request );
            $document = $this->employeeDocumentModel->whereIdEmployee( $request->idEmployee );
            $document->delete( $documentsValues );

            return $document;
        }
    }