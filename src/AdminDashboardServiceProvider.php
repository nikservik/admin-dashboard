<?php

namespace Nikservik\AdminDashboard;

use Nikservik\AdminDashboard\Components\Icons\Cake;
use Nikservik\AdminDashboard\Components\Icons\Calendar;
use Nikservik\AdminDashboard\Components\Icons\Copy;
use Nikservik\AdminDashboard\Components\Icons\Delete;
use Nikservik\AdminDashboard\Components\Icons\Down;
use Nikservik\AdminDashboard\Components\Icons\Edit;
use Nikservik\AdminDashboard\Components\Icons\Folder;
use Nikservik\AdminDashboard\Components\Icons\FolderOpen;
use Nikservik\AdminDashboard\Components\Icons\Info;
use Nikservik\AdminDashboard\Components\Icons\Left;
use Nikservik\AdminDashboard\Components\Icons\Link;
use Nikservik\AdminDashboard\Components\Icons\Loading;
use Nikservik\AdminDashboard\Components\Icons\Lock;
use Nikservik\AdminDashboard\Components\Icons\Map;
use Nikservik\AdminDashboard\Components\Icons\Moon;
use Nikservik\AdminDashboard\Components\Icons\Nativity;
use Nikservik\AdminDashboard\Components\Icons\Right;
use Nikservik\AdminDashboard\Components\Icons\Settings;
use Nikservik\AdminDashboard\Components\Icons\Share;
use Nikservik\AdminDashboard\Components\Icons\Sun;
use Nikservik\AdminDashboard\Components\Icons\Support;
use Nikservik\AdminDashboard\Components\Icons\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Nikservik\AdminDashboard\Components\App;
use Nikservik\AdminDashboard\Components\Menu;
use Nikservik\AdminDashboard\Modals\BladeModal;
use Nikservik\AdminDashboard\Modals\Modal;

class AdminDashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'admin-dashboard');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'admin-dashboard');
        $this->registerBladeDirective();
        $this->registerComponents();

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/admin-dashboard.php' => config_path('admin-dashboard.php'),
        ], 'admin-dashboard-config');
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('css'),
        ], 'admin-dashboard-assets');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/admin-dashboard.php', 'admin-dashboard');
    }

    protected function registerBladeDirective()
    {
        Blade::directive('nl2br', function($expression) {
            return "<?php echo nl2br({$expression}); ?>";
        });
    }

    protected function registerComponents()
    {
        $this->loadViewComponentsAs('admin-dashboard', [
            App::class,
            Menu::class,
        ]);
        Blade::component('admin-blade-modal', BladeModal::class);

        // Иконки
        Blade::component(User::class, 'icon-user');
        Blade::component(Support::class, 'icon-support');
        Blade::component(Cake::class, 'icon-cake');
        Blade::component(Calendar::class, 'icon-calendar');
        Blade::component(Map::class, 'icon-map');
        Blade::component(Link::class, 'icon-link');
        Blade::component(Share::class, 'icon-share');
        Blade::component(Settings::class, 'icon-settings');
        Blade::component(Down::class, 'icon-down');
        Blade::component(Delete::class, 'icon-delete');
        Blade::component(Folder::class, 'icon-folder');
        Blade::component(FolderOpen::class, 'icon-folder-open');
        Blade::component(Nativity::class, 'icon-nativity');
        Blade::component(Edit::class, 'icon-edit');
        Blade::component(Info::class, 'icon-info');
        Blade::component(Copy::class, 'icon-copy');
        Blade::component(Left::class, 'icon-left');
        Blade::component(Right::class, 'icon-right');
        Blade::component(Loading::class, 'icon-loading');
        Blade::component(Lock::class, 'icon-lock');
        Blade::component(Sun::class, 'icon-sun');
        Blade::component(Moon::class, 'icon-moon');
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('admin-dashboard-modal', Modal::class);
    }
}
