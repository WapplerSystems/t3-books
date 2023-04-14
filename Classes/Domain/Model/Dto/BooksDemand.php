<?php

namespace WapplerSystems\WsBooks\Domain\Model\Dto;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;


class BooksDemand extends AbstractEntity implements DemandInterface
{
    /**
     * @var array
     */
    protected $categories = [];


    /**
     * @var string
     */
    protected $author = '';


    /** @var string */
    protected $dateField = '';

    /** @var int */
    protected $month = 0;

    /** @var int */
    protected $year = 0;

    /** @var int */
    protected $day = 0;

    /** @var string */
    protected $searchFields = '';

    /** @var string */
    protected $order = '';

    /** @var string */
    protected $storagePage = '';

    /** @var string */
    protected $action = '';


    /**
     * List of allowed types
     *
     * @var array
     */
    protected $types = [];

    /**
     * Holding custom data, use e.g. your ext key as array key
     *
     * @var array
     */
    protected $_customSettings = [];


    /**
     * List of allowed categories
     *
     * @param array $categories categories
     * @return BooksDemand
     */
    public function setCategories(array $categories): BooksDemand
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Get allowed categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }


    /**
     * Set author
     *
     * @param string $author
     * @return BooksDemand
     */
    public function setAuthor(string $author): BooksDemand
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }


    /**
     * Set order
     *
     * @param string $order order
     * @return BooksDemand
     */
    public function setOrder(string $order): BooksDemand
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * Set list of storage pages
     *
     * @param string $storagePage storage page list
     * @return BooksDemand
     */
    public function setStoragePage(string $storagePage): BooksDemand
    {
        $this->storagePage = $storagePage;
        return $this;
    }

    /**
     * Get list of storage pages
     *
     * @return string
     */
    public function getStoragePage(): string
    {
        return $this->storagePage;
    }

    /**
     * Get day restriction
     *
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * Set day restriction
     *
     * @param int $day
     * @return BooksDemand
     */
    public function setDay(int $day): BooksDemand
    {
        $this->day = (int)$day;
        return $this;
    }

    /**
     * Get month restriction
     *
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * Set month restriction
     *
     * @param int $month month
     * @return BooksDemand
     */
    public function setMonth(int $month): BooksDemand
    {
        $this->month = (int)$month;
        return $this;
    }

    /**
     * Get year restriction
     *
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Set year restriction
     *
     * @param int $year year
     * @return BooksDemand
     */
    public function setYear(int $year): BooksDemand
    {
        $this->year = (int)$year;
        return $this;
    }


    /**
     * Set date field which is used for datemenu
     *
     * @param string $dateField datefield
     * @return BooksDemand
     */
    public function setDateField(string $dateField): BooksDemand
    {
        $this->dateField = $dateField;
        return $this;
    }

    /**
     * Get date field which is used for datemenu
     *
     * @return string
     */
    public function getDateField(): string
    {
        if (in_array($this->dateField, ['datetime', 'archive'], true)
            || isset($GLOBALS['TCA']['tx_news_domain_model_news']['columns'][$this->dateField])) {
            return $this->dateField;
        }

        return '';
    }


    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return BooksDemand
     */
    public function setAction(string $action): BooksDemand
    {
        $this->action = $action;
        return $this;
    }


}
