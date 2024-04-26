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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Quote;

use WBW\Bundle\CommonBundle\Provider\Quote\AbstractQuoteProvider;

/**
 * Test abstract quote provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Provider
 */
class TestAbstractQuoteProvider extends AbstractQuoteProvider {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    public function getDomain(): string {
        return "test";
    }
}
