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
use WBW\Bundle\CommonBundle\Command\ColorProviderListCommand;
use WBW\Bundle\CommonBundle\Manager\ColorManager;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Color provider list command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class ColorProviderListCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new ColorProviderListCommand();
        $obj->setColorManager(static::$kernel->getContainer()->get(ColorManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(ColorProviderListCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("List the color providers", $output);
        $this->assertStringContainsString("[OK] No provider to list", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:color:provider:list", ColorProviderListCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.color_provider_list", ColorProviderListCommand::SERVICE_NAME);

        $obj = new ColorProviderListCommand();

        $this->assertEquals("List the color providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(ColorProviderListCommand::COMMAND_NAME, $obj->getName());
    }
}
