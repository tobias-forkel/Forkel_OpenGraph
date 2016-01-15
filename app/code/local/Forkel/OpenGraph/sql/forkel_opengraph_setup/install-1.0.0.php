<?php
/**
 * Forkel OpenGraph
 *
 * @category    Forkel
 * @package     Forkel_OpenGraph
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

$installer = $this;
$installer->startSetup();

/**
 * Create table 'forkel_opengraph/entity'
 */
$table = $installer->getTable('forkel_opengraph/entity');
if ($installer->getConnection()->isTableExists($table) != true)
{
    $table = $installer->getConnection()
        ->newTable($table)
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ], 'Identity')
        ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', [
        ], 'Comment')
        ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
        ], 'Title')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
        ], 'Description')
        ->addColumn('url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
        ], 'Url')
        ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
        ], 'Image')
        ->setComment('Forkel OpenGraph > Entity');
    $installer->getConnection()->createTable($table);
}
