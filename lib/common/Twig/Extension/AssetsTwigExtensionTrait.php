<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Twig\Extension;

/**
 * Assets Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
trait AssetsTwigExtensionTrait {

    /**
     * Assets Twig extension.
     *
     * @var AssetsTwigExtension|null
     */
    private $assetsTwigExtension;

    /**
     * Get the assets Twig extension.
     *
     * @return AssetsTwigExtension|null Returns the assets Twig extension.
     */
    public function getAssetsTwigExtension(): ?AssetsTwigExtension {
        return $this->assetsTwigExtension;
    }

    /**
     * Set the assets Twig extension.
     *
     * @param AssetsTwigExtension|null $assetsTwigExtension The assets Twig extension.
     * @return self Returns this instance.
     */
    protected function setAssetsTwigExtension(?AssetsTwigExtension $assetsTwigExtension): self {
        $this->assetsTwigExtension = $assetsTwigExtension;
        return $this;
    }
}
