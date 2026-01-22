<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Note $note): View
    {
        return view('notes.edit', compact('note'));
    }

}
