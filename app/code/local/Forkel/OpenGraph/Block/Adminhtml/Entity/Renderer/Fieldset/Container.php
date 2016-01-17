<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Adminhtml_Entity_Renderer_Fieldset_Container extends Varien_Data_Form_Element_Abstract
{

    /**
     * Element Html
     *
     * Return the value for custom fieldset type.
     *
     * @return string Label
     */
    public function getElementHtml()
    {
        return '<div id="container"></div>';
    }
}
