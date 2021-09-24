<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * List DataTables provider command.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Command
 */
class ListDataTablesProviderCommand extends AbstractCommand {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }

    /**
     * Command help.
     *
     * @var string
     */
    const COMMAND_HELP = <<< EOT
The <info>%command.name%</info> command list the DatTables providers.

    <info>php %command.full_name%</info>


EOT;

    /**
     * Command name.
     *
     * @var string
     */
    const COMMAND_NAME = "wbw:jquery:datatables:list-provider";

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "wbw.jquery.datatables.command.list_provider";

    /**
     * {@inheritDoc}
     */
    protected function configure() {
        $this
            ->setDescription("List the DataTables providers")
            ->setHelp(self::COMMAND_HELP)
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        foreach ($this->getDataTablesManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {
        return [
            $this->translate("label.name"),
            $this->translate("label.class"),
            $this->translate("label.columns"),
            $this->translate("label.entity"),
            $this->translate("label.prefix"),
            $this->translate("label.view"),
        ];
    }

    /**
     * Render a row.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(DataTablesProviderInterface $provider): array {
        return [
            $provider->getName(),
            get_class($provider),
            count($provider->getColumns()),
            $provider->getEntity(),
            $provider->getPrefix(),
            $provider->getView(),
        ];
    }

    /**
     * Sort the rows.
     *
     * @param array $rows The rows.
     * @return void
     */
    protected function sortRows(array &$rows): void {
        usort($rows, function(array $a, array $b) {
            return strcmp($a[0], $b[0]);
        });
    }
}