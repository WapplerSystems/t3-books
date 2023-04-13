<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Sven Wappler <typo3@wappler.systems>
 */
class BookTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\WsBooks\Domain\Model\Book|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \WapplerSystems\WsBooks\Domain\Model\Book::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getSlugReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSlug()
        );
    }

    /**
     * @test
     */
    public function setSlugForStringSetsSlug(): void
    {
        $this->subject->setSlug('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('slug'));
    }

    /**
     * @test
     */
    public function getSubtitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function setSubtitleForStringSetsSubtitle(): void
    {
        $this->subject->setSubtitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('subtitle'));
    }

    /**
     * @test
     */
    public function getPublicationDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPublicationDate()
        );
    }

    /**
     * @test
     */
    public function setPublicationDateForDateTimeSetsPublicationDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublicationDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('publicationDate'));
    }

    /**
     * @test
     */
    public function getIsbnReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getIsbn()
        );
    }

    /**
     * @test
     */
    public function setIsbnForStringSetsIsbn(): void
    {
        $this->subject->setIsbn('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('isbn'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getPrefaceReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPreface()
        );
    }

    /**
     * @test
     */
    public function setPrefaceForStringSetsPreface(): void
    {
        $this->subject->setPreface('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('preface'));
    }

    /**
     * @test
     */
    public function getTableOfContentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTableOfContent()
        );
    }

    /**
     * @test
     */
    public function setTableOfContentForStringSetsTableOfContent(): void
    {
        $this->subject->setTableOfContent('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('tableOfContent'));
    }

    /**
     * @test
     */
    public function getAbstractReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAbstract()
        );
    }

    /**
     * @test
     */
    public function setAbstractForStringSetsAbstract(): void
    {
        $this->subject->setAbstract('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('abstract'));
    }

    /**
     * @test
     */
    public function getBuyLinkReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getBuyLink()
        );
    }

    /**
     * @test
     */
    public function setBuyLinkForStringSetsBuyLink(): void
    {
        $this->subject->setBuyLink('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('buyLink'));
    }

    /**
     * @test
     */
    public function getCoverReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getCover()
        );
    }

    /**
     * @test
     */
    public function setCoverForFileReferenceSetsCover(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setCover($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('cover'));
    }

    /**
     * @test
     */
    public function getSampleReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getSample()
        );
    }

    /**
     * @test
     */
    public function setSampleForFileReferenceSetsSample(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setSample($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('sample'));
    }

    /**
     * @test
     */
    public function getSeriesReturnsInitialValueForSeries(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSeries()
        );
    }

    /**
     * @test
     */
    public function setSeriesForObjectStorageContainingSeriesSetsSeries(): void
    {
        $series = new \WapplerSystems\WsBooks\Domain\Model\Series();
        $objectStorageHoldingExactlyOneSeries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSeries->attach($series);
        $this->subject->setSeries($objectStorageHoldingExactlyOneSeries);

        self::assertEquals($objectStorageHoldingExactlyOneSeries, $this->subject->_get('series'));
    }

    /**
     * @test
     */
    public function addSeriesToObjectStorageHoldingSeries(): void
    {
        $series = new \WapplerSystems\WsBooks\Domain\Model\Series();
        $seriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $seriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($series));
        $this->subject->_set('series', $seriesObjectStorageMock);

        $this->subject->addSeries($series);
    }

    /**
     * @test
     */
    public function removeSeriesFromObjectStorageHoldingSeries(): void
    {
        $series = new \WapplerSystems\WsBooks\Domain\Model\Series();
        $seriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $seriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($series));
        $this->subject->_set('series', $seriesObjectStorageMock);

        $this->subject->removeSeries($series);
    }
}
