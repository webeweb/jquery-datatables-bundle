<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Form\Factory;

use WBW\Bundle\CommonBundle\Form\Factory\ChoiceTypeFactory;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory\TestChoiceTypeFactory;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Form\Factory\TestChoiceValue;
use WBW\Library\Widget\Component\Navigation\NavigationNode;
use WBW\Library\Widget\Component\Select\ChoiceLabelInterface;
use WBW\Library\Widget\Component\Select\ChoiceValueInterface;

/**
 * Choice type factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Form\Factory
 */
class ChoiceFactoryTest extends AbstractTestCase {

    /**
     * Choice values.
     *
     * @var ChoiceValueInterface[]|null
     */
    private $choiceValues;

    /**
     * Choices.
     *
     * @var array<int,string>|null
     */
    private $choices;

    /**
     * Entities.
     *
     * @var NavigationNode[]|null
     */
    private $entities;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a choice values mock.
        $this->choiceValues = [
            $this->getMockBuilder(ChoiceValueInterface::class)->getMock(),
            $this->getMockBuilder(ChoiceValueInterface::class)->getMock(),
        ];

        $this->choiceValues[0]->expects($this->any())->method("getChoiceValue")->willReturn(null);
        $this->choiceValues[1]->expects($this->any())->method("getChoiceValue")->willReturn("value");

        // Set a choices mock.
        $this->choices = [
            0 => "0",
            1 => "1",
            2 => "2",
        ];

        // Set an entities mock.
        $this->entities = [
            new NavigationNode("id1"),
            new NavigationNode("id2"),
            new NavigationNode("id3"),
        ];
    }

    /**
     * Test getChoiceLabelCallback()
     *
     * @return void
     */
    public function testGetChoiceLabelCallback(): void {

        $res = TestChoiceTypeFactory::getChoiceLabelCallback();
        $this->assertIsCallable($res);

        $this->assertEquals("This option must implements " . ChoiceLabelInterface::class, $res($this->choiceValues[0]));
        $this->assertEquals("This option must implements " . ChoiceLabelInterface::class, $res($this->choiceValues[1]));

        $this->assertEquals("This option must implements " . ChoiceLabelInterface::class, $res($this->choices[0]));
        $this->assertEquals("This option must implements " . ChoiceLabelInterface::class, $res($this->choices[1]));

        $this->assertEquals("Empty selection", $res(null));
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res($this->entities[0]));
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res($this->entities[1]));
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res($this->entities[2]));
    }

    /**
     * Test getChoiceValueCallback()
     *
     * @return void
     */
    public function testGetChoiceValueCallback(): void {

        $res = TestChoiceTypeFactory::getChoiceValueCallback();
        $this->assertIsCallable($res);

        $this->assertEquals("", $res($this->choiceValues[0]));
        $this->assertEquals("value", $res($this->choiceValues[1]));
    }

    /**
     * Test newChoiceType()
     *
     * @return void
     */
    public function testNewChoiceType(): void {

        $res = ChoiceTypeFactory::newChoiceType($this->choices);
        $this->assertCount(1, $res);
        $this->assertArrayHasKey("choices", $res);

        $this->assertCount(3, $res["choices"]);
        $this->assertArrayHasKey(0, $res["choices"]);
        $this->assertArrayHasKey(1, $res["choices"]);
        $this->assertArrayHasKey(2, $res["choices"]);

        $this->assertEquals("0", $res["choices"][0]);
        $this->assertEquals("1", $res["choices"][1]);
        $this->assertEquals("2", $res["choices"][2]);
    }

    /**
     * Test newChoiceType()
     *
     * @return void
     */
    public function testNewChoiceTypeWithGroup(): void {

        $res = ChoiceTypeFactory::newChoiceType(["optgroup" => $this->choices], true);
        $this->assertCount(1, $res);
        $this->assertArrayHasKey("choices", $res);

        $this->assertCount(3, $res["choices"]["optgroup"]);
        $this->assertArrayHasKey(0, $res["choices"]["optgroup"]);
        $this->assertArrayHasKey(1, $res["choices"]["optgroup"]);
        $this->assertArrayHasKey(2, $res["choices"]["optgroup"]);

        $this->assertEquals("0", $res["choices"]["optgroup"][0]);
        $this->assertEquals("1", $res["choices"]["optgroup"][1]);
        $this->assertEquals("2", $res["choices"]["optgroup"][2]);
    }

    /**
     * Test the newEntityType method.
     *
     * @return void
     */
    public function testNewEntityType(): void {

        $res = ChoiceTypeFactory::newEntityType(NavigationNode::class, $this->entities);
        $this->assertCount(3, $res);
        $this->assertArrayHasKey("class", $res);
        $this->assertArrayHasKey("choice_label", $res);
        $this->assertArrayHasKey("choices", $res);

        $this->assertEquals(NavigationNode::class, $res["class"]);

        $this->assertCount(3, $res["choices"]);
        $this->assertSame($this->entities[0], $res["choices"][0]);
        $this->assertSame($this->entities[1], $res["choices"][1]);
        $this->assertSame($this->entities[2], $res["choices"][2]);

        $this->assertIsCallable($res["choice_label"]);
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res["choice_label"]($res["choices"][0]));
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res["choice_label"]($res["choices"][1]));
        $this->assertEquals("─ This option must implements " . ChoiceLabelInterface::class, $res["choice_label"]($res["choices"][2]));
    }

    /**
     * Test the newEntityType method.
     *
     * @return void
     */
    public function testNewEntityTypeWithChoiceValueInterface(): void {

        $arg = [
            new TestChoiceValue(),
            new TestChoiceValue(),
        ];

        $res = ChoiceTypeFactory::newEntityType(TestChoiceValue::class, $arg);
        $this->assertCount(4, $res);
        $this->assertArrayHasKey("class", $res);
        $this->assertArrayHasKey("choice_label", $res);
        $this->assertArrayHasKey("choice_value", $res);
        $this->assertArrayHasKey("choices", $res);

        $this->assertEquals(TestChoiceValue::class, $res["class"]);

        $this->assertCount(2, $res["choices"]);
        $this->assertSame($arg[0], $res["choices"][0]);
        $this->assertSame($arg[1], $res["choices"][1]);

        $this->assertIsCallable($res["choice_label"]);

        $this->assertIsCallable($res["choice_value"]);
    }

    /**
     * Test the newEntityType method.
     *
     * @return void
     */
    public function testNewEntityTypeWithEmpty(): void {

        $res = ChoiceTypeFactory::newEntityType(NavigationNode::class, $this->entities, ["empty" => true]);
        $this->assertCount(3, $res);
        $this->assertArrayHasKey("class", $res);
        $this->assertArrayHasKey("choice_label", $res);
        $this->assertArrayHasKey("choices", $res);

        $this->assertEquals(NavigationNode::class, $res["class"]);

        $this->assertCount(4, $res["choices"]);
        $this->assertNull($res["choices"][0]);
        $this->assertSame($this->entities[0], $res["choices"][1]);
        $this->assertSame($this->entities[1], $res["choices"][2]);
        $this->assertSame($this->entities[2], $res["choices"][3]);

        $this->assertIsCallable($res["choice_label"]);
    }

    /**
     * Test the newEntityType method.
     *
     * @return void
     */
    public function testNewEntityTypeWithReflectionException(): void {

        $res = ChoiceTypeFactory::newEntityType("GitHub", $this->entities);
        $this->assertCount(3, $res);
    }
}
