<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Application layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait ApplicationLayoutProviderTrait {

    /**
     * Application layout provider.
     *
     * @var ApplicationLayoutProviderInterface|null
     */
    private $applicationLayoutProvider;

    /**
     * Get the application layout provider.
     *
     * @return ApplicationLayoutProviderInterface|null Returns the application layout provider.
     */
    public function getApplicationLayoutProvider(): ?ApplicationLayoutProviderInterface {
        return $this->applicationLayoutProvider;
    }

    /**
     * Set the application layout provider.
     *
     * @param ApplicationLayoutProviderInterface|null $applicationLayoutProvider The application layout provider.
     * @return self Returns this instance.
     */
    protected function setApplicationLayoutProvider(?ApplicationLayoutProviderInterface $applicationLayoutProvider): self {
        $this->applicationLayoutProvider = $applicationLayoutProvider;
        return $this;
    }
}
