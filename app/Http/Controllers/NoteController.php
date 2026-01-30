<?php

namespace App\Http\Controllers;

use App\Http\Filters\NoteFilter;
use App\Http\Requests\Note\FilterRequest;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;

use App\Models\Note;

use App\Services\Note\Service;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

use Illuminate\View\View;

class NoteController extends Controller
{
    public $service;

    public function __construct() {
        $this->service = new Service();
    }

    public function index(FilterRequest $request): View
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

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
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

    public function update(UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $this->service->update($note, $updated);
        return redirect()->route('notes.show', $note->id);
    }

    public function destroy(Note $note): RedirectResponse
    {
        $this->service->destroy($note);
        return redirect()->route('notes.index');
    }
}
