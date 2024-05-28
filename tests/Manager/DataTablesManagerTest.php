<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Manager;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Manager
 */
class DataTablesManagerTest extends AbstractTestCase {

    /**
     * DataTables provider.
     *
     * @var DataTablesProviderInterface|null
     */
    private $dataTablesProvider;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProvider(): void {

        $obj = new DataTablesManager();

        $obj->addProvider($this->dataTablesProvider);
        $this->assertCount(1, $obj->getProviders());
        $this->assertSame($this->dataTablesProvider, $obj->getProviders()[0]);
    }

    /**
     * Test addProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAddProviderWithAlreadyRegisteredDataTablesProviderException(): void {

        $obj = new DataTablesManager();
        $obj->addProvider($this->dataTablesProvider);

        try {

            $obj->addProvider($this->dataTablesProvider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(AlreadyRegisteredDataTablesProviderException::class, $ex);
            $this->assertEquals('A DataTables provider with name "name" is already registered', $ex->getMessage());
        }
    }

    /**
     * Test addProvider()
     *
     * @return void
     */
    public function testAddProviderWithInvalidArgumentException(): void {

        // Set a Provider mock.
        $provider = $this->getMockBuilder(ProviderInterface::class)->getMock();

        $obj = new DataTablesManager();

        try {

            $obj->addProvider($provider);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . DataTablesProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Test getProvider()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testGetProvider(): void {

        $obj = new DataTablesManager();

        $obj->addProvider($this->dataTablesProvider);
        $this->assertSame($this->dataTablesProvider, $obj->getProvider($this->dataTablesProvider->getName()));
    }

    /**
     * Test getProvider()
     *
     * @return void
     */
    public function testGetProviderWithUnregisteredDataTablesProviderException(): void {

        $obj = new DataTablesManager();

        try {

            $obj->getProvider("exception");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(UnregisteredDataTablesProviderException::class, $ex);
            $this->assertEquals('None DataTables provider registered with name "exception"', $ex->getMessage());
        }
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.manager", DataTablesManager::SERVICE_NAME);

        $obj = new DataTablesManager();

        $this->assertEquals([], $obj->getProviders());
    }
}
