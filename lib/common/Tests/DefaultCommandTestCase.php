<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Default command test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 * @abstract
 */
abstract class DefaultCommandTestCase extends AbstractTestCase {

    /**
     * Input.
     *
     * @var MockObject|InputInterface|null
     */
    protected $input;

    /**
     * Output.
     *
     * @var MockObject|OutputInterface|null
     */
    protected $output;

    /**
     * Style.
     *
     * @var MockObject|StyleInterface|null
     */
    protected $style;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set an Output formatter mock.
        $outputFormatter = $this->getMockBuilder(OutputFormatterInterface::class)->getMock();

        // Set an Input mock.
        $this->input = $this->getMockBuilder(InputInterface::class)->getMock();

        // Set an Output mock.
        $this->output = $this->getMockBuilder(OutputInterface::class)->getMock();
        $this->output->expects($this->any())->method("getFormatter")->willReturn($outputFormatter);

        // Set a Symfony style mock.
        $this->style = $this->getMockBuilder(StyleInterface::class)->getMock();
    }
}
