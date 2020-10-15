<?php 
    namespace App\Services\Catalogs;

    use App\Models\Catalogs\ProductList;

    use App\EntityFields\Catalogs\ProductListFields;
    use App\EntityFields\Catalogs\CategoriesListFields;
    use App\EntityFields\Configuration\StatusFields;  

    class ProductListService 
    {
        private $productListModel;

        private $productListFields;
        private $categoriesListFields;
        private $statusFields;            

        public function __construct(){
            $this->productListModel = new ProductList;
            $this->productListFields = new ProductListFields;
            $this->categoriesListFields = new CategoriesListFields;
            $this->statusFields = new StatusFields;               
        }
      
        public function getById( $id ){
            $product =  $this->productListModel
                ->select( $this->productListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->joinCategories()
                ->whereIdProduct($id)
                ->get();
            return $product;
        }


        public function getByParams( $request ) {
            $products = $this->productListModel
                ->select($this->productListFields->getFieldsValuesAdd([
                    $this->statusFields->nameStatus,
                    $this->categoriesListFields->desCategory
                    ]))
                ->joinStatus()
                ->joinCategories();

            if( $request->desProduct ) {
                $products->whereDesProduct( $request->desProduct );
            } 
            if( $request->idStatus ) {
                $products->whereStatus( $request->idStatus );
            }
            if( $request->idCategory ) {
                $products->whereIdCategory( $request->idCategory );
            } 

            $products->orderByDesCategry()->orderById();
            return $products->paginate(10);
        }

        public function save( $request ){
            $productValues = $this->productListFields->getValuesAssingned($request->all());
            $product = $this->productListModel->create($productValues);
                        
            return array('idProduct' => $product->id);         
        }

        public function update( $request, $id ){
            $productValues = $this->productListFields->getValuesAssingned($request->all() );
            $product = $this->productListModel->findOrFail( $id );
            $product->update( $productValues );

            return $product;
        }

        public function getActives(){
            return  $this->productListModel
                ->select( $this->productListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->joinCategories()
                ->whereStatus( $this->statusFields->active )
                ->orderByDes()
                ->get();
        }
 
        public function getActivesByIdCategory($idCategory){
            return  $this->productListModel
                ->select( $this->productListFields->getFieldsValuesAdd([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->joinCategories()
                ->whereStatus( $this->statusFields->active )
                ->whereIdCategory($idCategory)
                ->paginate(10);
        }

        public function exists($request){
              $product = $this->productListModel
                ->select($this->productListFields->getFieldsValues([$this->statusFields->nameStatus]))
                ->joinStatus()
                ->whereDesProductExact($request->desProduct);
                
                if($request->idProduct){
                    $product->whereIsDifferentIdProduct($request->idProduct);
                }
                if($request->idCategory){
                    $product->whereIdCategory($request->idCategory);
                }
               return $product->get();
        }
    }