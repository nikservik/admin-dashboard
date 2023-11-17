<?php

namespace Components;


use Illuminate\Support\Facades\Config;
use Nikservik\AdminDashboard\Tests\TestCase;

class AppTest extends TestCase
{
    public function test_blade_render()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);

        $this->blade(
            '<x-admin-dashboard-app :active="$active" :active-sub="$activeSub ?? \'\'">ttt</x-admin-dashboard-app>',
            ['active' => '', ],
        )
            ->assertSee(trans('admin-test::admin.dashboard-name'))
            ->assertSee(trans('admin-nest::admin.dashboard-name'))
            ->assertSee('ttt');
    }

}
