<?php namespace VojtaSvoboda\UserBanned;

use Backend;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        Event::listen('backend.menu.extendItems', function ($manager) {
            $manager->addSideMenuItems('RainLab.User', 'user', [
                'banned' => [
                    'label' => 'vojtasvoboda.userbanned::lang.sidemenu.menu_label',
                    'url' => Backend::url('vojtasvoboda/userbanned/banned'),
                    'icon' => 'icon-ban',
                    'order' => 600,
                ],
            ]);
        });
    }
}
