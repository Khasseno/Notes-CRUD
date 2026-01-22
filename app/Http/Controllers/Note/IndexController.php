<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $notes = Note::all();
        return view('notes.index', compact(['notes']));
    }

}
