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

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\AlreadyRegisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Color\MaterialDesignColorPalette\RedColorProvider;

/**
 * DataTables manager test.
 *
 * @author webeweb <https://github.com/webeweb>
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
     * {@inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a DataTables provider mock.
        $this->dataTablesProvider = $this->getMockBuilder(DataTablesProviderInterface::class)->getMock();
        $this->dataTablesProvider->expects($this->any())->method("getName")->willReturn("name");
    }

    /**
     * Tests addProvider()
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
     * Tests addProvider()
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
     * Tests addProvider()
     *
     * @return void
     */
    public function testAddProviderWithInvalidArgumentException(): void {

        $obj = new DataTablesManager();

        try {

            $obj->addProvider(new RedColorProvider());
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The provider must implements " . DataTablesProviderInterface::class, $ex->getMessage());
        }
    }

    /**
     * Tests getProvider()
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
     * Tests getProvider()
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
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.jquery.datatables.manager", DataTablesManager::SERVICE_NAME);

        $obj = new DataTablesManager();

        $this->assertEquals([], $obj->getProviders());
    }
}
