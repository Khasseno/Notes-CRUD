<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct()
    {
        $this->service = new Service();
    }
}
