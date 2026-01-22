<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\StoreRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $note = $request->validated();

        Note::create($note);
        return redirect()->route('notes.index');
    }

}
