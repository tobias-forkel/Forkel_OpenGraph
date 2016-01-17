<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     * Index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->hlpr()->__('Forkel OpenGraph'));
        $this->_initLayoutMessages('customer/session');

        $this->renderLayout();
    }

    /**
     * Ajax action
     *
     * @return void
     */
    public function ajaxAction()
    {
        $this->getResponse()->setHeader('Content-type', 'application/json');

        if (strpos(Mage::helper('core/http')->getHttpReferer(), Mage::getBaseUrl()) === false)
        {
            exit();
        }

        if ($postData = $this->getRequest()->getPost())
        {
            // Values from comment field
            $comment = $postData['comment'];

            $response = $this->hlpr()->getUrl($comment);
        }

        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
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