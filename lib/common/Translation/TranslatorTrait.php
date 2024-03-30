<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Translation;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Translator trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Translation
 */
trait TranslatorTrait {

    /**
     * Translator.
     *
     * @var TranslatorInterface|null
     */
    private $translator;

    /**
     * Get the translator.
     *
     * @return TranslatorInterface|null Returns the translator.
     */
    public function getTranslator(): ?TranslatorInterface {
        return $this->translator;
    }

    /**
     * Set the translator.
     *
     * @param TranslatorInterface|null $translator The translator.
     * @return self Returns this instance.
     */
    protected function setTranslator(?TranslatorInterface $translator): self {
        $this->translator = $translator;
        return $this;
    }

    /**
     * Translate.
     *
     * @param string|null $id The id.
     * @param array<string,mixed> $parameters The parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    protected function translate(?string $id, array $parameters = [], string $domain = null, string $locale = null): string {
        return null !== $this->getTranslator() ? $this->getTranslator()->trans($id, $parameters, $domain, $locale) : $id;
    }
}
