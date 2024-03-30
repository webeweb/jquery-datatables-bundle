<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\AbstractProviderCompilerPass;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManager;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler
 */
class DataTablesProviderCompilerPass extends AbstractProviderCompilerPass {

    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {
        $this->processing($container, DataTablesManager::SERVICE_NAME, DataTablesProviderInterface::DATATABLES_TAG_NAME);
    }
}
