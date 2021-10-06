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
use WBW\Bundle\CoreBundle\Service\TranslatorTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Translation\TranslatorInterface;

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

    /**
     * Translate.
     *
     * @param string $id The id.
     * @param array $parameters The parameters.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    protected function translate(string $id, array $parameters = []): string {
        if (null === $this->getTranslator()) {
            return $id;
        }
        return $this->getTranslator()->trans($id, $parameters, TranslatorInterface::DOMAIN, "en");
    }
}