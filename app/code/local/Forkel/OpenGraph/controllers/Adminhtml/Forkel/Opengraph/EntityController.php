<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Adminhtml_Forkel_OpenGraph_EntityController extends Mage_Adminhtml_Controller_Action
{
    protected $_model = Forkel_OpenGraph_Helper_Data::MODEL_ENTITY;

    /**
     * Initialize action
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('forkel/testimonials_entity');

        return $this;
    }

    /**
     * Ajax action
     *
     * Work with data coming from AJAX request and repsonse.
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
     * New action
     *
     * Redirect to action "edit"
     *
     * @return void
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_title($this->hlpr()->__('Customer'))->_title($this->hlpr()->__('Forkel OpenGraph'));
        $this->_initAction()->renderLayout();
    }

    /**
     * Edit action
     *
     * Load data to the edit form
     *
     * @return void
     */
    public function editAction()
    {
        $this->_initAction();

        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getSingleton($this->_model);

        if ($id)
        {
            $model->load($id);

            if (!$model->getId())
            {
                Mage::getSingleton('adminhtml/session')->addError($this->hlpr()->__('The requested Forkel OpenGraph no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : $this->hlpr()->__('New Forkel OpenGraph'));

        $data = Mage::getSingleton('adminhtml/session')->getEntityData(true);

        if (!empty($data))
        {
            $model->setData($data);
        }

        Mage::register(Forkel_OpenGraph_Helper_Data::MODULE_KEY, $model);

        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('forkel_opengraph/adminhtml_entity_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    /**
     * Save action
     *
     * Save or update model.
     *
     * @return void
     */
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost())
        {
            try
            {
                $model = Mage::getSingleton($this->_model);
                $model->setData($postData);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->hlpr()->__('The record with ID ( %s ) has been saved.', $model->getId()));
                $this->_redirect('*/*/');

                return;
            }

            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }

            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->hlpr()->__('An error occurred while saving this record.'));
            }
        }
    }

    /**
     * Delete action
     *
     * @return void
     */
    public function deleteAction()
    {
        $id = filter_var($this->getRequest()->getParam('id'), FILTER_VALIDATE_INT);

        if (!$id)
        {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select one record.'));
        }
        else
        {
            try
            {
                $model = Mage::getSingleton($this->_model);
                $model->load($id);

                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The selected record was successfully deleted.'));
            }

            catch (Mage_Core_Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }

            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while deletion.'));
            }
        }

        $this->_redirect('*/*/index');
    }

    /**
     * Check the permissions for current backend user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/forkel/opengraph');
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
