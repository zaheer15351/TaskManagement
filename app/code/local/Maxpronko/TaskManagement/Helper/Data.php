<?php

/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 7:40 PM
 */
class Maxpronko_TaskManagement_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @return string
     */
    public function getTasksManagementUrl()
    {
        return Mage::getUrl('taskmanagement');
    }
}