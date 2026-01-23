<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Note $note): View | RedirectResponse
    {
        $user = auth()->user();
        if ($note->user->id !== $user->id)
        {
            return Redirect::route('notes.index');
        }

        return view('notes.show', compact('note'));
    }

}
