<?php

namespace App\Services;

use App\Models\Note;

class AdminService
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
