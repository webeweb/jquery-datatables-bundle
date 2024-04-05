<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractCommandTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Command\TestAbstractCommand;

/**
 * Abstract command test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Command
 */
class AbstractCommandTest extends AbstractCommandTestCase {

    /**
     * Test displayHeader()
     *
     * @return void
     */
    public function testDisplayHeader(): void {

        TestAbstractCommand::displayHeader($this->style, "");
        $this->assertNull(null);
    }

    /**
     * Test displayTitle()
     *
     * @return void
     */
    public function testDisplayTitle(): void {

        TestAbstractCommand::displayTitle($this->style, "");
        $this->assertNull(null);
    }

    /**
     * Test formatCheckbox()
     *
     * @return void
     */
    public function testFormatCheckbox(): void {

        // Determines the operating system.
        if ("\\" !== DIRECTORY_SEPARATOR) {

            $this->assertEquals("<fg=green;options=bold>\xE2\x9C\x94</>", TestAbstractCommand::formatCheckbox(true));
            $this->assertEquals("<fg=yellow;options=bold>!</>", TestAbstractCommand::formatCheckbox(false));
        } else {

            $this->assertEquals("<fg=green;options=bold>OK</>", TestAbstractCommand::formatCheckbox(true));
            $this->assertEquals("<fg=yellow;options=bold>WARNING</>", TestAbstractCommand::formatCheckbox(false));
        }
    }

    /**
     * Test getKernel()
     *
     * @return void
     */
    public function testGetKernel(): void {

        // Set a Kernel mock.
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();

        // Set a Helper set mock.
        $helperSet = $this->getMockBuilder(HelperSet::class)->disableOriginalConstructor()->getMock();

        // Set an Application mock.
        $application = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        $application->expects($this->any())->method("getHelperSet")->willReturn($helperSet);
        $application->expects($this->any())->method("getKernel")->willReturn($kernel);

        $obj = new TestAbstractCommand();
        $obj->setApplication($application);

        $this->assertSame($kernel, $obj->getKernel());
    }

    /**
     * Test newStyle()
     *
     * @return void
     */
    public function testNewStyle(): void {

        $obj = new TestAbstractCommand();

        $res = $obj->newStyle($this->input, $this->output);
        $this->assertInstanceOf(StyleInterface::class, $res);

        $this->assertNotNull($res);
    }
}
