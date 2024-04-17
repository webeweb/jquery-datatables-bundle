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

namespace WBW\Bundle\CommonBundle\Routing;

use Symfony\Component\Routing\RouterInterface;

/**
 * Router trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Routing
 */
trait RouterTrait {

    /**
     * Router.
     *
     * @var RouterInterface|null
     */
    private $router;

    /**
     * Get the router.
     *
     * @return RouterInterface|null Returns the router.
     */
    public function getRouter(): ?RouterInterface {
        return $this->router;
    }

    /**
     * Set the router.
     *
     * @param RouterInterface|null $router The router.
     * @return self Returns this instance.
     */
    protected function setRouter(?RouterInterface $router): self {
        $this->router = $router;
        return $this;
    }
}
