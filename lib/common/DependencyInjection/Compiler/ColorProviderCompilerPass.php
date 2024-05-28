<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\Manager\ColorManager;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;

/**
 * Color provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection\Compiler
 */
class ColorProviderCompilerPass extends AbstractProviderCompilerPass {

    /**
     *{@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {
        $this->processing($container, ColorManager::SERVICE_NAME, ColorProviderInterface::COLOR_PROVIDER_TAG_NAME);
    }
}
