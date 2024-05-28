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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory;

use WBW\Library\Widget\Component\Select\ChoiceValueInterface;

/**
 * Test choice value.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WWBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory
 */
class TestChoiceValue implements ChoiceValueInterface {

    /**
     * {@inheritDoc}
     */
    public function getChoiceValue(): ?string {
        return null;
    }
}
