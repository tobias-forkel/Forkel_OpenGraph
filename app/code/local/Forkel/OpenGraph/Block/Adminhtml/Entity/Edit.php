<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Adminhtml_Entity_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        parent::_construct();

        $this->_blockGroup = Forkel_OpenGraph_Helper_Data::MODULE_KEY;
        $this->_controller = 'adminhtml_entity';

        $this->_updateButton('save', 'label', $this->hlpr()->__('Save'));
    }

    /**
     * Get header text
     *
     * Check if global id exists. Return text for "edit" or "new".
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry(Forkel_OpenGraph_Helper_Data::MODULE_KEY)->getId())
        {
            return $this->hlpr()->__('Forkel OpenGraph > Edit');
        }

        return $this->hlpr()->__('Forkel OpenGraph > New');
    }

    /**
     * Return helper
     *
     * @return Forkel_OpenGraph_Helper_Data
     */
    protected function hlpr()
    {
        return Mage::helper(Forkel_OpenGraph_Helper_Data::MODULE_KEY);
    }
}
