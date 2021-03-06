<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Frontend_Form extends Mage_Core_Block_Template
{
    /**
     * Return all rating options
     *
     * @return array
     */
    public function getRatingOptions()
    {
        $collection = Mage::getModel('forkel_testimonials/rating')->getCollection();

        return $collection;
    }
}
