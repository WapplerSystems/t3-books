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
class BookSeriesTest extends UnitTestCase
{
    /**
     * @var \WapplerSystems\WsBooks\Domain\Model\BookSeries|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \WapplerSystems\WsBooks\Domain\Model\BookSeries::class,
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
    public function dummyTestToNotLeaveThisFileEmpty(): void
    {
        self::markTestIncomplete();
    }
}
