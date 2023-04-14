<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

ExtensionUtility::registerPlugin(
    'WsBooks',
    'Books',
    'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tt_content.CType.wsbooks_books.title',
    'mimetypes-x-content-books',
    'book'
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:ws_books/Configuration/FlexForms/Books.xml',
    'wsbooks_books'
);

// Add the FlexForm to the show item list
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform',
    'wsbooks_books',
    'after:palette:headers'
);