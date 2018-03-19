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
use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\UnregisteredProviderException;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DatatablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Manager
 * @final
 */
final class DataTablesManagerTest extends PHPUnit_Framework_TestCase {

    /**
     * Provider.
     *
     * @var DataTablesProviderInterface
     */
    private $provider;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {

        $this->provider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->provider->expects($this->any())->method("getName")->willReturn("name");
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

        $obj->registerProvider($this->provider);
        $this->assertCount(1, $obj->getProviders());

        try {
            $obj->registerProvider($this->provider);
        } catch (Exception $ex) {
            $this->assertInstanceOf(AlreadyRegisteredProviderException::class, $ex);
            $this->assertEquals("A provider with name \"name\" is already registered", $ex->getMessage());
        }
    }

    /**
     * Tests the getProvider() method.
     *
     * @return void
     */
    public function testGetProvider() {

        $obj = new DataTablesManager();

        $obj->registerProvider($this->provider);
        $this->assertEquals($this->provider, $obj->getProvider($this->provider->getName()));

        try {
            $obj->getProvider("exception");
        } catch (Exception $ex) {
            $this->assertInstanceOf(UnregisteredProviderException::class, $ex);
            $this->assertEquals("None provider registered with name \"exception\"", $ex->getMessage());
        }
    }

}
