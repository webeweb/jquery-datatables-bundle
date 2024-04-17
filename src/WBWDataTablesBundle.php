<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\DataTablesBundle\DependencyInjection\Compiler\DataTablesProviderCompilerPass;
use WBW\Bundle\DataTablesBundle\DependencyInjection\WBWDataTablesExtension;

/**
 * DataTables bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DatatablesBundle
 */
class WBWDataTablesBundle extends Bundle implements AssetsProviderInterface {

    /**
     * Translation domain.
     *
     * @var string
     */
    public const TRANSLATION_DOMAIN = "WBWDataTablesBundle";

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void {
        $container->addCompilerPass(new DataTablesProviderCompilerPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getAssetsRelativeDirectory(): string {
        return self::ASSETS_RELATIVE_DIRECTORY;
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): Extension {
        return new WBWDataTablesExtension();
    }

    /**
     * Get the translation domain.
     *
     * @return string Returns the translation domain.
     */
    public static function getTranslationDomain(): string {
        return self::TRANSLATION_DOMAIN;
    }
}
