<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $note = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'date' => 'nullable|date|date_format:Y-m-d|after_or_equal:today',
        ]);

        Note::create($note);
        return redirect()->route('notes.index');
    }

}
