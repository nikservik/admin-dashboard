<?php


namespace Nikservik\AdminDashboard\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class GetLoginTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = TestUser::create([
            'name' => 'bob',
            'email' => 'bob@example.com',
            'password' => '$2y$10$flDUj4QMmJz0TTRMVXdLUelmGj5GrJgsOJxw2aaL8MQNOP9r.Adqu',
            'admin_role' => 3,
        ]);
    }

    public function test_dashboard_view()
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('Вход')
            ->assertSee('Емейл')
            ->assertSee('Пароль')
            ->assertSee('Войти');
    }

    public function test_login_redirects_when_authenticated()
    {
        $this->actingAs($this->user)
            ->get('/login')
            ->assertRedirect('/');
    }

    public function test_login_with_credentials()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ])
            ->assertRedirect('/');
    }

    public function test_login_with_bad_credentials()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'passworddd',
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }
}
