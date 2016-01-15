<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Model_Entity extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init(Forkel_OpenGraph_Helper_Data::MODEL_ENTITY);
    }
}
