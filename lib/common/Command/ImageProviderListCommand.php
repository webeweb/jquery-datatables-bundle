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

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\CommonBundle\Manager\ImageManagerTrait;
use WBW\Bundle\CommonBundle\Provider\ImageProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Image provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class ImageProviderListCommand extends AbstractProviderListCommand {

    use ImageManagerTrait {
        setImageManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:image:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.image_provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the image providers")
            ->setHelp(static::formatHelp("list the image providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var ImageProviderInterface $current */
        foreach ($this->getImageManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "command.footer.provider_list.success", "command.footer.provider_list.warning", WBWCommonBundle::getTranslationDomain(), "en");

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            $this->translate("command.header.service", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.images", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.name", [], WBWCommonBundle::getTranslationDomain(), "en"),
            "",
        ];
    }

    /**
     * Render a row.
     *
     * @param ImageProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(ImageProviderInterface $provider): array {

        $length = strlen($this->getHeaders()[1]);
        $format = "%{$length}d";

        $number = count($provider->getImages());

        return [
            get_class($provider),
            sprintf($format, $number),
            $provider->getName(),
            static::formatCheckbox(0 < $number),
        ];
    }
}
