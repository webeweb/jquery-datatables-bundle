<?php

declare(strict_types = 1);

/*
 * This file is part of datatables datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\EventListener;

/**
 * Toast event listener trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\EventListener
 */
trait ToastEventListenerTrait {

    /**
     * Toast event listener.
     *
     * @var ToastEventListenerInterface|null
     */
    private $toastEventListener;

    /**
     * Get the Toast event listener.
     *
     * @return ToastEventListenerInterface|null Returns the toast event listener.
     */
    public function getToastEventListener(): ?ToastEventListenerInterface {
        return $this->toastEventListener;
    }

    /**
     * Set the toast event listener.
     *
     * @param ToastEventListenerInterface|null $toastEventListener The toast event listener.
     * @return self Returns this instance.
     */
    protected function setToastEventListener(?ToastEventListenerInterface $toastEventListener): self {
        $this->toastEventListener = $toastEventListener;
        return $this;
    }
}
