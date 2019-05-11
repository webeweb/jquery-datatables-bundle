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
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\DependencyInjection\Compiler\DataTablesProviderCompilerPass;

/**
 * jQuery DataTables bundle.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\jQuery\DatatablesBundle
 */
class WBWJQueryDataTablesBundle extends Bundle implements AssetsProviderInterface {

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container) {
        $container->addCompilerPass(new DataTablesProviderCompilerPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getAssetsRelativeDirectory() {
        return "/Resources/assets";
    }
}
