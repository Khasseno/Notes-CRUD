<?php

namespace App\Services;
use App\Models\Note;

class NoteService
{
    public function test()
    {
        dd(123);
    }

    public function store(array $data) {
        $data['user_id'] = auth()->id();
        Note::create($data);
    }

    public function update(Note $note, array $updated) {
        $note->updateOrFail($updated);
    }

    public function destroy(Note $note) {
        $note->delete();
    }
}
