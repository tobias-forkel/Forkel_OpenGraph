<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Adminhtml_Entity extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $helper = Mage::helper(Forkel_OpenGraph_Helper_Data::MODULE_KEY);

        $this->_blockGroup = Forkel_OpenGraph_Helper_Data::MODULE_KEY;
        $this->_controller = 'adminhtml_entity';
        $this->_headerText = $helper->__('Forkel OpenGraph');

        parent::__construct();
    }
}
