<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Model;

/**
 * Quote trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Model
 */
trait QuoteTrait {

    /**
     * Quote.
     *
     * @var QuoteInterface|null
     */
    protected $quote;

    /**
     * Get the quote.
     *
     * @return QuoteInterface|null Returns the quote.
     */
    public function getQuote(): ?QuoteInterface {
        return $this->quote;
    }

    /**
     * Set the quote.
     *
     * @param QuoteInterface|null $quote The quote.
     * @return self Returns this instance.
     */
    protected function setQuote(?QuoteInterface $quote): self {
        $this->quote = $quote;
        return $this;
    }
}
