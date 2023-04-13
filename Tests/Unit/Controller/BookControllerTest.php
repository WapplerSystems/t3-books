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
class BookControllerTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\WsBooks\Controller\BookController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\WapplerSystems\WsBooks\Controller\BookController::class))
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
    public function listActionFetchesAllBooksFromRepositoryAndAssignsThemToView(): void
    {
        $allBooks = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $bookRepository = $this->getMockBuilder(\WapplerSystems\WsBooks\Domain\Repository\BookRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $bookRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBooks));
        $this->subject->_set('bookRepository', $bookRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('books', $allBooks);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBookToView(): void
    {
        $book = new \WapplerSystems\WsBooks\Domain\Model\Book();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('book', $book);

        $this->subject->showAction($book);
    }
}
