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
use WBW\Bundle\CommonBundle\Manager\QuoteManagerTrait;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;

/**
 * Quote provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Command
 */
class QuoteProviderListCommand extends AbstractProviderListCommand {

    use QuoteManagerTrait {
        setQuoteManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:common:quote:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.command.quote_provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the quote providers")
            ->setHelp(static::formatHelp("list the quote providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var QuoteProviderInterface $current */
        foreach ($this->getQuoteManager()->getProviders() as $current) {
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
            $this->translate("command.header.quotes", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.authors", [], WBWCommonBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.domain", [], WBWCommonBundle::getTranslationDomain(), "en"),
            "",
        ];
    }

    /**
     * Render a row.
     *
     * @param QuoteProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(QuoteProviderInterface $provider): array {

        $length = [
            strlen($this->getHeaders()[1]),
            strlen($this->getHeaders()[2]),
        ];
        $format = [
            "%$length[0]d",
            "%$length[1]d",
        ];

        $number = count($provider->getQuotes());

        return [
            get_class($provider),
            sprintf($format[0], $number),
            sprintf($format[1], count($provider->getAuthors())),
            $provider->getDomain(),
            static::formatCheckbox(366 === $number),
        ];
    }
}
