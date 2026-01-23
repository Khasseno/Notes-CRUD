<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Note $note)
    {
        return view('admin.edit', compact('note'));
    }
}
