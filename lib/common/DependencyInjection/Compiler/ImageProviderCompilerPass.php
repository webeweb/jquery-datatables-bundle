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

namespace WBW\Bundle\CommonBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\Manager\ImageManager;
use WBW\Bundle\CommonBundle\Provider\ImageProviderInterface;

/**
 * Image provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection\Compiler
 */
class ImageProviderCompilerPass extends AbstractProviderCompilerPass {

    /**
     *{@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {
        $this->processing($container, ImageManager::SERVICE_NAME, ImageProviderInterface::IMAGE_PROVIDER_TAG_NAME);
    }
}
