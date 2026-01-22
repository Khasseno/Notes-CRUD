<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Services\Note\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct() {
        $this->service = new Service();
    }
}
