<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/28/2018
 * Time: 4:08 PM
 */

class Maxpronko_TaskManagement_ActionsController extends Mage_Core_Controller_Front_Action
{
    /**
     * Renders Edit action page
     */
    public function EditAction()
    {
        $this->loadLayout();
        $this->renderLayout();

    }

    /**
     * Delete task action
     */
    public function DeleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $task = Mage::getModel('taskmanagement/tasks')
                ->load($id);
            try {
                $task->delete();
                Mage::getSingleton('core/session')->addSuccess($this->__('Task has been deleted!'));
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError($e->getMessage());
            }
        }
        $this->getResponse()
            ->setRedirect(Mage::getUrl('*/'));
    }

    /**
     * Renders Add action page
     */
    public function AddAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * @return Mage_Core_Controller_Varien_Action
     */
    public function saveTaskAction()
    {
        if (!$this->_validateFormKey()) {
            return $this->_redirect('*/*/');
        }
        if ($this->getRequest()->isPost()) {
            $error = false;
            $dateValidator = new Zend_Validate_Date('yyyy-MM-dd h:m');
            $postData = $this->getRequest()->getPost();

            if (!Zend_Validate::is($postData['name'], 'NotEmpty')) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('Task name is required'));
            }
            if (!Zend_Validate::is($postData['assigned_to'], 'NotEmpty')) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('Assignee is required'));
            }
            if (!Zend_Validate::is($postData['status'], 'NotEmpty')) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('Status is required'));
            }
            if (!Zend_Validate::is($postData['start_time'], 'NotEmpty')) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('Start date is required'));
            }
            if (!Zend_Validate::is($postData['end_time'], 'NotEmpty')) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('End date is required'));
            }
            if (!$dateValidator->isValid($postData['start_time'])) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('Start date is not valid date time'));
            }
            if (!$dateValidator->isValid($postData['end_time'])) {
                $error = true;
                Mage::getSingleton('core/session')->addError($this->__('End date is not valid date time'));
            }
            if ($error) {
                $this->_redirectReferer();
                return;
            }

            $taskModel = Mage::getModel('taskmanagement/tasks');
            if ($id = $this->getRequest()->getParam('id')) {
                $taskModel->load($id);

            }
            try {
                $taskModel->setName($postData['name']);
                $taskModel->setDescription($postData['description']);
                $taskModel->setAssignedTo($postData['assigned_to']);
                $taskModel->setStatus($postData['status']);
                $taskModel->setStartTime($postData['start_time']);
                $taskModel->setEndTime($postData['end_time']);
                $taskModel->save();
                Mage::getSingleton('core/session')->addSuccess($this->__('Task has been saved!'));

            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError($e->getMessage());
            }

        }
        $this->getResponse()
            ->setRedirect(Mage::getUrl('*/'));

    }

}