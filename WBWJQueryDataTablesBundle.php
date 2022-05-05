<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Compiler\DataTablesProviderCompilerPass;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\WBWJQueryDataTablesExtension;

/**
 * jQuery DataTables bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\jQuery\DatatablesBundle
 */
class WBWJQueryDataTablesBundle extends Bundle implements AssetsProviderInterface {

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void {
        $container->addCompilerPass(new DataTablesProviderCompilerPass());
    }

    /**
     * {@inheritdoc}
     */
    public function getAssetsRelativeDirectory(): string {
        return self::ASSETS_RELATIVE_DIRECTORY;
    }

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension(): Extension {
        return new WBWJQueryDataTablesExtension();
    }
}
