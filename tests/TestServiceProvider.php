<?php

namespace Nikservik\AdminDashboard\Tests;


use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'test');
    }
}
