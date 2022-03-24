<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\CoreBundle\Translation\BaseTranslatorInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Translation\TranslatorInterface;

/**
 * Enabled label renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets
 */
trait EnabledLabelRendererTrait {

    /**
     * Get the label Twig extension.
     *
     * @return LabelTwigExtension|null Returns the label Twig extension.
     */
    abstract public function getLabelTwigExtension(): ?LabelTwigExtension;

    /**
     * Get the translator.
     *
     * @return BaseTranslatorInterface|null Returns the translator.
     */
    abstract public function getTranslator();

    /**
     * Render an enabled label.
     *
     * @param bool|null $enabled Enabled ?
     * @return string|null Returns the rendered enabled label.
     */
    protected function renderEnabledLabel(?bool $enabled): ?string {

        if (null === $this->getTranslator() || null === $this->getLabelTwigExtension()) {
            return null;
        }

        $method  = sprintf("bootstrapLabel%sFunction", true === $enabled ? "Success" : "Danger");
        $content = $this->getTranslator()->trans(true === $enabled ? "label.enabled" : "label.disabled", [], TranslatorInterface::DOMAIN);

        return $this->getLabelTwigExtension()->$method(["content" => $content]);
    }
}
