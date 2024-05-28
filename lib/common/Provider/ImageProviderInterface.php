<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Image provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
interface ImageProviderInterface extends ProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    public const IMAGE_PROVIDER_TAG_NAME = "wbw.common.provider.image";

}
