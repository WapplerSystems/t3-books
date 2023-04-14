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

})();
