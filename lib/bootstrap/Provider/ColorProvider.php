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

namespace WBW\Bundle\BootstrapBundle\Provider;

use WBW\Bundle\BootstrapBundle\Factory\Customize\ColorFactory;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;

/**
 * Color provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Provider
 */
class ColorProvider implements ColorProviderInterface {

    /**
     * Provider name.
     *
     * @var string
     */
    public const PROVIDER_NAME = "Bootstrap";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.provider.color";

    /**
     * {@inheritDoc}
     */
    public function getColors(): array {
        return ColorFactory::newBootstrapPalette();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return self::PROVIDER_NAME;
    }
}
