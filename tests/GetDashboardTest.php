<?php


namespace Nikservik\AdminDashboard\Tests;


use Illuminate\Support\Facades\Config;

class GetDashboardTest extends TestCase
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
        Config::set('admin-dashboard.modules', ['test']);
        Config::set('test.route', 'test');

        $this->actingAs($this->user)
            ->get('/')
            ->assertOk()
            ->assertSee('test::admin.dashboard-name')
            ->assertSee('test::admin.dashboard-description')
            ->assertSee('/test');
    }

    public function test_redirect_to_login_when_not_logged_in()
    {
        $this->get('/')
            ->assertRedirect('/login');
    }

    public function test_redirect_to_login_when_hasnt_admin_role()
    {
        $this->user->admin_role = 1;

        $this->actingAs($this->user)
            ->get('/')
            ->assertRedirect('/login');
    }
}
