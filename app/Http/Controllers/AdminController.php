<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\UpdateRequest;

use App\Models\Note;

use App\Services\Admin\Service;

use App\Services\AdminService;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
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

    public function update(AdminService $service, UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $service->update($note, $updated);
        return redirect()->route('admin.notes');
    }

    public function destroy(AdminService $service, Note $note): RedirectResponse
    {
        $service->destroy($note);
        return redirect()->route('admin.notes');
    }
}
