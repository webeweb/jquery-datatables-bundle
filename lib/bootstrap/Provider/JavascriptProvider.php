<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Provider;

use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;

/**
 * Javascript provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Provider
 */
class JavascriptProvider implements JavascriptProviderInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.provider.javascript";

    /**
     * {@inheritDoc}
     */
    public function getJavascripts(): array {

        return [
            "WBWBootstrapNotify"    => "@WBWBootstrap/twig/WBWBootstrapNotify.js.twig",
            "WBWBootstrapSelect"    => "@WBWBootstrap/twig/WBWBootstrapSelect.js.twig",
            "WBWBootstrapTooltip"   => "@WBWBootstrap/twig/WBWBootstrapTooltip.js.twig",
            "WBWBootstrapWysihtml5" => "@WBWBootstrap/twig/WBWBootstrapWysihtml5.js.twig",
        ];
    }
}
