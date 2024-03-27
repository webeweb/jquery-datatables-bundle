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

namespace WBW\Bundle\DataTablesBundle\Translation;

use WBW\Bundle\CoreBundle\Translation\TranslatorTrait as BaseTranslatorTrait;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;

/**
 * Translator trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Translation
 */
trait TranslatorTrait {

    use BaseTranslatorTrait;

    /**
     * Translate.
     *
     * @param string|null $id The id.
     * @param array<string,mixed> $parameters Teh parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    protected function translate(?string $id, array $parameters = [], string $domain = null, string $locale = null): string {

        if (null === $id) {
            return "";
        }

        if (null === $domain) {
            $domain = WBWDataTablesBundle::getTranslationDomain();
        }

        return null !== $this->getTranslator() ? $this->getTranslator()->trans($id, $parameters, $domain, $locale) : $id;
    }
}
