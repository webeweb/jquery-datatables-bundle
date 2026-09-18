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

namespace WBW\Bundle\DocumentBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\AbstractProviderCompilerPass;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;

/**
 * Storage provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\DependencyInjection\Compiler
 */
class StorageProviderCompilerPass extends AbstractProviderCompilerPass {

    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {
        $this->processing($container, StorageManager::SERVICE_NAME, StorageProviderInterface::STORAGE_PROVIDER_TAG_NAME);
    }
}
