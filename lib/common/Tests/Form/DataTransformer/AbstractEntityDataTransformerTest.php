<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use WBW\Bundle\CommonBundle\Model\User;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Form\DataTransformer\TestAbstractEntityDataTransformer;

/**
 * Abstract entity data transformer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\DataTransformer
 */
class AbstractEntityDataTransformerTest extends AbstractTestCase {

    /**
     * Entity manager.
     *
     * @var EntityManagerInterface|null
     */
    private $entityManager;

    /**
     * User.
     *
     * @var UserInterface|null
     */
    private $user;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a User mock.
        $this->user = $this->getMockBuilder(User::class)->getMock();
        $this->user->expects($this->any())->method("getId")->willReturn(1);

        // Set a find() callback.
        $find = function($id) {
            return 1 === $id ? $this->user : null;
        };

        // Set a repository mock.
        $repository = $this->getMockBuilder(EntityRepository::class)->disableOriginalConstructor()->getMock();
        $repository->expects($this->any())->method("find")->willReturnCallback($find);

        // Set an Entity manager mock.
        $this->entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();
        $this->entityManager->expects($this->any())->method("getRepository")->willReturn($repository);
    }

    /**
     * Test reverseTransform()
     *
     * @return void
     */
    public function testReverseTransform(): void {

        $obj = new TestAbstractEntityDataTransformer($this->entityManager);

        $this->assertNull($obj->reverseTransform(null));
        $this->assertNull($obj->reverseTransform(0));
        $this->assertEquals($this->user, $obj->reverseTransform(1));
    }

    /**
     * Test transform()
     *
     * @return void
     */
    public function testTransform(): void {

        $obj = new TestAbstractEntityDataTransformer($this->entityManager);

        $this->assertEquals(-1, $obj->transform(null));
        $this->assertEquals(-1, $obj->transform($this));
        $this->assertEquals(1, $obj->transform($this->user));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TestAbstractEntityDataTransformer($this->entityManager);

        $this->assertInstanceOf(DataTransformerInterface::class, $obj);

        $this->assertSame($this->entityManager, $obj->getEntityManager());
    }
}
