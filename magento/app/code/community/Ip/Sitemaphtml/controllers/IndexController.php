<?php
class Ip_Sitemaphtml_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	$this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('page/1column.phtml');
        $this->renderLayout();
    }
    
    
    public function pageAction()
    {
    	$this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('page/1column.phtml');
        $this->renderLayout();
    }
    public function categoryAction()
    {
    	$this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('page/1column.phtml');
        $this->renderLayout();
    }
    public function productAction()
    {
    	$this->loadLayout();
        $this->getLayout()->getBlock('root')->setTemplate('page/1column.phtml');
        $this->renderLayout();
    }
}