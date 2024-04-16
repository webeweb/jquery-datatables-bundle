<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Component;

/**
 * Alert trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component
 */
trait AlertTrait {

    /**
     * Alert.
     *
     * @var AlertInterface|null
     */
    protected $alert;

    /**
     * Get the alert.
     *
     * @return AlertInterface|null Returns the alert.
     */
    public function getAlert(): ?AlertInterface {
        return $this->alert;
    }

    /**
     * Set the alert.
     *
     * @param AlertInterface|null $alert The alert.
     * @return self Returns this instance.
     */
    public function setAlert(?AlertInterface $alert): self {
        $this->alert = $alert;
        return $this;
    }
}
