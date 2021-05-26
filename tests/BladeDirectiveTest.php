<?php


namespace Nikservik\AdminDashboard\Tests;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class BladeDirectiveTest extends TestCase
{
    public function test_feature_directive_off()
    {
        $view = View::make('test::test', ['test' => "1\n2"])->render();

        $this->assertStringContainsString("1<br />\n2", $view);
    }
}
