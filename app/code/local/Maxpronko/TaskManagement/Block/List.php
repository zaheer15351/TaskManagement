<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 7:39 PM
 */
class Maxpronko_TaskManagement_Block_List extends Mage_Core_Block_Template
{
    /**
     * @return string
     */
    public function getListTitle()
    {
        return $this->__('Tasks List');
    }

    /**
     * @return Array
     */
    public function getTasksCollection()
    {
        return Mage::getModel('taskmanagement/tasks')->getCollection()->getData();
    }

    /**
     * @param $id
     * @return string
     */
    public function getTaskEditUrl($id)
    {
        return $this->getUrl('taskmanagement/actions/edit', ['id' => $id]);
    }

    /**
     * @param $id
     * @return string
     */
    public function getTaskDeleteUrl($id)
    {
        return $this->getUrl('taskmanagement/actions/delete', ['id' => $id]);
    }

    public function getAddNewTaskUrl()
    {
        return $this->getUrl('taskmanagement/actions/add');

    }
}