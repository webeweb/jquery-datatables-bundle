<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\JQuery\DataTablesBundle\Command\ListDataTablesProviderCommand;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractWebTestCase;

/**
 * List DataTables provider command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Command
 */
class ListDataTablesProviderCommandTest extends AbstractWebTestCase {

    /**
     * Tests execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new ListDataTablesProviderCommand();
        $obj->setDataTablesManager(static::$kernel->getContainer()->get(DataTablesManager::SERVICE_NAME));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(ListDataTablesProviderCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.jquery.datatables.command.list_provider", ListDataTablesProviderCommand::SERVICE_NAME);
        $this->assertEquals("wbw:jquery:datatables:list-provider", ListDataTablesProviderCommand::COMMAND_NAME);

        $obj = new ListDataTablesProviderCommand();

        $this->assertEquals("List the DataTables providers", $obj->getDescription());
        $this->assertEquals(ListDataTablesProviderCommand::COMMAND_HELP, $obj->getHelp());
        $this->assertEquals(ListDataTablesProviderCommand::COMMAND_NAME, $obj->getName());
    }
}
