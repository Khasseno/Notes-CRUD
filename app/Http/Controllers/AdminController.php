<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\UpdateRequest;

use App\Models\Note;

use App\Services\Admin\Service;

use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function index()
    {
        return view('admin.index');
    }

    public function notes()
    {
        $notes = Note::query()->orderBy('id', 'asc')->paginate(3);
        return view('admin.notes', compact('notes'));
    }

    public function edit(Note $note)
    {
        return view('admin.edit', compact('note'));
    }

    public function update(UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $note->update($updated);
        return redirect()->route('admin.notes');
    }

    public function destroy(Note $note): RedirectResponse
    {
        $this->service->destroy($note);
        return redirect()->route('admin.notes');
    }
}
