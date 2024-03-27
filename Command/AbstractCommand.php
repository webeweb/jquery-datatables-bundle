<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Command;

use Symfony\Component\Console\Style\StyleInterface;
use WBW\Bundle\CoreBundle\Command\AbstractCommand as BaseCommand;
use WBW\Bundle\DataTablesBundle\Translation\TranslatorTrait;

/**
 * Abstract command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Command
 * @abstract
 */
abstract class AbstractCommand extends BaseCommand {

    use TranslatorTrait {
        setTranslator as public;
    }

    /**
     * Display the footer.
     *
     * @param StyleInterface $io The I/O.
     * @param int $count The count.
     * @param string $success The success message.
     * @param string $warning The warning message.
     * @return void
     */
    protected function displayFooter(StyleInterface $io, int $count, string $success, string $warning): void {

        $message = $this->translate(0 < $count ? $success : $warning, [], null, "en");

        $io->success($message);
    }
}
