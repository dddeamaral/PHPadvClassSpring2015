<?php
namespace API\models\services;

use API\models\interfaces\IDAO;
use API\models\interfaces\IService;
use API\models\interfaces\IModel;

class PhoneTypeService implements IService {
    
     protected $DAO;
     protected $validator;
     protected $model;
             
     function getValidator() {
         return $this->validator;
     }

     function setValidator($validator) {
         $this->validator = $validator;
     }

     function getModel() {
         return $this->model;
     }

     function setModel(IModel $model) {
         $this->model = $model;
     }
     
     
     function getDAO() {
         return $this->DAO;
     }

     function setDAO(IDAO $DAO) {
         $this->DAO = $DAO;
     }

    public function __construct( IDAO $PhoneTypeDAO, IService $validator,IModel $model  ) {
        $this->setDAO($PhoneTypeDAO);
        $this->setValidator($validator);
        $this->setModel($model);
    }
    
    
    public function getAllRows($limit = "", $offset = "") {
        return $this->getDAO()->getAllRows($limit, $offset);
    }
    
    public function idExist($id) {
        return $this->getDAO()->idExisit($id);
    }
    
    public function read($id) {
        return $this->getDAO()->read($id);
    }
    
    public function delete($id) {
        return $this->getDAO()->delete($id);
    }
    
    public function create(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->create($model);
        }
        return false;
    }
    
    public function update(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->update($model);
        }
        return false;
    }
    
    public function validate( IModel $model ) {
        $errors = array();
        if ( !$this->getValidator()->phoneTypeIsValid($model->getPhonetype()) ) {
            $errors[] = 'Phone Type is invalid';
        }
               
        if ( !$this->getValidator()->activeIsValid($model->getActive()) ) {
            $errors[] = 'Phone active is invalid';
        }
       
        
        return $errors;
    }
    
    
    public function getNewPhoneTypeModel() {
        return clone $this->getModel();
    }
    
    
}
