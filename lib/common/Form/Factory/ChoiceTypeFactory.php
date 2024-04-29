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

namespace WBW\Bundle\CommonBundle\Form\Factory;

use ReflectionClass;
use ReflectionException;
use WBW\Library\Common\Helper\ArrayHelper;
use WBW\Library\Widget\Component\Select\ChoiceValueInterface;
use WBW\Library\Widget\Renderer\Component\SelectRenderer;

/**
 * Choice type factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\Factory
 */
class ChoiceTypeFactory {

    /**
     * Get a choice label callback.
     *
     * @return callable Returns the choice label callback.
     */
    protected static function getChoiceLabelCallback(): callable {

        return function($entity): string {
            return SelectRenderer::renderOption($entity);
        };
    }

    /**
     * Get a choice value callback.
     *
     * @return callable Returns the choice value callback.
     */
    protected static function getChoiceValueCallback(): callable {

        return function(?ChoiceValueInterface $entity): ?string {
            return null !== $entity ? $entity->getChoiceValue() : "";
        };
    }

    /**
     * Determine if a class is a choice value interface.
     *
     * @param string $class The class.
     * @return bool Returns true in case of success, false otherwise.
     */
    protected static function isChoiceValueInterface(string $class): bool {

        try {
            return (new ReflectionClass($class))->implementsInterface(ChoiceValueInterface::class);
        } catch (ReflectionException $ex) {
            return false;
        }
    }

    /**
     * Create a choice type.
     *
     * @param array<mixed,mixed> $choices The choices.
     * @param bool $group Group ?
     * @return array<string,mixed> Returns the choice type.
     */
    public static function newChoiceType(array $choices = [], bool $group = false): array {

        $buffer = [];

        if (true === $group) {

            foreach ($choices as $k => $v) {
                $buffer[$k] = array_flip($v);
            }
        } else {
            $buffer = array_flip($choices);
        }

        return [
            "choices" => $buffer,
        ];
    }

    /**
     * Create an entity type.
     *
     * @param string $class The class.
     * @param mixed[] $choices The choices.
     * @param array<string,mixed> $options The options.
     * @return array<string,mixed> $choices Returns the entity type.
     */
    public static function newEntityType(string $class, array $choices = [], array $options = []): array {

        $output = [
            "class"        => $class,
            "choices"      => [],
            "choice_label" => static::getChoiceLabelCallback(),
        ];

        if (true === static::isChoiceValueInterface($class)) {
            $output["choice_value"] = static::getChoiceValueCallback();
        }

        $options["empty"] = ArrayHelper::get($options, "empty", false);
        if (true === $options["empty"]) {
            $output["choices"][] = null;
        }

        $output["choices"] = array_merge($output["choices"], $choices);

        return $output;
    }
}
