<?php

declare(strict_types=1);

/*
 * This file is part of the "info_hide_default_lang" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Brotkrueml\InfoHideDefaultLang\Extension;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'info-hide-default-lang-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:' . Extension::KEY . '/Resources/Public/Icons/Extension.svg',
    ],
];
