<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider;

use WBW\Library\Widget\Component\ColorInterface;

/**
 * Color provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
interface ColorProviderInterface extends ProviderInterface {

    /**
     * Tag name.
     *
     * @var string
     */
    public const COLOR_PROVIDER_TAG_NAME = "wbw.common.provider.color";

    /**
     * Get the colors.
     *
     * @return ColorInterface[] Returns the colors.
     */
    public function getColors(): array;

    /**
     * Get the name.
     *
     * @return string Returns the color name.
     */
    public function getName(): string;
}
