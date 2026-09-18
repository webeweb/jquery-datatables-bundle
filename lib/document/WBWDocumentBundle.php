<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\DocumentBundle\DependencyInjection\Compiler\StorageProviderCompilerPass;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;

/**
 * Document bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle
 */
class WBWDocumentBundle extends Bundle implements AssetsProviderInterface {

    /**
     * Translation domain.
     *
     * @var string
     */
    public const TRANSLATION_DOMAIN = "WBWDocumentBundle";

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void {
        $container->addCompilerPass(new StorageProviderCompilerPass());
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
        return new WBWDocumentExtension();
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
