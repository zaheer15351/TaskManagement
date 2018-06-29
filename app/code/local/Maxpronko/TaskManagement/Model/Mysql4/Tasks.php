<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 8:18 PM
 */

class Maxpronko_TaskManagement_Model_Mysql4_Tasks extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('taskmanagement/tasks', 'id');
    }
}