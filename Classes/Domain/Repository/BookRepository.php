<?php

declare(strict_types=1);

namespace WapplerSystems\WsBooks\Domain\Repository;


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use WapplerSystems\WsBooks\Domain\Model\Dto\BooksDemand;
use WapplerSystems\WsBooks\Domain\Model\Dto\DemandInterface;
use WapplerSystems\WsBooks\Utility\Validation;

/**
 * This file is part of the "ws_books" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Sven Wappler <typo3@wappler.systems>, WapplerSystems
 */

/**
 * The repository for Books
 */
class BookRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param DemandInterface $demand
     * @param bool $respectEnableFields
     * @param bool $disableLanguageOverlayMode
     * @return QueryInterface
     */
    protected function generateQuery(DemandInterface $demand, $respectEnableFields = true, $disableLanguageOverlayMode = false): QueryInterface
    {
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(false);

        if ($disableLanguageOverlayMode) {
            $query->getQuerySettings()->setLanguageOverlayMode(false);
        }

        $constraints = $this->createConstraintsFromDemand($query, $demand);

        if ($hooks = $GLOBALS['TYPO3_CONF_VARS']['EXT']['ws_books']['Domain/Repository/AbstractDemandedRepository.php']['findDemanded'] ?? []) {
            $params = [
                'demand' => $demand,
                'respectEnableFields' => &$respectEnableFields,
                'query' => $query,
                'constraints' => &$constraints,
            ];
            foreach ($hooks as $reference) {
                GeneralUtility::callUserFunction($reference, $params, $this);
            }
        }

        if ($respectEnableFields === false) {
            $query->getQuerySettings()->setIgnoreEnableFields(true);

            $constraints[] = $query->equals('deleted', 0);
        }

        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }

        if ($orderings = $this->createOrderingsFromDemand($demand)) {
            $query->setOrderings($orderings);
        }

        return $query;
    }


    public function findDemanded(DemandInterface $demand, $respectEnableFields = true, $disableLanguageOverlayMode = false)
    {
        $query = $this->generateQuery($demand, $respectEnableFields, $disableLanguageOverlayMode);

        return $query->execute();
    }


    /**
     * Returns an array of constraints created from a given demand object.
     *
     * @param QueryInterface $query
     * @param DemandInterface $demand
     *
     * @throws \UnexpectedValueException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return (\TYPO3\CMS\Extbase\Persistence\Generic\Qom\AndInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ComparisonInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\NotInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\OrInterface|null)[]
     *
     * @psalm-return array<string, \TYPO3\CMS\Extbase\Persistence\Generic\Qom\AndInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ComparisonInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\NotInterface|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\OrInterface|null>
     */
    protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand): array
    {
        /** @var BooksDemand $demand */
        $constraints = [];

        if ($demand->getAuthor()) {
            $constraints['author'] = $query->equals('author', $demand->getAuthor());
        }

        // storage page
        if ($demand->getStoragePage()) {
            $pidList = GeneralUtility::intExplode(',', $demand->getStoragePage(), true);
            $constraints['pid'] = $query->in('pid', $pidList);
        }

        // month & year OR year only
        if ($demand->getYear() > 0) {
            if (null === $demand->getDateField()) {
                throw new \InvalidArgumentException('No Datefield is set, therefore no Datemenu is possible!');
            }
            if ($demand->getMonth() > 0) {
                if ($demand->getDay() > 0) {
                    $begin = mktime(0, 0, 0, $demand->getMonth(), $demand->getDay(), $demand->getYear());
                    $end = mktime(23, 59, 59, $demand->getMonth(), $demand->getDay(), $demand->getYear());
                } else {
                    $begin = mktime(0, 0, 0, $demand->getMonth(), 1, $demand->getYear());
                    $end = mktime(23, 59, 59, ($demand->getMonth() + 1), 0, $demand->getYear());
                }
            } else {
                $begin = mktime(0, 0, 0, 1, 1, $demand->getYear());
                $end = mktime(23, 59, 59, 12, 31, $demand->getYear());
            }
            $constraints['datetime'] = $query->logicalAnd([
                $query->greaterThanOrEqual($demand->getDateField(), $begin),
                $query->lessThanOrEqual($demand->getDateField(), $end)
            ]);
        }

        // Clean not used constraints
        foreach ($constraints as $key => $value) {
            if (null === $value) {
                unset($constraints[$key]);
            }
        }

        return $constraints;
    }



    protected function createOrderingsFromDemand(DemandInterface $demand): array
    {
        $orderings = [];

        if (Validation::isValidOrdering($demand->getOrder(), 'sorting,crdate,title,publicationDate')) {
            $orderList = GeneralUtility::trimExplode(',', $demand->getOrder(), true);

            if (!empty($orderList)) {
                // go through every order statement
                foreach ($orderList as $orderItem) {
                    $orderSplit = GeneralUtility::trimExplode(' ', $orderItem, true);
                    $orderField = $orderSplit[0];
                    $ascDesc = $orderSplit[1] ?? '';
                    if ($ascDesc) {
                        $orderings[$orderField] = ((strtolower($ascDesc) === 'desc') ?
                            QueryInterface::ORDER_DESCENDING :
                            QueryInterface::ORDER_ASCENDING);
                    } else {
                        $orderings[$orderField] = QueryInterface::ORDER_ASCENDING;
                    }
                }
            }
        }

        return $orderings;
    }

}
