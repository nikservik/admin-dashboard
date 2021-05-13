<?php

use Nikservik\AdminDashboard\Actions\GetDashboard;
use Nikservik\AdminDashboard\Actions\GetLogin;
use Nikservik\AdminDashboard\Actions\PostLogin;

GetDashboard::route();
GetLogin::route();
PostLogin::route();
