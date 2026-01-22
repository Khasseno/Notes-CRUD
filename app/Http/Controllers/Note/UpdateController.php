<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\UpdateRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();

        $note->updateOrFail($updated);

        return redirect()->route('notes.show', $note->id);
    }

}
