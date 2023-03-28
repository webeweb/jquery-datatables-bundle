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

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle;

/**
 * Enabled badge renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets
 */
trait EnabledBadgeRendererTrait {

    /**
     * Get the badge Twig extension.
     *
     * @return BadgeTwigExtension|null Returns the badge Twig extension.
     */
    abstract public function getBadgeTwigExtension(): ?BadgeTwigExtension;

    /**
     * Get the translator.
     *
     * @return TranslatorInterface|null Returns the translator.
     */
    abstract public function getTranslator(): ?TranslatorInterface;

    /**
     * Render an enabled badge.
     *
     * @param bool|null $enabled Enabled ?
     * @return string|null Returns the rendered enabled badge.
     */
    protected function renderEnabledBadge(?bool $enabled): ?string {

        if (null === $this->getTranslator() || null === $this->getBadgeTwigExtension()) {
            return null;
        }

        $method  = sprintf("bootstrapBadge%sFunction", true === $enabled ? "Success" : "Danger");
        $content = $this->getTranslator()->trans(true === $enabled ? "label.enabled" : "label.disabled", [], WBWJQueryDataTablesBundle::getTranslationDomain());

        return $this->getBadgeTwigExtension()->$method(["content" => $content]);
    }
}
