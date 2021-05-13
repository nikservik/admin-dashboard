<?php


namespace Nikservik\AdminDashboard\Actions;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Validator;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;
use Lorisleiva\Actions\Concerns\AsObject;

class GetLogin
{
    use AsObject;
    use AsController;

    public static function route(): void
    {
        Route::get('/login', static::class)
            ->middleware('web')
            ->name('login');
    }

    public function handle()
    {
        return view('admin-dashboard::login');
    }

    public function asController(ActionRequest $request)
    {
        if ($request->user()) {
            return redirect('/');
        }

        return $this->handle();
    }
    public function withValidator(Validator $validator, ActionRequest $request): void
    {
    }
}
