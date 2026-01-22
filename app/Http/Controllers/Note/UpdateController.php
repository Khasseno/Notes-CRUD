<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Note $note): RedirectResponse
    {
        $updated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'date' => 'nullable|date|date_format:Y-m-d|after_or_equal:today'
        ]);

        $note->updateOrFail($updated);

        return redirect()->route('notes.show', $note->id);
    }

}
