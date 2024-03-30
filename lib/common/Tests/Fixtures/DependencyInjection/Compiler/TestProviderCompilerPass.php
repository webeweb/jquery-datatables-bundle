<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Compiler\AbstractProviderCompilerPass;

/**
 * Test provider compiler pass.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\DependencyInjection\Compiler
 */
class TestProviderCompilerPass extends AbstractProviderCompilerPass {

    /**
     *{@inheritDoc}
     */
    public function process(ContainerBuilder $container): void {
        $this->processing($container, "wbw.common.manager.test", "wbw.common.provider.test");
    }
}
