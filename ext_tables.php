<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsbooks_domain_model_book', 'EXT:ws_books/Resources/Private/Language/locallang_csh_tx_wsbooks_domain_model_book.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsbooks_domain_model_book');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsbooks_domain_model_series', 'EXT:ws_books/Resources/Private/Language/locallang_csh_tx_wsbooks_domain_model_series.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsbooks_domain_model_series');
})();
