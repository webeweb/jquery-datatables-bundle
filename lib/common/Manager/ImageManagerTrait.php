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

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Image manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait ImageManagerTrait {

    /**
     * Image manager.
     *
     * @var ImageManagerInterface|null
     */
    private $imageManager;

    /**
     * Get the image manager.
     *
     * @return ImageManagerInterface|null Returns the image manager.
     */
    public function getImageManager(): ?ImageManagerInterface {
        return $this->imageManager;
    }

    /**
     * Set the image manager.
     *
     * @param ImageManagerInterface|null $imageManager The image manager.
     * @return self Returns this instance.
     */
    protected function setImageManager(?ImageManagerInterface $imageManager): self {
        $this->imageManager = $imageManager;
        return $this;
    }
}
