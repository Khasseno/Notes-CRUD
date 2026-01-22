<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\UpdateRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $this->service->update($note, $updated);
        return redirect()->route('notes.show', $note->id);
    }

}
