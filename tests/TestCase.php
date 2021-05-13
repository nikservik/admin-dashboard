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
            SessionServiceProvider::class,
            AuthServiceProvider::class,
            ViewServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.locale', 'ru');
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
//        $app['config']->set('session.driver', 'array');
//        $app['config']->set('session.store', 'array');
//        $app['config']->set('cache.default', 'array');
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();

        include_once __DIR__.'/../vendor/nikservik/users/database/migrations/update_users_table_with_rights.php.stub';
        (new \UpdateUsersTableWithRights)->up();
    }
}
