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

namespace WBW\Bundle\CommonBundle\Command;

use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;

/**
 * Abstract provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 * @abstract
 */
abstract class AbstractProviderListCommand extends AbstractCommand {

    use TranslatorTrait {
        setTranslator as public;
    }

    /**
     * Sort the rows.
     *
     * @param string[][] $rows The rows.
     * @return void
     */
    protected function sortRows(array &$rows): void {

        usort($rows, function(array $a, array $b): int {
            return strcmp($a[0], $b[0]);
        });
    }
}
