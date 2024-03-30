<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\HttpFoundation;

use Symfony\Component\HttpFoundation\Request;

/**
 * Request trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\HttpFoundation
 */
trait RequestTrait {

    /**
     * Request.
     *
     * @var Request|null
     */
    private $request;

    /**
     * Get the request.
     *
     * @return Request|null Returns the request.
     */
    public function getRequest(): ?Request {
        return $this->request;
    }

    /**
     * Set the request.
     *
     * @param Request|null $request The request.
     * @return self Returns this instance.
     */
    protected function setRequest(?Request $request): self {
        $this->request = $request;
        return $this;
    }
}
