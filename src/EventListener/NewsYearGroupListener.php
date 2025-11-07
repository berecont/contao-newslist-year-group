<?php

// src/EventListener/NewsYearGroupListener.php

namespace App\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\UserModel;

#[AsHook('parseArticles')]
class NewsYearGroupListener
{
    /** @var array<int,int|null> */
    private static array $lastYearByModule = [];

    public function __invoke(FrontendTemplate $template, array $newsEntry, Module $module): void
    {
        $year = (int) date('Y', (int) ($newsEntry['date'] ?? 0));
        $mid  = (int) $module->id;

        $last = self::$lastYearByModule[$mid] ?? null;

        // Flag & Jahr an das Item-Template geben
        $template->year       = $year;
        $template->yearStart  = ($last === null || $year !== $last);

        // Merker für das nächste Item
        self::$lastYearByModule[$mid] = $year;
    }
}
