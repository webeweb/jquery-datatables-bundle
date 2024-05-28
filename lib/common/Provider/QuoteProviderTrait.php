<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Provider;

/**
 * Quote provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider
 */
trait QuoteProviderTrait {

    /**
     * Quote provider.
     *
     * @var QuoteProviderInterface|null
     */
    protected $quoteProvider;

    /**
     * Get the quote provider.
     *
     * @return QuoteProviderInterface|null Returns the quote provider.
     */
    public function getQuoteProvider(): ?QuoteProviderInterface {
        return $this->quoteProvider;
    }

    /**
     * Set the quote provider.
     *
     * @param QuoteProviderInterface|null $quoteProvider The quote provider.
     * @return self Returns this instance.
     */
    protected function setQuoteProvider(?QuoteProviderInterface $quoteProvider): self {
        $this->quoteProvider = $quoteProvider;
        return $this;
    }
}
