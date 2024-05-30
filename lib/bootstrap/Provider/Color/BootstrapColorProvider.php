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

namespace WBW\Bundle\BootstrapBundle\Provider\Color;

use WBW\Bundle\BootstrapBundle\Factory\Customize\ColorFactory;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;

/**
 * Bootstrap color provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Provider\Color
 */
class BootstrapColorProvider implements ColorProviderInterface {

    /**
     * Provider name.
     *
     * @var string
     */
    public const PROVIDER_NAME = "bootstrap";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.provider.color.bootstrap";

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
