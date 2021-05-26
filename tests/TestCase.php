<?php

namespace Nikservik\AdminDashboard\Tests;

use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Illuminate\View\ViewServiceProvider;
use Lorisleiva\Actions\ActionServiceProvider;
use Nikservik\AdminDashboard\AdminDashboardServiceProvider;
use Nikservik\Users\UsersServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            AdminDashboardServiceProvider::class,
            UsersServiceProvider::class,
            ActionServiceProvider::class,
            TestServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.locale', 'ru');
        $app['config']->set('database.default', 'mysql');
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
        $this->loadMigrationsFrom(__DIR__ . '/../vendor/nikservik/users/database/migrations');
    }
}
