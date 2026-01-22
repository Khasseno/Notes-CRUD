<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {
        return view('notes.create');
    }

}
