<?php

namespace Nikservik\AdminDashboard;

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
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('admin-dashboard-modal', Modal::class);
    }
}
