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

namespace WBW\Bundle\BootstrapBundle\Serializer;

use WBW\Library\Common\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * Serializer keys.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Serializer
 */
interface SerializerKeys extends BaseSerializerKeys {

    /**
     * Serializer key "animated".
     *
     * @var string
     */
    public const ANIMATED = "animated";

    /**
     * Serializer key "block".
     *
     * @var string
     */
    public const BLOCK = "block";

    /**
     * Serializer key "dismissible".
     *
     * @var string
     */
    public const DISMISSIBLE = "dismissible";

    /**
     * Serializer key "outline".
     *
     * @var string
     */
    public const OUTLINE = "outline";

    /**
     * Serializer key "pill".
     *
     * @var string
     */
    public const PILL = "pill";

    /**
     * Serializer key "prefix".
     *
     * @var string
     */
    public const PREFIX = "prefix";

    /**
     * Serializer key "striped".
     *
     * @var string
     */
    public const STRIPED = "striped";
}
