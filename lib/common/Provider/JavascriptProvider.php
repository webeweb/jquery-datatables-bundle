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

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Javascript provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
class JavascriptProvider implements JavascriptProviderInterface {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.common.provider.javascript";

    /**
     * {@inheritDoc}
     */
    public function getJavascripts(): array {

        return [
            "WBWCommonJQueryInputMask" => "@WBWCommon/twig/WBWCommonJQueryInputMask.js.twig",
            "WBWCommonLeaflet"         => "@WBWCommon/twig/WBWCommonLeaflet.js.twig",
            "WBWCommonSweetAlert"      => "@WBWCommon/twig/WBWCommonSweetAlert.js.twig",
            "WBWCommonWaitMe"          => "@WBWCommon/twig/WBWCommonWaitMe.js.twig",
        ];
    }
}
