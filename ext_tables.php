<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(static function() {
    ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsbooks_domain_model_book', 'EXT:ws_books/Resources/Private/Language/locallang_csh_tx_wsbooks_domain_model_book.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_wsbooks_domain_model_book');

    ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsbooks_domain_model_series', 'EXT:ws_books/Resources/Private/Language/locallang_csh_tx_wsbooks_domain_model_series.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_wsbooks_domain_model_series');
})();
