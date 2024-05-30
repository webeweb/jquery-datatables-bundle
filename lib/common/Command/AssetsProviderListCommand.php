<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;
use WBW\Library\Widget\Helper\AssetsHelper;

/**
 * Assets provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class AssetsProviderListCommand extends AbstractCommand {

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:assets:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.assets_provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the assets providers")
            ->setHelp(static::formatHelp("list the assets providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        $bundles = $this->getKernel()->getBundles();
        foreach ($bundles as $current) {

            if (false === ($current instanceof AssetsProviderInterface)) {
                continue;
            }

            $folder = $current->getPath() . $current->getAssetsRelativeDirectory();
            $assets = AssetsHelper::listAssets($folder);

            $rows[] = $this->renderRow($current, count($assets));
        }

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
            $this->translate("command.header.bundle", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.assets", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.name", [], WBWCommonBundle::getTranslationDomain(), "en"),
            "",
        ];
    }

    /**
     * Render the row.
     *
     * @param BundleInterface $bundle The bundle.
     * @param int $assets The assets.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(BundleInterface $bundle, int $assets): array {

        $length = strlen($this->getHeaders()[1]);
        $format = "%{$length}d";

        return [
            get_class($bundle),
            sprintf($format, $assets),
            $bundle->getName(),
            static::formatCheckbox(0 < $assets),
        ];
    }
}
