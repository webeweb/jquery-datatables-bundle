<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Manager;

use Exception;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DatatablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Manager
 * @final
 */
final class DataTablesManagerTest extends AbstractFrameworkTestCase {

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface
     */
    private $dataTablesProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesManager();

        $this->assertEquals([], $obj->getProviders());
    }

    /**
     * Tests the registerProvider() method.
     *
     * @return void
     */
    public function testRegisterProvider() {

        $obj = new DataTablesManager();

        $obj->registerProvider($this->dataTablesProvider);
        $this->assertCount(1, $obj->getProviders());

        try {
            $obj->registerProvider($this->dataTablesProvider);
        } catch (Exception $ex) {
            $this->assertInstanceOf(AlreadyRegisteredDataTablesProviderException::class, $ex);
            $this->assertEquals("A DataTables provider with name \"name\" is already registered", $ex->getMessage());
        }
    }

    /**
     * Tests the getProvider() method.
     *
     * @return void
     */
    public function testGetProvider() {

        $obj = new DataTablesManager();

        $obj->registerProvider($this->dataTablesProvider);
        $this->assertEquals($this->dataTablesProvider, $obj->getProvider($this->dataTablesProvider->getName()));

        try {
            $obj->getProvider("exception");
        } catch (Exception $ex) {
            $this->assertInstanceOf(UnregisteredDataTablesProviderException::class, $ex);
            $this->assertEquals("None DataTables provider registered with name \"exception\"", $ex->getMessage());
        }
    }

}
