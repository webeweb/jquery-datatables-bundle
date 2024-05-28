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

namespace WBW\Bundle\CommonBundle\Provider;

use Symfony\Component\HttpKernel\Bundle\BundleInterface;

/**
 * Assets provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
interface AssetsProviderInterface extends ProviderInterface, BundleInterface {

    /**
     * Assets relative directory.
     *
     * @var string
     */
    public const ASSETS_RELATIVE_DIRECTORY = "/Resources/assets";

    /**
     * Get the assets relative directory.
     *
     * @return string Returns the assets relative directory.
     */
    public function getAssetsRelativeDirectory(): string;
}
