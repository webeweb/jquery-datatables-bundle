<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\CommonBundle\Manager\StylesheetManagerTrait;
use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Stylesheet provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class StylesheetProviderListCommand extends AbstractProviderListCommand {

    use StylesheetManagerTrait {
        setStylesheetManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:stylesheet:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.stylesheet_provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the stylesheet providers")
            ->setHelp(static::formatHelp("list the stylesheet providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var StylesheetProviderInterface $current */
        foreach ($this->getStylesheetManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "command.footer.provider_list.success", "command.footer.provider_list.warning", WBWCommonBundle::getTranslationDomain());

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            $this->translate("command.header.class", [], WBWCommonBundle::getTranslationDomain()),
            $this->translate("command.header.stylesheets", [], WBWCommonBundle::getTranslationDomain()),
        ];
    }

    /**
     * Render a row.
     *
     * @param StylesheetProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(StylesheetProviderInterface $provider): array {

        $length = strlen($this->getHeaders()[1]);
        $format = "%{$length}d";

        return [
            get_class($provider),
            sprintf($format, count($provider->getStylesheets())),
        ];
    }
}
