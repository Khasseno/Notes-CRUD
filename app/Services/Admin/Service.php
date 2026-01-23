<?php

namespace App\Services\Admin;

use App\Http\Requests\Note\UpdateRequest;
use App\Models\Note;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;

class Service
{
    public function update(Note $note, array $data): void
    {
        $note->updateOrFail($data);
    }
    public function destroy(Note $note): void
    {
        $note->delete();
    }
}
