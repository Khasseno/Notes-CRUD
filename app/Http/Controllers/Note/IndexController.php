<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $notes = Note::paginate(5);
        return view('notes.index', compact(['notes']));
    }

}
