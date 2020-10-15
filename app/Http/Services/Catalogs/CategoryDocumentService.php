<?php 
    namespace App\Services\Catalogs;

    use App\EntityFields\Catalogs\CategoryDocumentFields;
    use App\Models\Catalogs\CategoryDocument;

    class CategoryDocumentService 
    {
        private $categoryDocumentFields;
        private $categoryDocumentModel;

        public function __construct() {
            $this->categoryDocumentModel       = new CategoryDocument;
            $this->categoryDocumentFields      = new CategoryDocumentFields;
            $this->documentData = [];
        }
        
        public function getAll(){
            return  $this->categoryDocumentModel
                ->select($this->categoryDocumentFields->getFieldsValuesAdd($this->documentData))
                ->paginate(5);
        }
        
        public function getById( $id ){
            $client =  $this->categoryDocumentModel
                ->select( $this->categoryDocumentFields->getFieldsValuesAdd($this->documentData))
                ->whereIdCategory($id )
                ->get();
            return $client;
        }

        public function save( $request ) {
            $documentsValues = $this->categoryDocumentFields->getValuesAssingned( $request );
            $document = $this->categoryDocumentModel->create($documentsValues);

            return $document;
        }

        public function update( $request, $id ){
            $documentsValues = $this->categoryDocumentFields->getValuesAssingned( $request );
            $document = $this->categoryDocumentModel->findOrFail( $id );
            $document->update( $documentsValues );

            return $document;
        }
        public function delete( $request ){
            $documentsValues = $this->categoryDocumentFields->getValuesAssingned( $request );
            $document = $this->categoryDocumentModel->whereIdCategory( $request->idCategory );
            $document->delete( $documentsValues );

            return $document;
        }
    }