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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use WBW\Bundle\CommonBundle\Command\AbstractCommand;

/**
 * Test abstract command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Command
 */
class TestAbstractCommand extends AbstractCommand {

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this->setName("wbw:core:abstract");
    }

    /**
     * {@inheritDoc}
     */
    public static function displayHeader(StyleInterface $io, string $header): void {
        parent::displayHeader($io, $header);
    }

    /**
     * {@inheritDoc}
     */
    public static function displayTitle(StyleInterface $io, string $title): void {
        parent::displayTitle($io, $title);
    }

    /**
     * {@inheritDoc}
     */
    public static function formatCheckbox(bool $checked): string {
        return parent::formatCheckbox($checked);
    }

    /**
     * {@inheritDoc}
     */
    public function getKernel(): ?KernelInterface {
        return parent::getKernel();
    }

    /**
     * {@inheritDoc}
     */
    public static function newStyle(InputInterface $input, OutputInterface $output): StyleInterface {
        return parent::newStyle($input, $output);
    }
}
