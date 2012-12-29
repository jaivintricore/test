<?php
/*
 * Author Ivan Proskuruakov - magazento.com
 * Copyright: Ivan Proskuruakov. magazento.com © 2011. All Rights Reserved.
 * Single Use, Limited License and Single Use No Resale License ["Single Use"]
 */
class Ip_Sitemaphtml_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getSitemaphtmlUrl() {
        return $this->_getUrl('sitemaphtml');
    }

}