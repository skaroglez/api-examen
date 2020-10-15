<?php
    namespace App\Traits;

    trait FieldsTrait {
        private $fieldsAS = [];
        
        private function createFieldAS( ){
            foreach ($this->fields as $key => $value) {             
                if( $this->table ){
                    $key = "$this->table.$key";
                }
                $this->fieldsAS[$value] = "$key AS $value";
                $this->{$value} = "$key AS $value";             
            }
        }

        public function getFieldsValues(){
            $fields = [];
            foreach ($this->fieldsAS as $key => $value) {
                $fields[] = $value;
            }
            return $fields;
        }

        public function getFieldsValuesAdd( $values ){
            $fields = $this->getFieldsValues();
            foreach ($values as $value) {
                $fields[] = $value;
            }
            return $fields;
        }

        public function getValuesAssingned( $values ){
            $fields = [];
            $_fields = $this->fields;
            foreach ($values as $key => $value) {
                foreach ($_fields as $keyField => $valueField) {
                    if( $key == $valueField ){
                        $fields[$keyField] = $value;
                        unset($_fields[$keyField]);
                        break;
                    }
                }
            }
            return $fields;
        }

    }