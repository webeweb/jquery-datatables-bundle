<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Quote manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait QuoteManagerTrait {

    /**
     * Quote manager.
     *
     * @var QuoteManagerInterface|null
     */
    private $quoteManager;

    /**
     * Get the quote manager.
     *
     * @return QuoteManagerInterface|null Returns the quote manager.
     */
    public function getQuoteManager(): ?QuoteManagerInterface {
        return $this->quoteManager;
    }

    /**
     * Set the quote manager.
     *
     * @param QuoteManagerInterface|null $quoteManager The quote manager.
     * @return self Returns this instance.
     */
    protected function setQuoteManager(?QuoteManagerInterface $quoteManager): self {
        $this->quoteManager = $quoteManager;
        return $this;
    }
}
