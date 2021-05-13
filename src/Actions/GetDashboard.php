<?php


namespace Nikservik\AdminDashboard\Actions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Lorisleiva\Actions\Concerns\AsController;
use Lorisleiva\Actions\Concerns\AsObject;
use Nikservik\AdminDashboard\Middleware\AdminMiddleware;

class GetDashboard
{
    use AsObject;
    use AsController;

    public static function route(): void
    {
        Route::get('/', static::class)
            ->middleware(['web', 'auth', AdminMiddleware::class]);
    }

    public function handle()
    {
        return view(
            'admin-dashboard::dashboard',
            ['modules' => Config::get('admin-dashboard.modules')]
        );
    }
}
