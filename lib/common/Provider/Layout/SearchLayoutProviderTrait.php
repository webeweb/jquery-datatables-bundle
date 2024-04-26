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

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Search layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait SearchLayoutProviderTrait {

    /**
     * Search layout provider.
     *
     * @var SearchLayoutProviderInterface|null
     */
    private $searchLayoutProvider;

    /**
     * Get the search layout provider.
     *
     * @return SearchLayoutProviderInterface|null Returns the search layout provider.
     */
    public function getSearchLayoutProvider(): ?SearchLayoutProviderInterface {
        return $this->searchLayoutProvider;
    }

    /**
     * Set the search layout provider.
     *
     * @param SearchLayoutProviderInterface|null $searchLayoutProvider The search layout provider.
     * @return self Returns this instance.
     */
    protected function setSearchLayoutProvider(?SearchLayoutProviderInterface $searchLayoutProvider): self {
        $this->searchLayoutProvider = $searchLayoutProvider;
        return $this;
    }
}
