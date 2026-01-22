<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

}
