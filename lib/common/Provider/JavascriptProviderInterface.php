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

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Javascript provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
interface JavascriptProviderInterface extends ProviderInterface {

    /**
     * Content-type.
     *
     * @var string
     */
    public const JAVASCRIPT_PROVIDER_CONTENT_TYPE = "application/javascript";

    /**
     * Extension.
     *
     * @var string
     */
    public const JAVASCRIPT_PROVIDER_EXTENSION = "js";

    /**
     * Tag name.
     *
     * @var string
     */
    public const JAVASCRIPT_PROVIDER_TAG_NAME = "wbw.common.provider.javascript";

    /**
     * Get the javascripts.
     *
     * @return mixed[] Returns the javascripts.
     */
    public function getJavascripts(): array;
}
