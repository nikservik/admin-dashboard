<?php

namespace Nikservik\AdminDashboard\Tests\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Testing\TestView;
use Nikservik\AdminDashboard\Components\Menu;
use Nikservik\AdminDashboard\Tests\TestCase;

class MenuTest extends TestCase
{
    public function test_modules()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);

        $this->component(Menu::class, [])
            ->assertSee(trans('admin-test::admin.dashboard-name'))
            ->assertSee(trans('admin-nest::admin.dashboard-name'));
    }

    public function test_active_module()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);

        $this->component(Menu::class, ['active' => 'admin-nest'])
            ->assertSeeInOrder([
                trans('admin-test::admin.dashboard-name'),
                'bg-blue-600  text-blue-50',
                trans('admin-nest::admin.dashboard-name'),
            ], false);
    }

    public function test_submenu_for_active_module()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => 'route1', 'name2' => 'route2']);

        $menu = new Menu('admin-nest');

        $this->assertCount(2, $menu->submenu);
        $this->assertArrayHasKey('name1', $menu->submenu);
    }

    public function test_submenu_for_inactive_module()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => 'route1', 'name2' => 'route2']);

        $menu = new Menu('admin-test');

        $this->assertCount(0, $menu->submenu);
    }

    public function test_active_submenu_for_active_module()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => 'route1', 'name2' => 'route2']);

        $menu = new Menu('admin-nest', 'name2');

        $this->assertEquals('name2', $menu->activeSub);
    }

    public function test_default_submenu_for_active_module()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => '', 'name2' => 'route2']);

        $menu = new Menu('admin-nest');

        $this->assertEquals('name1', $menu->activeSub);
    }

    public function test_active_module_with_submenu()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => 'route1', 'name2' => 'route2']);

        $this->component(Menu::class, ['active' => 'admin-nest'])
            ->assertSeeInOrder([
                trans('admin-test::admin.dashboard-name'),
                'bg-blue-600  text-blue-50',
                trans('admin-nest::admin.dashboard-name'),
                '/admin-nest/route1',
                trans('admin-nest::admin.dashboard-menu.name1'),
                '/admin-nest/route2',
                trans('admin-nest::admin.dashboard-menu.name2'),
            ], false);
    }

    public function test_active_submenu_item()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => 'route1', 'name2' => 'route2']);

        $this->component(Menu::class, ['active' => 'admin-nest', 'activeSub' => 'name2'])
            ->assertSeeInOrder([
                trans('admin-test::admin.dashboard-name'),
                'bg-blue-600  text-blue-50',
                trans('admin-nest::admin.dashboard-name'),
                '/admin-nest/route1',
                trans('admin-nest::admin.dashboard-menu.name1'),
                '/admin-nest/route2',
                'bg-blue-500  text-blue-50',
                trans('admin-nest::admin.dashboard-menu.name2'),
            ], false);
    }

    public function test_active_default_submenu_item()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);
        Config::set('admin-nest.menu', ['name1' => '', 'name2' => 'route2']);

        $this->component(Menu::class, ['active' => 'admin-nest'])
            ->assertSeeInOrder([
                trans('admin-test::admin.dashboard-name'),
                'bg-blue-600  text-blue-50',
                trans('admin-nest::admin.dashboard-name'),
                '/admin-nest',
                'bg-blue-500  text-blue-50',
                trans('admin-nest::admin.dashboard-menu.name1'),
                '/admin-nest/route2',
                trans('admin-nest::admin.dashboard-menu.name2'),
            ], false);
    }

    public function test_blade_render()
    {
        Config::set('admin-dashboard.modules', ['admin-test', 'admin-nest']);

        $this->blade(
            '<x-admin-dashboard-menu :active="$active" :active-sub="$activeSub" />',
            ['active' => '', 'activeSub' => ''],
        )
            ->assertSee(trans('admin-test::admin.dashboard-name'))
            ->assertSee(trans('admin-nest::admin.dashboard-name'));
    }
}
