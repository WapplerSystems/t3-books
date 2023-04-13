<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'WsBooks',
        'List',
        [
            \WapplerSystems\WsBooks\Controller\BookController::class => 'list, show',
            \WapplerSystems\WsBooks\Controller\SeriesController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \WapplerSystems\WsBooks\Controller\BookController::class => '',
            \WapplerSystems\WsBooks\Controller\SeriesController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = ws_books-plugin-list
                        title = LLL:EXT:ws_books/Resources/Private/Language/locallang_db.xlf:tx_ws_books_list.name
                        description = LLL:EXT:ws_books/Resources/Private/Language/locallang_db.xlf:tx_ws_books_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = wsbooks_list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
