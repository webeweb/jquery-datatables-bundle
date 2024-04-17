<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

/**
 * Progress bar trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 */
trait ProgressBarTrait {

    /**
     * Progress bar.
     *
     * @var ProgressBarInterface|null
     */
    protected $progressBar;

    /**
     * Get the progress bar.
     *
     * @return ProgressBarInterface|null Returns the progress bar.
     */
    public function getProgressBar(): ?ProgressBarInterface {
        return $this->progressBar;
    }

    /**
     * Set the progress bar.
     *
     * @param ProgressBarInterface|null $progressBar The progress bar.
     * @return self Returns this instance.
     */
    protected function setProgressBar(?ProgressBarInterface $progressBar): self {
        $this->progressBar = $progressBar;
        return $this;
    }
}
