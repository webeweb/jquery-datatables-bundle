<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Image trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait ImageTrait {

    /**
     * Image.
     *
     * @var ImageInterface|null
     */
    protected $image;

    /**
     * Get the image.
     *
     * @return ImageInterface|null Returns the image.
     */
    public function getImage(): ?ImageInterface {
        return $this->image;
    }

    /**
     * Set the image.
     *
     * @param ImageInterface|null $image The image.
     * @return self Returns this instance.
     */
    protected function setImage(?ImageInterface $image): self {
        $this->image = $image;
        return $this;
    }
}
