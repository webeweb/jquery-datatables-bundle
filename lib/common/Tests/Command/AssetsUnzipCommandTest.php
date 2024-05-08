<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WBW\Bundle\CommonBundle\Command\AssetsUnzipCommand;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Assets unzip command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class AssetsUnzipCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new AssetsUnzipCommand();

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(AssetsUnzipCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("Trying to unzip assets", $output);
        $this->assertStringContainsString("[OK] All assets were successfully unzipped", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:assets:unzip", AssetsUnzipCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.assets_unzip", AssetsUnzipCommand::SERVICE_NAME);

        $obj = new AssetsUnzipCommand();

        $this->assertEquals("Unzip assets under a public directory", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(AssetsUnzipCommand::COMMAND_NAME, $obj->getName());
    }
}
