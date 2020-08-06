<?php namespace NetSTI\Backend;

use DB;
use Flash;
use Event;
use Backend;
use Redirect;
use BackendMenu;
use System\Classes\PluginBase;
use System\Models\PluginVersion;
use NetSTI\Backend\Classes\Helper;
use Backend\Classes\Controller as BackendController;

class Plugin extends PluginBase{
	public function boot(){
		Event::listen('backend.menu.extendItems', function($manager) {

			$manager->addMainMenuItems('October.Backend', [
				'dashboard' => [
					'icon'        => 'icon-rocket',
					'iconSvg'	  => 'plugins/netsti/backend/assets/img/dashboard.svg'
                ],
                'media' => ['iconSvg' => 'plugins/netsti/backend/assets/img/media.svg'],
			]);

			$manager->addMainMenuItems('October.System', [
				'system' => ['iconSvg' => 'plugins/netsti/backend/assets/img/settings.svg'],
			]);

			$manager->addMainMenuItems('October.Cms', [
				'cms' => ['iconSvg' => 'plugins/netsti/backend/assets/img/cms.svg']
			]);

			if(PluginVersion::where('code', 'RainLab.User')->where('is_disabled', 0)->first()){
				$manager->addMainMenuItems('RainLab.User', [
					'user' => ['iconSvg' => 'plugins/netsti/backend/assets/img/users.svg']
				]);
			}

			if(PluginVersion::where('code', 'RainLab.Blog')->where('is_disabled', 0)->first()){
				$manager->addMainMenuItems('RainLab.Blog', [
					'blog' => ['iconSvg' => 'plugins/netsti/backend/assets/img/blog.svg']
				]);
            }
            
            if(PluginVersion::where('code', 'RainLab.Pages')->where('is_disabled', 0)->first()){
				$manager->addMainMenuItems('RainLab.Pages', [
					'pages' => ['iconSvg' => 'plugins/netsti/backend/assets/img/pages.svg']
				]);
			}
		});

		BackendController::extend(function($controller){
			$controller->addCss('/plugins/netsti/backend/assets/css/font.css');
			$controller->addCss('/plugins/netsti/backend/assets/css/theme.css');
			$controller->addCss('/plugins/netsti/backend/assets/css/update.css');
			$controller->addJs('/plugins/netsti/backend/assets/js/theme.js');
		});
	}
}
