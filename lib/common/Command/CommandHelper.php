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

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use WBW\Library\System\Helper\SystemHelper;

/**
 * Command helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class CommandHelper {

    /**
     * Template "help"
     */
    protected const TEMPLATE_HELP = <<< EOT
The <info>%command.name%</info> command {{ content }}.

    <info>php %command.full_name%</info>


EOT;

    /**
     * Format a checkbox.
     *
     * @param bool|null $checked Checked ?
     * @return string Returns the checkbox.
     */
    public static function formatCheckbox(?bool $checked): string {

        if (true === $checked) {
            return sprintf("<fg=green;options=bold>%s</>", SystemHelper::isWindows() ? "OK" : "\xE2\x9C\x94");
        }

        return sprintf("<fg=yellow;options=bold>%s</>", SystemHelper::isWindows() ? "KO" : "!");
    }

    /**
     * Format a help.
     *
     * @param string $content The content
     * @return string Returns the help.
     */
    public static function formatHelp(string $content): string {
        return str_replace("{{ content }}", $content, self::TEMPLATE_HELP);
    }

    /**
     * Create a Symfony style.
     *
     * @param InputInterface $input The input.
     * @param OutputInterface $output The output.
     * @return StyleInterface Returns the Symfony style.
     */
    public static function newSymfonyStyle(InputInterface $input, OutputInterface $output): StyleInterface {
        return new SymfonyStyle($input, $output);
    }
}
