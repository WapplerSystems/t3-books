<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Sven Wappler <typo3@wappler.systems>
 */
class SeriesControllerTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\WsBooks\Controller\SeriesController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\WapplerSystems\WsBooks\Controller\SeriesController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllSeriesFromRepositoryAndAssignsThemToView(): void
    {
        $allSeries = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $seriesRepository = $this->getMockBuilder(\WapplerSystems\WsBooks\Domain\Repository\SeriesRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $seriesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSeries));
        $this->subject->_set('seriesRepository', $seriesRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('series', $allSeries);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSeriesToView(): void
    {
        $series = new \WapplerSystems\WsBooks\Domain\Model\Series();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('series', $series);

        $this->subject->showAction($series);
    }
}
