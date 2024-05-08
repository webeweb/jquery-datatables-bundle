<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\DataTablesBundle\Command\DataTablesProviderListCommand;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * DataTables provider list command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Command
 */
class DataTablesProviderListCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new DataTablesProviderListCommand();
        $obj->setDataTablesManager(static::$kernel->getContainer()->get(DataTablesManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(DataTablesProviderListCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("List the DataTables providers", $output);
        $this->assertStringContainsString("[OK] All DataTables providers were successfully listed", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.datatables.command.provider_list", DataTablesProviderListCommand::SERVICE_NAME);
        $this->assertEquals("wbw:datatables:provider:list", DataTablesProviderListCommand::COMMAND_NAME);

        $obj = new DataTablesProviderListCommand();

        $this->assertEquals("List the DataTables providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(DataTablesProviderListCommand::COMMAND_NAME, $obj->getName());
    }
}
