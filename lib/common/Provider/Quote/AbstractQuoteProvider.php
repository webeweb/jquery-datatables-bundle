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

namespace WBW\Bundle\CommonBundle\Provider\Quote;

use WBW\Bundle\CommonBundle\Model\QuoteInterface;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;

/**
 * Abstract quote provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Quote
 * @abstract
 */
abstract class AbstractQuoteProvider implements QuoteProviderInterface {

    /**
     * Quotes.
     *
     * @var QuoteInterface[]|null
     */
    protected $quotes;

    /**
     * Constructor.
     */
    protected function __construct() {
        $this->setQuotes([]);
    }

    /**
     *{@inheritDoc}
     */
    public function getAuthors(): array {

        $authors = [];

        foreach ($this->quotes as $current) {

            if (false === in_array($current->getAuthor(), $authors)) {
                $authors[] = $current->getAuthor();
            }
        }

        asort($authors);

        return $authors;
    }

    /**
     * {@onheritDoc}
     */
    public function getQuotes(): array {
        return $this->quotes;
    }

    /**
     * Set the quotes.
     *
     * @param QuoteInterface[] $quotes The quotes.
     * @return QuoteProviderInterface Returns this quote provider.
     */
    protected function setQuotes(array $quotes): QuoteProviderInterface {
        $this->quotes = $quotes;
        return $this;
    }
}
