<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

require_once(Mage::getBaseDir('lib') . DS . 'OpenGraph/OpenGraph.php');

class Forkel_OpenGraph_Helper_Data extends Mage_Core_Helper_Abstract
{
    const MODULE_KEY            = 'forkel_opengraph';
    const MODEL_ENTITY          = 'forkel_opengraph/entity';
    const DATE_FORMAT           = 'yyyy-M-d H:mm';

    const URL_REGEX             = '/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';

    /**
     * Extract URL from a string and fetch open graph data
     *
     * @return string
     */
    public function getUrl($string)
    {
        // Save data for AJAX response
        $response = [];

        // Extract URL from comment string
        preg_match(self::URL_REGEX, $string, $matches);

        if (!filter_var($matches[0], FILTER_VALIDATE_URL) === false)
        {
            // Fetch OpenGraph data
            $opengraph = OpenGraph::fetch($matches[0]);

            $keys = $opengraph->keys();

            // Save OpenGraph data in $response
            if (count($keys) > 0)
            {
                foreach ($keys as $key)
                {
                    $response[$key] = $opengraph->__get($key);
                }
            }
        }

        return $response;
    }
}
