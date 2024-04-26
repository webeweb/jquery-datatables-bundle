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

namespace WBW\Bundle\CommonBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\ColorProviderCompilerPass;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\JavascriptProviderCompilerPass;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\QuoteProviderCompilerPass;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\StylesheetProviderCompilerPass;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;

/**
 * Common bundle.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CoreBundle
 */
class WBWCommonBundle extends Bundle implements AssetsProviderInterface {

    /**
     * Translation domain.
     *
     * @var string
     */
    public const TRANSLATION_DOMAIN = "WBWCommonBundle";

    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void {
        $container->addCompilerPass(new ColorProviderCompilerPass());
        $container->addCompilerPass(new JavascriptProviderCompilerPass());
        $container->addCompilerPass(new QuoteProviderCompilerPass());
        $container->addCompilerPass(new StylesheetProviderCompilerPass());
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
        return new WBWCommonExtension();
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
