<?php

    namespace App\Services\Configuration;

    use App\Models\Configuration\PermissionType;
    use App\EntityFields\Configuration\PermissionTypeFields;
    use App\EntityFields\Configuration\StatusFields;


    class PermissionTypeService {
        private $permissionTypeModel;
        private $permissionTypeFields;
        private $statusFields;

        public function __construct(){
            $this->permissionTypeModel = new PermissionType;
            $this->permissionTypeFields = new PermissionTypeFields;
            $this->statusFields = new StatusFields;
        }

        public function getActives() {
            return $this->permissionTypeModel
                ->select( $this->permissionTypeFields->getFieldsValues() )
                ->whereStatus( $this->statusFields->active )
                ->get();
        }
    }