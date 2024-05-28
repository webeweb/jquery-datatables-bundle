<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\CommonBundle\Command\JavascriptProviderListCommand;
use WBW\Bundle\CommonBundle\Manager\JavascriptManager;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Javascript provider list command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class JavascriptProviderListCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new JavascriptProviderListCommand();
        $obj->setJavascriptManager(static::$kernel->getContainer()->get(JavascriptManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(JavascriptProviderListCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("List the javascript providers", $output);
        $this->assertStringContainsString("[OK] All providers were successfully listed", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:javascript:provider:list", JavascriptProviderListCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.javascript_provider_list", JavascriptProviderListCommand::SERVICE_NAME);

        $obj = new JavascriptProviderListCommand();

        $this->assertEquals("List the javascript providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(JavascriptProviderListCommand::COMMAND_NAME, $obj->getName());
    }
}
