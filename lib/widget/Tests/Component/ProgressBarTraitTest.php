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

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestProgressBarTrait;

/**
 * Progress bar trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ProgressBarTraitTest extends AbstractTestCase {

    /**
     * Test setProgressBar()
     *
     * @return void
     */
    public function testSetProgressBar(): void {

        // Set a Progress bar mock.
        $progressBar = $this->getMockBuilder(ProgressBarInterface::class)->getMock();

        $obj = new TestProgressBarTrait();

        $obj->setProgressBar($progressBar);
        $this->assertSame($progressBar, $obj->getProgressBar());
    }
}
