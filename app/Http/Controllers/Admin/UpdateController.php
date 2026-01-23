<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Note\UpdateRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Note $note): RedirectResponse
    {
        $updated = $request->validated();
        $note->update($updated);
        return redirect()->route('admin.notes');
    }
}
