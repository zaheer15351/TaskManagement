<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 8:17 PM
 */

class Maxpronko_TaskManagement_Model_Tasks extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('taskmanagement/tasks');
    }
}