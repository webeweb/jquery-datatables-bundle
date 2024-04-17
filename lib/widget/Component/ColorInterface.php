<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

use JsonSerializable;

/**
 * Color interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
interface ColorInterface  extends JsonSerializable{

    /**
     * Color value "100".
     *
     * @var string
     */
    public const COLOR_VALUE_100 = "100";

    /**
     * Color value "200".
     *
     * @var string
     */
    public const COLOR_VALUE_200 = "200";

    /**
     * Color value "300".
     *
     * @var string
     */
    public const COLOR_VALUE_300 = "300";

    /**
     * Color value "400".
     *
     * @var string
     */
    public const COLOR_VALUE_400 = "400";

    /**
     * Color value "50".
     *
     * @var string
     */
    public const COLOR_VALUE_50 = "50";

    /**
     * Color value "500".
     *
     * @var string
     */
    public const COLOR_VALUE_500 = "500";

    /**
     * Color value "600".
     *
     * @var string
     */
    public const COLOR_VALUE_600 = "600";

    /**
     * Color value "700".
     *
     * @var string
     */
    public const COLOR_VALUE_700 = "700";

    /**
     * Color value "A100".
     *
     * @var string
     */
    public const COLOR_VALUE_A100 = "A100";

    /**
     * Color value "A200".
     *
     * @var string
     */
    public const COLOR_VALUE_A200 = "A200";

    /**
     * Color value "A400".
     *
     * @var string
     */
    public const COLOR_VALUE_A400 = "A400";

    /**
     * Color value "A700".
     *
     * @var string
     */
    public const COLOR_VALUE_A700 = "A700";

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string;

    /**
     * Get the values.
     *
     * @return array<string,string> Returns the values.
     */
    public function getValues(): array;
}
