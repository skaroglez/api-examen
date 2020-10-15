<?php 
    namespace App\Services\Catalogs;

    use App\Models\Catalogs\CategoriesList;

    use App\EntityFields\Catalogs\CategoriesListFields;
    use App\EntityFields\Configuration\StatusFields;  

    class CategoriesListService 
    {
        private $categoriesListModel;

        private $categoriesListFields;
        private $statusFields;            

        public function __construct(){
            $this->categoriesListModel = new CategoriesList;

            $this->categoriesListFields = new CategoriesListFields;
            $this->statusFields = new StatusFields;               
        }
      
        public function getById( $id ){
            $category =  $this->categoriesListModel
                ->select( $this->categoriesListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereIdCategory($id)
                ->get();
            return $category;
        }


        public function getByParams( $request ) {
            $categories = $this->categoriesListModel
                ->select($this->categoriesListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus();

            if( $request->desCategory ) {
                $categories->whereDesCategory( $request->desCategory );
            } 
            if( $request->idStatus ) {
                $categories->whereStatus( $request->idStatus );
            }
            $categories->orderById();
            return $categories->paginate(10);
        }

        public function save( $request ){
            $categoryValues = $this->categoriesListFields->getValuesAssingned($request->all());
            $category = $this->categoriesListModel->create($categoryValues);
                        
            return array('idCategory' => $category->id);         
        }

        public function update( $request, $id ){
            $categoryValues = $this->categoriesListFields->getValuesAssingned($request->all() );
            $category = $this->categoriesListModel->findOrFail( $id );
            $category->update( $categoryValues );

            return $category;
        }

        public function getActives(){
            return  $this->categoriesListModel
                ->select( $this->categoriesListFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereStatus( $this->statusFields->active )
                ->orderByDes()
                ->get();
        }
 
        

        public function exists($request){
              $category = $this->categoriesListModel
                ->select($this->categoriesListFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereDesCategoryExact($request->desCategory);
                
                if($request->idCategory){
                    $category->whereIsDifferentIdCategory($request->idCategory);
                }
               return $category->get();
        }
    }