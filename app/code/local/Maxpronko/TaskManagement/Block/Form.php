<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/28/2018
 * Time: 5:33 PM
 */

class Maxpronko_TaskManagement_Block_Form extends Mage_Core_Block_Template
{
    /**
     * @return string
     * @throws Exception
     */
    public function getSaveUrl()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            return $this->getUrl('taskmanagement/actions/saveTask', ['id' => $id]);
        } else {
            return $this->getUrl('taskmanagement/actions/saveTask');
        }
    }

    /**
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('taskmanagement');
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getTaskInformation()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            return Mage::getModel('taskmanagement/tasks')->load($id)->getData();
        }
    }
}