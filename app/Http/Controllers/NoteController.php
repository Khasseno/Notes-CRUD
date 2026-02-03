<?php

namespace App\Http\Controllers;

use App\Http\Filters\NoteFilter;
use App\Http\Requests\Note\FilterRequest;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;

use App\Models\Note;

use App\Services\NoteService;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(NoteService $service, FilterRequest $request): View
    {
        $data = $request->validated();

        $user = auth()->user();
        $filter = app()->make(NoteFilter::class, ['queryParams' => array_filter($data)]);
        $filtered = $user->notes()->filter($filter);

        $notes = $filtered->paginate(4);

        return view('notes.index', compact(['notes']));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteService $service, StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $service->store($data);
        return redirect()->route('notes.index');
    }

    public function show(Note $note): View | RedirectResponse
    {
        $user = auth()->user();
        if ($note->user->id !== $user->id)
        {
            return Redirect::route('notes.index');
        }

        return view('notes.show', compact('note'));
    }

    public function edit(Note $note): View | RedirectResponse
    {
        $user = auth()->user();
        if ($note->user->id !== $user->id)
        {
            return redirect()->route('notes.index');
        }

        return view('notes.edit', compact('note'));
    }

    public function update(NoteService $service, UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $service->update($note, $updated);
        return redirect()->route('notes.show', $note->id);
    }

    public function destroy(NoteService $service, Note $note): RedirectResponse
    {
        $service->destroy($note);
        return redirect()->route('notes.index');
    }
}
