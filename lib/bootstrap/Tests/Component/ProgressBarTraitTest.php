<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\ProgressBarInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestProgressBarTrait;

/**
 * Progress bar trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class ProgressBarTraitTest extends AbstractTestCase {

    /**
     * Test setProgressBar()
     *
     * @return void
     */
    public function testSetProgressBar(): void {

        // Set a ProgressBar mock.
        $progressBar = $this->getMockBuilder(ProgressBarInterface::class)->getMock();

        $obj = new TestProgressBarTrait();

        $obj->setProgressBar($progressBar);
        $this->assertSame($progressBar, $obj->getProgressBar());
    }
}