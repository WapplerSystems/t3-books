<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Controller;


/**
 * This file is part of the "Books" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Wappler <typo3@wappler.systems>, WapplerSystems
 */

/**
 * SeriesController
 */
class SeriesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * seriesRepository
     *
     * @var \WapplerSystems\WsBooks\Domain\Repository\SeriesRepository
     */
    protected $seriesRepository = null;

    /**
     * @param \WapplerSystems\WsBooks\Domain\Repository\SeriesRepository $seriesRepository
     */
    public function injectSeriesRepository(\WapplerSystems\WsBooks\Domain\Repository\SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $series = $this->seriesRepository->findAll();
        $this->view->assign('series', $series);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \WapplerSystems\WsBooks\Domain\Model\Series $series
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\WapplerSystems\WsBooks\Domain\Model\Series $series): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('series', $series);
        return $this->htmlResponse();
    }
}
