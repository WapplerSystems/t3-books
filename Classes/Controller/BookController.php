<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Controller;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use WapplerSystems\WsBooks\Domain\Model\Book;
use WapplerSystems\WsBooks\Domain\Model\Dto\BooksDemand;
use WapplerSystems\WsBooks\Domain\Repository\BookRepository;
use WapplerSystems\WsBooks\Utility\Page;

/**
 * This file is part of the "ws_books" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Wappler <typo3@wappler.systems>, WapplerSystems
 */

/**
 * BookController
 */
class BookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * bookRepository
     *
     * @var BookRepository
     */
    protected $bookRepository = null;


    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * action list
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $demand = $this->createDemandObjectFromSettings($this->settings);

        $books = $this->bookRepository->findDemanded($demand);

        $this->view->assignMultiple([
            'books' => $books,
            'settings' => $this->settings,
        ]);


        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param Book $book
     * @return ResponseInterface
     */
    public function showAction(Book $book): ResponseInterface
    {
        $this->view->assign('book', $book);
        return $this->htmlResponse();
    }


    /**
     * Create the demand object which define which records will get shown
     *
     * @param array $settings
     * @param string $class optional class which must be an instance of \GeorgRinger\News\Domain\Model\Dto\NewsDemand
     * @return BooksDemand
     */
    protected function createDemandObjectFromSettings(
        array $settings,
              $class = BooksDemand::class
    ): BooksDemand
    {
        $class = isset($settings['demandClass']) && !empty($settings['demandClass']) ? $settings['demandClass'] : $class;

        /* @var $demand BooksDemand */
        $demand = GeneralUtility::makeInstance($class, $settings);
        if (!$demand instanceof BooksDemand) {
            throw new \UnexpectedValueException(
                sprintf(
                    'The demand object must be an instance of %s, but %s given!',
                    BooksDemand::class,
                    $class
                ),
                1423157953
            );
        }

        $demand->setCategories(GeneralUtility::trimExplode(',', $settings['categories'] ?? '', true));

        if ($settings['orderBy'] ?? '') {
            $demand->setOrder($settings['orderBy'] . ' ' . $settings['orderDirection']);
        }

        //$demand->setDateField((string)($settings['dateField'] ?? ''));
        //$demand->setMonth((int)($settings['month'] ?? 0));
        //$demand->setYear((int)($settings['year'] ?? 0));

        $demand->setStoragePage(Page::extendPidListByChildren(
            (string)($settings['startingpoint'] ?? ''),
            (int)($settings['recursive'] ?? 0)
        ));

        if ($hooks = $GLOBALS['TYPO3_CONF_VARS']['EXT']['ws_books']['Controller/NewsController.php']['createDemandObjectFromSettings'] ?? []) {
            $params = [
                'demand' => $demand,
                'settings' => $settings,
                'class' => $class,
            ];
            foreach ($hooks as $reference) {
                GeneralUtility::callUserFunction($reference, $params, $this);
            }
        }
        return $demand;
    }

}
