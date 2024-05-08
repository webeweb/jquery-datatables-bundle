<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\CommonBundle\Command\ListStylesheetProviderCommand;
use WBW\Bundle\CommonBundle\Manager\StylesheetManager;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * List stylesheet provider command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class ListStylesheetProviderCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new ListStylesheetProviderCommand();
        $obj->setStylesheetManager(static::$kernel->getContainer()->get(StylesheetManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(ListStylesheetProviderCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("List the stylesheet providers", $output);
        $this->assertStringContainsString("[OK] All providers were successfully listed", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:stylesheet:provider:list", ListStylesheetProviderCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.list_stylesheet_provider", ListStylesheetProviderCommand::SERVICE_NAME);

        $obj = new ListStylesheetProviderCommand();

        $this->assertEquals("List the stylesheet providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(ListStylesheetProviderCommand::COMMAND_NAME, $obj->getName());
    }
}
