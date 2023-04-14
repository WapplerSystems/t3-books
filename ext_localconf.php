<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use WapplerSystems\WsBooks\Controller\BookController;

defined('TYPO3') || die();

(static function() {
    ExtensionUtility::configurePlugin(
        'WsBooks',
        'Books',
        [
            BookController::class => 'list, show',
        ],
        [
            BookController::class => '',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // wizards
    ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = ws_books-plugin-list
                        title = LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_ws_books_list.name
                        description = LLL:EXT:ws_books/Resources/Private/Language/locallang_db.xlf:tx_ws_books_list.description
                        tt_content_defValues {
                            CType = list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
