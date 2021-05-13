<?php


namespace Nikservik\AdminDashboard\Actions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;
use Lorisleiva\Actions\Concerns\AsObject;

class PostLogin
{
    use AsObject;
    use AsController;

    public static function route(): void
    {
        Route::post('/login', static::class)
            ->middleware('web');
    }

    public function asController(ActionRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect('/login')->withErrors([
            'email' => 'bad-credentials',
        ]);

    }
}
