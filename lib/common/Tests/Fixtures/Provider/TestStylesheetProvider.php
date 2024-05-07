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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Provider;

use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;

/**
 * Test stylesheet provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Provider
 */
class TestStylesheetProvider implements StylesheetProviderInterface {

    /**
     * Service name.
     *
     * @ver string
     */
    const SERVICE_NAME = "wbw.common.tests.fixtures.provider.test_stylesheet";

    /**
     * {@inheritDoc}
     */
    public function getStylesheets(): array {

        return [
            "WBWCommonTest" => "@WBWCommon/assets/WBWCommonTest.css.twig",
        ];
    }
}
