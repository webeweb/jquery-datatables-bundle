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

namespace WBW\Bundle\BootstrapBundle\Twig\Extension\Component;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Twig\TwigFunction;
use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;
use WBW\Library\Common\Helper\ArrayHelper;

/**
 * Label Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Twig\Extension\Component
 * @link https://getbootstrap.com/docs/3.3/components/#labels
 */
class LabelTwigExtension extends AbstractLabelTwigExtension {

    use TranslatorTrait {
        setTranslator as public;
    }

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.bootstrap.twig.extension.component.label";

    /**
     * Render a Bootstrap label "danger".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "danger".
     */
    public function bootstrapLabelDangerFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_DANGER);
    }

    /**
     * Render a Bootstrap label "default".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "default".
     */
    public function bootstrapLabelDefaultFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_DEFAULT);
    }

    /**
     * Render a Bootstrap label "info".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "info".
     */
    public function bootstrapLabelInfoFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_INFO);
    }

    /**
     * Render a Bootstrap label "primary".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "primary".
     */
    public function bootstrapLabelPrimaryFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY);
    }

    /**
     * Render a Bootstrap label "roles".
     *
     * @param UserInterface|null $user The user.
     * @param array<string,string> $roleChoices The role choices.
     * @param array<string,string> $roleColors The role colors.
     * @param string|null $domain The translation domain.
     * @return string|null Returns the Bootstrap role label.
     */
    public function bootstrapLabelRolesFunction(?UserInterface $user, array $roleChoices = [], array $roleColors = [], string $domain = null): ?string {

        if (null === $user) {
            return null;
        }

        $output = [];

        /** @var Role|string $current */
        foreach ($user->getRoles() as $current) {

            $role = true === $current instanceof Role ? $current->getRole() : $current;

            $trans = $role;
            if (true === array_key_exists($role, $roleChoices)) {
                $trans = $this->translate($roleChoices[$role], [], $domain);
            }

            $label = $this->bootstrapLabelDefaultFunction(["content" => $trans]);
            if (true === array_key_exists($role, $roleColors)) {
                $label = $this->setBackgroundColor($label, $trans, $roleColors[$role]);
            }

            $output[] = $label;
        }

        return implode(" ", $output);
    }

    /**
     * Render a Bootstrap label "success".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "success".
     */
    public function bootstrapLabelSuccessFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_SUCCESS);
    }

    /**
     * Render a Bootstrap label "warning".
     *
     * @param array<string,mixed> $args The arguments.
     * @return string Returns the Bootstrap label "warning".
     */
    public function bootstrapLabelWarningFunction(array $args = []): string {
        return $this->bootstrapLabel(ArrayHelper::get($args, "content"), "label-" . WBWBootstrapBundle::BOOTSTRAP_TYPE_WARNING);
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        if (3 === $this->getVersion()) {
            return $this->getFunctions3();
        }

        return [];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    protected function getFunctions3(): array {

        return [
            new TwigFunction("bootstrapLabelDanger", [$this, "bootstrapLabelDangerFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelDanger", [$this, "bootstrapLabelDangerFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelDefault", [$this, "bootstrapLabelDefaultFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelDefault", [$this, "bootstrapLabelDefaultFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelInfo", [$this, "bootstrapLabelInfoFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelInfo", [$this, "bootstrapLabelInfoFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelPrimary", [$this, "bootstrapLabelPrimaryFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelPrimary", [$this, "bootstrapLabelPrimaryFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelSuccess", [$this, "bootstrapLabelSuccessFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelSuccess", [$this, "bootstrapLabelSuccessFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelWarning", [$this, "bootstrapLabelWarningFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelWarning", [$this, "bootstrapLabelWarningFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("bootstrapLabelRoles", [$this, "bootstrapLabelRolesFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("bsLabelRoles", [$this, "bootstrapLabelRolesFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Set a background color.
     *
     * @param string $label The label.
     * @param string $content The content.
     * @param string $color The color.
     * @return string Returns the label with applied color.
     */
    private function setBackgroundColor(string $label, string $content, string $color): string {

        $searches = ">" . $content;
        $replaces = ' style="background-color: ' . $color . ';"' . $searches;

        return str_replace([$searches], [$replaces], $label);
    }
}
