<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Translation;

use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;

/**
 * Test translator trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Translation
 */
class TestTranslatorTrait {

    use TranslatorTrait {
        setTranslator as public;
        translate as public;
    }
}
