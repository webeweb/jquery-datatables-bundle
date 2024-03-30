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

namespace WBW\Bundle\CommonBundle\HttpFoundation;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Request stack trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\HttpFoundation
 */
trait RequestStackTrait {

    /**
     * Request stack.
     *
     * @var RequestStack|null
     */
    private $requestStack;

    /**
     * Get the request stack.
     *
     * @return RequestStack|null Returns the request stack.
     */
    public function getRequestStack(): ?RequestStack {
        return $this->requestStack;
    }

    /**
     * Set the request stack.
     *
     * @param RequestStack|null $requestStack The request stack.
     * @return self Returns this instance.
     */
    protected function setRequestStack(?RequestStack $requestStack): self {
        $this->requestStack = $requestStack;
        return $this;
    }
}
