<?php

declare(strict_types=1);

/*
 * This file is part of the "info_hide_default_lang" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Brotkrueml\InfoHideDefaultLang\EventListener;

use Brotkrueml\InfoHideDefaultLang\Extension;
use TYPO3\CMS\Backend\Controller\Event\ModifyPageLayoutContentEvent;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\View\ViewFactoryData;
use TYPO3\CMS\Core\View\ViewFactoryInterface;

/**
 * @internal
 */
final readonly class ShowInfoAboutHideDefaultLanguage
{
    public function __construct(
        private ViewFactoryInterface $viewFactory,
    ) {}

    public function __invoke(ModifyPageLayoutContentEvent $event): void
    {
        $pageId = (int) ($event->getRequest()->getQueryParams()['id'] ?? 0);
        $localization = BackendUtility::getRecord('pages', $pageId, 'l18n_cfg')['l18n_cfg'] ?? 0;
        if (($localization & 1) === 0) {
            return;
        }

        $viewFactoryData = new ViewFactoryData(
            templateRootPaths: ['EXT:' . Extension::KEY . '/Resources/Private/Templates'],
            request: $event->getRequest(),
        );
        $view = $this->viewFactory->create($viewFactoryData);
        $view->assign('pageId', $pageId);

        $event->addHeaderContent($view->render('Default'));
    }
}
