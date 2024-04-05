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

namespace WBW\Bundle\CommonBundle\Provider;

use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use WBW\Library\Symfony\Provider\ProviderInterface;

/**
 * Assets provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
interface AssetsProviderInterface extends ProviderInterface, BundleInterface {

    /**
     * Asset relative directory.
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
