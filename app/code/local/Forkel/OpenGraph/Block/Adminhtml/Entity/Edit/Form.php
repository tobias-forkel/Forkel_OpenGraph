<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Adminhtml_Entity_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('forkel_opengraph_entity_form');
        $this->setTitle($this->__('Forkel OpenGraph'));
    }

    /**
     * Prepare layout
     *
     * @return void
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    /**
     * Prepare form
     *
     * Setup the form fields for inserts/updates. Add all necessary fields.
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $helper = Mage::helper(Forkel_OpenGraph_Helper_Data::MODULE_KEY);

        $model = Mage::registry(Forkel_OpenGraph_Helper_Data::MODULE_KEY);
        $customer = Mage::getModel('customer/customer')->load($model->getCustomerId());

        $form = new Varien_Data_Form([
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
            'method'    => 'post'
        ]);

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend'    => $helper->__('Edit'),
            'class'     => 'fieldset-wide',
        ]);

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', [
                'name'  => 'id',
            ]);
        };

        $fieldset->addField('comment', 'editor', [
            'name'      => 'comment',
            'label'     => $this->__('Comment'),
            'title'     => $this->__('Comment'),
            'style'     => 'height: 70px;',
            'class'     => 'forkel_opengraph_ajax',
            'note'      => 'Enter your text and paste a URL to fetch the OpenGraph data.'
        ]);

        $fieldset->addField('title', 'text', [
            'name'      => 'title',
            'label'     => $helper->__('Title'),
            'title'     => $helper->__('Title')
        ]);

        $fieldset->addField('description', 'text', [
            'name'      => 'description',
            'label'     => $helper->__('Description'),
            'title'     => $helper->__('Description')
        ]);

        $fieldset->addField('url', 'text', [
            'name'      => 'url',
            'label'     => $helper->__('Url'),
            'title'     => $helper->__('Url')
        ]);

        $fieldset->addField('image', 'text', [
            'name'      => 'image',
            'label'     => $helper->__('Image'),
            'title'     => $helper->__('Image')
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
