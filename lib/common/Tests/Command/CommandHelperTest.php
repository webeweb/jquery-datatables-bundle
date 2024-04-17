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

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use WBW\Bundle\CommonBundle\Command\CommandHelper;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Command helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class CommandHelperTest extends AbstractTestCase {

    /**
     * Test formatCheckbox()
     *
     * @return void
     */
    public function testFormatCheckbox(): void {

        // Determines the operating system.
        if ("\\" !== DIRECTORY_SEPARATOR) {

            $this->assertEquals("<fg=green;options=bold>\xE2\x9C\x94</>", CommandHelper::formatCheckbox(true));
            $this->assertEquals("<fg=yellow;options=bold>!</>", CommandHelper::formatCheckbox(false));
            $this->assertEquals("<fg=yellow;options=bold>!</>", CommandHelper::formatCheckbox(null));
        } else {

            $this->assertEquals("<fg=green;options=bold>OK</>", CommandHelper::formatCheckbox(true));
            $this->assertEquals("<fg=yellow;options=bold>WARNING</>", CommandHelper::formatCheckbox(false));
            $this->assertEquals("<fg=yellow;options=bold>WARNING</>", CommandHelper::formatCheckbox(null));
        }
    }

    /**
     * Test formatHelp()
     *
     * @return void
     */
    public function testFormatHelp(): void {

        $exp = <<< EOT
The <info>%command.name%</info> command content.

    <info>php %command.full_name%</info>


EOT;

        $this->assertEquals($exp, CommandHelper::formatHelp("content"));
    }

    /**
     * Test newSymfonyStyle()
     *
     * @return void
     */
    public function testNewSymfonyStyle(): void {

        // Set an Output formatter mock.
        $outputFormatter = $this->getMockBuilder(OutputFormatterInterface::class)->getMock();

        // Set an Input mock.
        $input = $this->getMockBuilder(InputInterface::class)->getMock();

        // Set an Output mock.
        $output = $this->getMockBuilder(OutputInterface::class)->getMock();
        $output->expects($this->any())->method("getFormatter")->willReturn($outputFormatter);

        $res = CommandHelper::newSymfonyStyle($input, $output);
        $this->assertInstanceOf(StyleInterface::class, $res);
    }
}
