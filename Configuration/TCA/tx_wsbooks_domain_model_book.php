<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,slug,subtitle,isbn,description,preface,table_of_content,abstract,buy_link',
        'iconfile' => 'EXT:ws_books/Resources/Public/Icons/tx_wsbooks_domain_model_book.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, slug, subtitle, publication_date, isbn, description, preface, table_of_content, abstract, buy_link, cover, sample, series, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_wsbooks_domain_model_book',
                'foreign_table_where' => 'AND {#tx_wsbooks_domain_model_book}.{#pid}=###CURRENT_PID### AND {#tx_wsbooks_domain_model_book}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.title',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.slug',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.slug.description',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'], // TODO: adjust this field to the one you want to use
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInPid',
            ],
            
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.subtitle',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.subtitle.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'publication_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.publication_date',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.publication_date.description',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'isbn' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.isbn',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.isbn.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.description',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.description.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'preface' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.preface',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.preface.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'table_of_content' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.table_of_content',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.table_of_content.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'abstract' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.abstract',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.abstract.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'buy_link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.buy_link',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.buy_link.description',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
            ]
        ],
        'cover' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.cover',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.cover.description',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'cover',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'cover',
                        'tablenames' => 'tx_wsbooks_domain_model_book',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'sample' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.sample',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.sample.description',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'sample',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'sample',
                        'tablenames' => 'tx_wsbooks_domain_model_book',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ]
            ),
            
        ],
        'series' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.series',
            'description' => 'LLL:EXT:ws_books/Resources/Private/Language/Backend.xlf:tx_wsbooks_domain_model_book.series.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_wsbooks_domain_model_series',
                'MM' => 'tx_wsbooks_book_series_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];
