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

namespace WBW\Bundle\CommonBundle\Provider\Quote;

/**
 * World's wisdom quote provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Symfony\Provider\Quote
 */
class WorldsWisdomQuoteProvider extends YamlQuoteProvider {

    /**
     * Resource path.
     *
     * @var string
     */
    public const RESOURCE_PATH = __DIR__ . "/../../Resources/config/quote/WorldsWisdom.fr.yml";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.quote.worlds_wisdom";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::RESOURCE_PATH);

        $this->load();
    }
}
