<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_OpenGraph_Block_Adminhtml_Entity_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();

        $this->setDefaultSort('id');
        $this->setId('forkel_opengraph_entity_grid');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Get collection class
     *
     * Return collection path as a string.
     *
     * @return string
     */
    protected function _getCollectionClass()
    {
        return 'forkel_opengraph/entity_collection';
    }

    /**
     * Prepare collection
     *
     * Extend collection with joins to other resources.
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * Add columns to the grid.
     *
     * @return Forkel_OpenGraph_Block_Adminhtml_Entity_Grid
     */
    protected function _prepareColumns()
    {
        $helper = Mage::helper(Forkel_OpenGraph_Helper_Data::MODULE_KEY);

        $this->addColumn('id',
            [
                'header' => $helper->__('ID'),
                'align' => 'right',
                'width' => '50px',
                'index' => 'id'
            ]
        );

        $this->addColumn('comment',
            [
                'header'    => $helper->__('Comment'),
                'index'     => 'comment'
            ]
        );

        $this->addColumn('title',
            [
                'header'    => $helper->__('Title'),
                'index'     => 'title'
            ]
        );

        $this->addColumn('description',
            [
                'header'    => $helper->__('Description'),
                'index'     => 'description'
            ]
        );

        $this->addColumn('url',
            [
                'header'    => $helper->__('Url'),
                'index'     => 'url'
            ]
        );

        $this->addColumn('image',
            [
                'header'    => $helper->__('Image'),
                'index'     => 'image'
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * Get URL for a specific row
     *
     * Return the "edit" form url for each row.
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}
