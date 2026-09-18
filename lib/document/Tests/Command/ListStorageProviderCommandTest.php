<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\DocumentBundle\Command\ListStorageProviderCommand;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Tests\AbstractWebTestCase;

/**
 * List storage provider command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\StorageBundle\Tests\Command
 */
class ListStorageProviderCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new ListStorageProviderCommand();
        $obj->setStorageManager(static::$kernel->getContainer()->get(StorageManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(ListStorageProviderCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.document.command.list_provider", ListStorageProviderCommand::SERVICE_NAME);
        $this->assertEquals("wbw:document:provider:list", ListStorageProviderCommand::COMMAND_NAME);

        $obj = new ListStorageProviderCommand();

        $this->assertEquals("List the storage providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(ListStorageProviderCommand::COMMAND_NAME, $obj->getName());
    }
}
