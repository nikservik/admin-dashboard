<?php

namespace Nikservik\AdminDashboard;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminDashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'admin-dashboard');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'admin-dashboard');
        $this->registerBladeDirective();

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
}
