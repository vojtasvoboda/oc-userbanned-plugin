<?php namespace VojtaSvoboda\UserBanned\Controllers;

use Auth;
use BackendMenu;
use Backend\Classes\Controller;
use RainLab\User\Controllers\Users;

class Banned extends Users
{
    public $implement = [
        'Backend.Behaviors.ListController',
    ];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('RainLab.User', 'user', 'banned');
    }

    public function listExtendQuery($query)
    {
        $throttleModel = Auth::createThrottleModel();
        $bannedCollection = $throttleModel->where('is_banned', true)->get()->map(function($item){
          return $item->user_id;
        });
        $query->whereIn('id', $bannedCollection);
    }
}
