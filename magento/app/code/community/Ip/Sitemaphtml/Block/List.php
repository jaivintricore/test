<?php

/*
 * Author Ivan Proskuruakov - magazento.com
 * Copyright: Ivan Proskuruakov. magazento.com © 2011. All Rights Reserved.
 * Single Use, Limited License and Single Use No Resale License ["Single Use"]
 */


class Ip_Sitemaphtml_Block_List extends Mage_Core_Block_Template{

    public function getCategories() {
        return $collection = Mage::getModel('sitemaphtml/data')->getCategoryCollection();
    }
    public function getProducts() {
        return $collection = Mage::getModel('sitemaphtml/data')->getProductCollection();
    }
    public function getPages() {
        return $collection = Mage::getModel('sitemaphtml/data')->getPageCollection();
    }
    

}