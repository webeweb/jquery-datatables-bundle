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
use WBW\Bundle\CommonBundle\Command\ImageProviderListCommand;
use WBW\Bundle\CommonBundle\Manager\ImageManager;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as AbstractWebTestCase;

/**
 * Image provider list command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class ImageProviderListCommandTest extends AbstractWebTestCase {

    /**
     * Test execute()
     *
     * @return void
     */
    public function testExecute(): void {

        $obj = new ImageProviderListCommand();
        $obj->setImageManager(static::$kernel->getContainer()->get(ImageManager::SERVICE_NAME . ".alias"));
        $obj->setTranslator(static::$kernel->getContainer()->get("translator"));

        // Set an Application mock.
        $application = new Application(static::$kernel);
        $application->add($obj);

        // Set a Command mock.
        $command = $application->find(ImageProviderListCommand::COMMAND_NAME);

        // Set a Command tester.
        $commandTester = new CommandTester($command);

        $res = $commandTester->execute([
            "command" => $command->getName(),
        ]);
        $this->assertEquals(0, $res);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("List the image providers", $output);
        $this->assertStringContainsString("[OK] All providers were successfully listed", $output);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw:common:image:provider:list", ImageProviderListCommand::COMMAND_NAME);
        $this->assertEquals("wbw.common.command.image_provider_list", ImageProviderListCommand::SERVICE_NAME);

        $obj = new ImageProviderListCommand();

        $this->assertEquals("List the image providers", $obj->getDescription());
        $this->assertNotNull($obj->getHelp());
        $this->assertEquals(ImageProviderListCommand::COMMAND_NAME, $obj->getName());
    }
}
