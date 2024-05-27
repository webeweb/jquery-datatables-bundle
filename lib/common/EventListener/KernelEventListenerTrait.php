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

namespace WBW\Bundle\CommonBundle\EventListener;

/**
 * Kernel event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
trait KernelEventListenerTrait {

    /**
     * Kernel event listener.
     *
     * @var KernelEventListenerInterface|null
     */
    private $kernelEventListener;

    /**
     * Get the kernel event listener.
     *
     * @return KernelEventListenerInterface|null Returns the kernel event listener.
     */
    public function getKernelEventListener(): ?KernelEventListenerInterface {
        return $this->kernelEventListener;
    }

    /**
     * Set the kernel event listener.
     *
     * @param KernelEventListenerInterface|null $kernelEventListener The kernel event listener.
     * @return self Returns this instance.
     */
    protected function setKernelEventListener(?KernelEventListenerInterface $kernelEventListener): self {
        $this->kernelEventListener = $kernelEventListener;
        return $this;
    }
}
