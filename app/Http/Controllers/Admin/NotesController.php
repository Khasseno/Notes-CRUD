<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends BaseController
{
    public function __invoke()
    {
        $notes = Note::query()->orderBy('id', 'asc')->paginate(3);
        return view('admin.notes', compact('notes'));
    }
}
