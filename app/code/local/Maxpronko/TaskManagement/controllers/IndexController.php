<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 7:33 PM
 */

class Maxpronko_TaskManagement_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
        $this->loadLayout();
        $this->renderLayout();

    }

}