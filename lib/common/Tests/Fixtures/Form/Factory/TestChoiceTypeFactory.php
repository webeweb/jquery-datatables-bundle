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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory;

use WBW\Bundle\CommonBundle\Form\Factory\ChoiceTypeFactory;

/**
 * Test choice type factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory
 */
class TestChoiceTypeFactory extends ChoiceTypeFactory {

    /**
     * {@inheritDoc}
     */
    public static function getChoiceLabelCallback(): callable {
        return parent::getChoiceLabelCallback();
    }

    /**
     * {@inheritDoc}
     */
    public static function getChoiceValueCallback(): callable {
        return parent::getChoiceValueCallback();
    }
}
