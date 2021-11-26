<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Command;

use WBW\Bundle\CoreBundle\Command\AbstractCommand as BaseCommand;
use WBW\Bundle\JQuery\DataTablesBundle\Translation\TranslatorTrait;

/**
 * Abstract command.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Command
 */
abstract class AbstractCommand extends BaseCommand {

    use TranslatorTrait {
        setTranslator as public;
    }
}