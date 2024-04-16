<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Toast;

use JsonSerializable;

/**
 * Toast interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Toast
 */
interface ToastInterface extends JsonSerializable {

    /**
     * Toast type "danger".
     *
     * @var string
     */
    public const TOAST_TYPE_DANGER = "danger";

    /**
     * Toast type "info".
     *
     * @var string
     */
    public const TOAST_TYPE_INFO = "info";

    /**
     * Toast type "success".
     *
     * @var string
     */
    public const TOAST_TYPE_SUCCESS = "success";

    /**
     * Toast type "warning".
     *
     * @var string
     */
    public const TOAST_TYPE_WARNING = "warning";

    /**
     * Get the content.
     *
     * @return string Returns the content.
     */
    public function getContent(): string;

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType(): string;
}
