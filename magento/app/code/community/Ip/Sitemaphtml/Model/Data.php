<?php
/*
 * Author Ivan Proskuruakov - magazento.com
 * Copyright: Ivan Proskuruakov. magazento.com © 2011. All Rights Reserved.
 * Single Use, Limited License and Single Use No Resale License ["Single Use"]
 */
class Ip_Sitemaphtml_Model_Data {
    protected $_storeId = 0;
    
    public function __construct() {
        $this->_storeId = Mage::app()->getStore()->getId();
        $this->rootcatId = Mage::app()->getStore()->getRootCategoryId();
        $this->categories = Mage::getModel('catalog/category')->getCategories($this->rootcatId);        
    }

//    public function getCategoryCollection() {
//        $collection = Mage::getModel('catalog/category')->setStoreId( $this->_storeId )
//                        ->getCollection()
//                        ->addAttributeToSelect('name')
//                        ->addAttributeToSelect('url_path')
//                        ->addAttributeToSelect('is_active')
//                        ->addAttributeToSelect('path')
//                        ->addAttributeToSelect('include_in_menu')
//                        ->addAttributeToSelect('include_in_menu',1)                
//                        ->addAttributeToFilter('is_active', 1 )
//                        ->addAttributeToFilter('level',array('gt'=>'1'))
//                	->addOrderField('path','ASC');
//        return $collection;
//    }

    
    

    function  get_categories($categories) {
        $array= '<ul>';
        foreach($categories as $category) {
            $cat = Mage::getModel('catalog/category')->load($category->getId());
            $marginvalue = 40 * ($category['level']-2);
            $count = $cat->getProductCount();
            $array .= '<li>'.
            '<a style="margin-left:'.$marginvalue.'px;" href="' . Mage::getUrl($cat->getUrlPath()). '">' .
                    $category->getName() . "(".$count.")</a>\n";
            if($category->hasChildren()) {
                $children = Mage::getModel('catalog/category')->getCategories($category->getId());
                $array .=  $this->get_categories($children);
                }
            $array .= '</li>';
        }
        return  $array . '</ul>';
    }
    
    public function getCategoryCollection() {

        return  $this->get_categories($this->categories);  

    }

    
    
    
    public function getProductCollection() {
        $product = Mage::getModel('catalog/product');
        $products = $product->setStoreId($this->_storeId)
                        ->getCollection()
                        ->addAttributeToSelect('*')
                        ->setOrder('name', 'asc');
        $products->addAttributeToFilter('status', 1);//enabled
        $products->addAttributeToFilter('visibility', 4);//catalog, search
        $products->addAttributeToSelect('name');
        return $products;       
    }
    

    public function getPageCollection() {
        
        $pages = Mage::getModel('cms/page')->getCollection()
                        ->addStoreFilter($this->_storeId)
                        ->addFieldToFilter('identifier', array(array('nin' => array('no-route', 'enable-cookies'))));

        $specificpages = Mage::getStoreConfig('sitemap/frontend/specificpages');
        
//        var_dump($specificpages);
        
        if ($specificpages) {
            $pages_array = explode(',', $specificpages);
            $pages->addFieldToFilter('identifier', array(array('nin' => $pages_array)));
        }
        
        return $pages;
    }
}
?>
