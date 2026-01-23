<?php

namespace App\Http\Controllers\Note;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Note $note): View | RedirectResponse
    {
        $user = auth()->user();
        if ($note->user->id !== $user->id)
        {
            return redirect()->route('notes.index');
        }

        return view('notes.edit', compact('note'));
    }

}
