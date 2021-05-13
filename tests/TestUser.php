<?php


namespace Nikservik\AdminDashboard\Tests;


use Illuminate\Foundation\Auth\User;
use Nikservik\Users\Admin\AdminRoles;

class TestUser extends User
{
    use AdminRoles;

    protected $table = 'users';

    protected $fillable = ['email', 'name', 'password', 'admin_role'];
}
