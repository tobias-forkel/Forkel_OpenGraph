<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Helper_Data extends Mage_Core_Helper_Abstract
{
    const MODULE_KEY            = 'forkel_opengraph';
    const MODEL_ENTITY          = 'forkel_opengraph/entity';

    const DATE_FORMAT           = 'yyyy-M-d H:mm';

    /**
     * Extract URL from a string
     *
     * @return string
     */
    public function getUrl($string)
    {
        preg_match_all('(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])', $string, $matches);

        return ( $matches[0]);
    }
}
