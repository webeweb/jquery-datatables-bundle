<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Manager;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\CoreBundle\Color\MaterialDesignColorPalette\RedColorProvider;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Manager
 */
class DataTablesManagerTest extends AbstractTestCase {

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface
     */
    private $dataTablesProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Tests the addProvider() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testAddProvider() {

        $obj = new DataTablesManager();

        $obj->addProvider($this->dataTablesProvider);
        $this->assertCount(1, $obj->getProviders());
        $this->assertSame($this->dataTablesProvider, $obj->getProviders()[0]);
    }

    /**
     * Tests the addProvider() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredDataTablesProviderException() {

        $obj = new DataTablesManager();
        $obj->addProvider($this->dataTablesProvider);

        try {

            $obj->addProvider($this->dataTablesProvider);
        } catch (Exception $ex) {

            $this->assertInstanceOf(AlreadyRegisteredDataTablesProviderException::class, $ex);
            $this->assertEquals("A DataTables provider with name \"name\" is already registered", $ex->getMessage());
        }
    }

    /**
     * Tests the contains() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testContains() {

        $obj = new DataTablesManager();

        $this->assertFalse($obj->contains($this->dataTablesProvider));

        $obj->addProvider($this->dataTablesProvider);
        $this->assertTrue($obj->contains($this->dataTablesProvider));
    }

    /**
     * Tests the contains() method.
     *
     * @return void
     */
    public function testContainsWithInvalidArgumentException() {

        $obj = new DataTablesManager();

        try {

            $obj->contains(new RedColorProvider());
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements DataTablesProviderInterface", $ex->getMessage());
        }
    }

    /**
     * Tests the getProvider() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testGetProvider() {

        $obj = new DataTablesManager();

        $obj->addProvider($this->dataTablesProvider);
        $this->assertSame($this->dataTablesProvider, $obj->getProvider($this->dataTablesProvider->getName()));
    }

    /**
     * Tests the getProvider() method.
     *
     * @return void
     */
    public function testGetProviderWithUnregisteredDataTablesProviderException() {

        $obj = new DataTablesManager();

        try {

            $obj->getProvider("exception");
        } catch (Exception $ex) {

            $this->assertInstanceOf(UnregisteredDataTablesProviderException::class, $ex);
            $this->assertEquals("None DataTables provider registered with name \"exception\"", $ex->getMessage());
        }
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("wbw.jquery.datatables.manager", DataTablesManager::SERVICE_NAME);

        $obj = new DataTablesManager();

        $this->assertEquals([], $obj->getProviders());
    }
}
