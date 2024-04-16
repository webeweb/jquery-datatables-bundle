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

namespace WBW\Bundle\WidgetBundle\ProgressBar;

use JsonSerializable;

/**
 * Progress bar interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\ProgressBar
 */
interface ProgressBarInterface extends JsonSerializable {

    /**
     * Progress bar type "danger".
     *
     * @var string
     */
    public const PROGRESS_BAR_TYPE_DANGER = "danger";

    /**
     * Progress bar type "info".
     *
     * @var string
     */
    public const PROGRESS_BAR_TYPE_INFO = "info";

    /**
     * Progress bar type "success".
     *
     * @var string
     */
    public const PROGRESS_BAR_TYPE_SUCCESS = "success";

    /**
     * Progress bar type "warning".
     *
     * @var string
     */
    public const PROGRESS_BAR_TYPE_WARNING = "warning";

    /**
     * Get the content.
     *
     * @return string|null Returns the content.
     */
    public function getContent(): ?string;

    /**
     * Get the type.
     *
     * @return string|null Returns the type.
     */
    public function getType(): ?string;

    /**
     * Set the content.
     *
     * @param string|null $content The content.
     * @return ProgressBarInterface Returns this progress bar.
     */
    public function setContent(?string $content);
}
