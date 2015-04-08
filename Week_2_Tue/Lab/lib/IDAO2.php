<?php
/**
 *
 * @author 001327813
 */
interface IDAO2 {
      
    public function getById($id);
    
    public function delete($id); 
    
    public function save(IModel $model);

    public function getAllRows();
}
