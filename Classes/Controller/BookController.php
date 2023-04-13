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
 * BookController
 */
class BookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * bookRepository
     *
     * @var \WapplerSystems\WsBooks\Domain\Repository\BookRepository
     */
    protected $bookRepository = null;

    /**
     * @param \WapplerSystems\WsBooks\Domain\Repository\BookRepository $bookRepository
     */
    public function injectBookRepository(\WapplerSystems\WsBooks\Domain\Repository\BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $books = $this->bookRepository->findAll();
        $this->view->assign('books', $books);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \WapplerSystems\WsBooks\Domain\Model\Book $book
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\WapplerSystems\WsBooks\Domain\Model\Book $book): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('book', $book);
        return $this->htmlResponse();
    }
}
