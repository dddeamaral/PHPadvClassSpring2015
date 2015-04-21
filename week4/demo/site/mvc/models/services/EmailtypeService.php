<?php

/**
 * Description of EmailtypeService
 *
 * @author 001327813
 */
namespace App\models\services;

use App\models\interfaces\IService;

class EmailtypeService implements IService {
    
    function getEmail(){
     return 'test@test.com';   
    }
    
}
