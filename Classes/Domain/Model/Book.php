<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Domain\Model;


/**
 * This file is part of the "Books" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Wappler <typo3@wappler.systems>, WapplerSystems
 */

/**
 * Book
 */
class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = null;

    /**
     * slug
     *
     * @var string
     */
    protected $slug = null;

    /**
     * subtitle
     *
     * @var string
     */
    protected $subtitle = null;

    /**
     * publicationDate
     *
     * @var \DateTime
     */
    protected $publicationDate = null;

    /**
     * isbn
     *
     * @var string
     */
    protected $isbn = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * preface
     *
     * @var string
     */
    protected $preface = '';

    /**
     * tableOfContent
     *
     * @var string
     */
    protected $tableOfContent = '';

    /**
     * abstract
     *
     * @var string
     */
    protected $abstract = '';

    /**
     * buyLink
     *
     * @var string
     */
    protected $buyLink = '';

    /**
     * cover
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cover = null;

    /**
     * sample
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $sample = null;

    /**
     * series
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WapplerSystems\WsBooks\Domain\Model\Series>
     */
    protected $series = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->series = $this->series ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * Returns the subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Sets the publicationDate
     *
     * @param \DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(\DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Returns the isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Sets the isbn
     *
     * @param string $isbn
     * @return void
     */
    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the preface
     *
     * @return string
     */
    public function getPreface()
    {
        return $this->preface;
    }

    /**
     * Sets the preface
     *
     * @param string $preface
     * @return void
     */
    public function setPreface(string $preface)
    {
        $this->preface = $preface;
    }

    /**
     * Returns the tableOfContent
     *
     * @return string
     */
    public function getTableOfContent()
    {
        return $this->tableOfContent;
    }

    /**
     * Sets the tableOfContent
     *
     * @param string $tableOfContent
     * @return void
     */
    public function setTableOfContent(string $tableOfContent)
    {
        $this->tableOfContent = $tableOfContent;
    }

    /**
     * Returns the abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Sets the abstract
     *
     * @param string $abstract
     * @return void
     */
    public function setAbstract(string $abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * Returns the buyLink
     *
     * @return string
     */
    public function getBuyLink()
    {
        return $this->buyLink;
    }

    /**
     * Sets the buyLink
     *
     * @param string $buyLink
     * @return void
     */
    public function setBuyLink(string $buyLink)
    {
        $this->buyLink = $buyLink;
    }

    /**
     * Returns the cover
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Sets the cover
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $cover
     * @return void
     */
    public function setCover(\TYPO3\CMS\Extbase\Domain\Model\FileReference $cover)
    {
        $this->cover = $cover;
    }

    /**
     * Returns the sample
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getSample()
    {
        return $this->sample;
    }

    /**
     * Sets the sample
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $sample
     * @return void
     */
    public function setSample(\TYPO3\CMS\Extbase\Domain\Model\FileReference $sample)
    {
        $this->sample = $sample;
    }

    /**
     * Adds a Series
     *
     * @param \WapplerSystems\WsBooks\Domain\Model\Series $series
     * @return void
     */
    public function addSeries(\WapplerSystems\WsBooks\Domain\Model\Series $series)
    {
        $this->series->attach($series);
    }

    /**
     * Removes a Series
     *
     * @param \WapplerSystems\WsBooks\Domain\Model\Series $seriesToRemove The Series to be removed
     * @return void
     */
    public function removeSeries(\WapplerSystems\WsBooks\Domain\Model\Series $seriesToRemove)
    {
        $this->series->detach($seriesToRemove);
    }

    /**
     * Returns the series
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WapplerSystems\WsBooks\Domain\Model\Series>
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Sets the series
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WapplerSystems\WsBooks\Domain\Model\Series> $series
     * @return void
     */
    public function setSeries(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $series)
    {
        $this->series = $series;
    }
}
