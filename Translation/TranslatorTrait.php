<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Translation;

use WBW\Bundle\CoreBundle\Service\TranslatorTrait as BaseTranslatorTrait;

/**
 * Translator trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Translation
 */
trait TranslatorTrait {

    use BaseTranslatorTrait;

    /**
     * Translate.
     *
     * @param string|null $id The id.
     * @param array $parameters Teh parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    protected function translate(?string $id, array $parameters = [], string $domain = null, string $locale = null): string {

        if (null === $id) {
            return "";
        }

        if (null === $domain) {
            $domain = TranslatorInterface::DOMAIN;
        }

        return null !== $this->getTranslator() ? $this->getTranslator()->trans($id, $parameters, $domain, $locale) : $id;
    }
}
