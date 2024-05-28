<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Image provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
trait ImageProviderTrait {

    /**
     * Image provider.
     *
     * @var ImageProviderInterface|null
     */
    protected $imageProvider;

    /**
     * Get the image provider.
     *
     * @return ImageProviderInterface|null Returns the image provider.
     */
    public function getImageProvider(): ?ImageProviderInterface {
        return $this->imageProvider;
    }

    /**
     * Set the image provider.
     *
     * @param ImageProviderInterface|null $imageProvider The image provider.
     * @return self Returns this instance.
     */
    protected function setImageProvider(?ImageProviderInterface $imageProvider): self {
        $this->imageProvider = $imageProvider;
        return $this;
    }
}
