<?php 
    namespace App\Services\Catalogs;

    use App\EntityFields\Catalogs\ProductDocumentFields;
    use App\Models\Catalogs\ProductDocument;

    class ProductDocumentService 
    {
        private $productDocumentFields;
        private $productDocumentModel;

        public function __construct() {
            $this->productDocumentModel       = new ProductDocument;
            $this->productDocumentFields      = new ProductDocumentFields;
            $this->documentData = [];
        }
        
        public function save( $request ) {
            $documentsValues = $this->productDocumentFields->getValuesAssingned( $request );
            $document = $this->productDocumentModel->create($documentsValues);

            return $document;
        }

        public function delete( $request ){
            $documentsValues = $this->productDocumentFields->getValuesAssingned( $request );
            $document = $this->productDocumentModel->whereIdImage( $request->idImage );
            $document->delete( $documentsValues );

            return $document;
        }
        
         public function getAllById( $id ){
            $client =  $this->productDocumentModel
                ->select( $this->productDocumentFields->getFieldsValuesAdd($this->documentData))
                ->whereIdProduct($id)
                ->paginate(5);
            return $client;
        }
    }