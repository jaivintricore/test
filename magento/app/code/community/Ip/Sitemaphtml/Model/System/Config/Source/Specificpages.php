<?php
/* 
 * Author Ivan Proskuruakov - magazento.com
 * Copyright: Ivan Proskuruakov. magazento.com © 2011. All Rights Reserved.
 * Single Use, Limited License and Single Use No Resale License ["Single Use"]
 */
class Ip_Sitemaphtml_Model_System_Config_Source_Specificpages
 {
    protected $_options;

    public function toOptionArray($isMultiselect)
    {
       if (!$this->_options) {
            $this->_options = Mage::getResourceModel('cms/page_collection')
                ->addFieldToFilter('identifier',array(array('nin'=>array('no-route','enable-cookies'))))
                ->load()->toOptionArray();
        }

        return $this->_options;
    }
 }