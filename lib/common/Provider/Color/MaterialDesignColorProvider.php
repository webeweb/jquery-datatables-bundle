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

namespace WBW\Bundle\CommonBundle\Provider\Color;

use WBW\Library\Widget\Factory\ColorFactory;

/**
 * Material Design color provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Color
 */
class MaterialDesignColorProvider implements MaterialDesignColorProviderInterface {

    /**
     * Provider name.
     *
     * @var string
     */
    public const PROVIDER_NAME = "material_design";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.color.material_design";

    /**
     * {@inheritDoc}
     */
    public function getColors(): array {
        return ColorFactory::newMaterialDesignColorPalette();
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return self::PROVIDER_NAME;
    }
}
