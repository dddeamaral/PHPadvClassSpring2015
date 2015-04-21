<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emailTypeController
 *
 * @author 001327813
 */
namespace APP\Controller;

use App\models\interfaces\IController;
use App\models\interfaces\IService;

class emailTypeController extends BaseController implements IController {
   
    private $emailtypeservice;
    
    public function __construct(IService $emailtypeService) {
        $this->emailtypeservice = $emailtypeService;
    }


    public function execute(IService $scope) {
         
         $viewPage = 'emailtype';
         
         $this->data['email'] = $this->emailtypeservice->getEmail();
         
         $scope->view = $this->data;
         
         return $this->view($viewPage,$scope);
     }
    
}
