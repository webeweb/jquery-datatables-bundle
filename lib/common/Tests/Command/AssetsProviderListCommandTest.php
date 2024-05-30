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

namespace WBW\Bundle\CommonBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\CommonBundle\Command\AssetsProviderListCommand;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Assets unzip command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class AssetsProviderListCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new AssetsProviderListCommand();
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(AssetsProviderListCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("[OK] All providers were successfully listed", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:assets:provider:list", AssetsProviderListCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.assets_provider_list", AssetsProviderListCommand::SERVICE_NAME);

        $obj = new AssetsProviderListCommand();

        $this->assertEquals("List the assets providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(AssetsProviderListCommand::COMMAND_NAME, $obj->getName());
    }
}
