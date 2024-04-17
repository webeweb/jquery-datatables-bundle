<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Renderer;

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;

/**
 * Bootstrap label renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Renderer
 */
trait BootstrapLabelRendererTrait {

    /**
     * Get the label Twig extension.
     *
     * @return LabelTwigExtension|null Returns the label Twig extension.
     */
    abstract public function getLabelTwigExtension(): ?LabelTwigExtension;

    /**
     * Get the translator.
     *
     * @return TranslatorInterface|null Returns the translator.
     */
    abstract public function getTranslator(): ?TranslatorInterface;

    /**
     * Render a label "enabled".
     *
     * @param bool|null $enabled Enabled ?
     * @return string|null Returns the rendered enabled label.
     */
    protected function renderLabelEnabled(?bool $enabled): ?string {

        if (null === $this->getTranslator() || null === $this->getLabelTwigExtension()) {
            return null;
        }

        $method  = sprintf("bootstrapLabel%sFunction", true === $enabled ? "Success" : "Danger");
        $content = $this->getTranslator()->trans(true === $enabled ? "label.enabled" : "label.disabled", [], WBWDataTablesBundle::getTranslationDomain());

        return $this->getLabelTwigExtension()->$method(["content" => $content]);
    }
}
