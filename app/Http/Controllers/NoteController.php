<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::all();
        return view('notes.index', compact(['notes']));
    }

    public function create(): View
    {
        return view('notes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $note = $request->validate([
            'title' => 'string|max:255|required',
            'body' => 'string|required',
            'date' => 'nullable|date|date_format:Y-m-d|after_or_equal:today',
        ]);

        Note::create($note);
        return redirect()->route('notes.index');
    }

    public function show(Note $note): View
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note): View
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        $updated = $request->validate([
            'title' => 'string|max:255|required',
            'body' => 'string|required',
            'date' => 'nullable|date|date_format:Y-m-d|after_or_equal:today'
        ]);

        $note->updateOrFail($updated);

        return redirect()->route('notes.show', $note->id);
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

}
