<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle;

/**
 * Bootstrap bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle
 */
interface WBWBootstrapBundle {

    /**
     * Bootstrap type "danger".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_DANGER = "danger";

    /**
     * Bootstrap type "dark".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_DARK = "dark";

    /**
     * Bootstrap type "default".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_DEFAULT = "default";

    /**
     * Bootstrap type "info".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_INFO = "info";

    /**
     * Bootstrap type "light".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_LIGHT = "light";

    /**
     * Bootstrap type "primary".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_PRIMARY = "primary";

    /**
     * Bootstrap type "secondary".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_SECONDARY = "secondary";

    /**
     * Bootstrap type "success".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_SUCCESS = "success";

    /**
     * Bootstrap type "warning".
     *
     * @var string
     */
    public const BOOTSTRAP_TYPE_WARNING = "warning";

    /**
     * Bootstrap version 3.
     *
     * @var string
     */
    public const BOOTSTRAP_VERSION_3 = "3.4.1";

    /**
     * Bootstrap version 4.
     *
     * @var string
     */
    public const BOOTSTRAP_VERSION_4 = "4.6.2";

    /**
     * Bootstrap version 5.
     *
     * @var string
     */
    public const BOOTSTRAP_VERSION_5 = "5.3.2";
}
