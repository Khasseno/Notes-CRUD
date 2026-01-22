<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    public function __invoke(Note $note): RedirectResponse
    {
        $this->service->destroy($note);
        return redirect()->route('notes.index');
    }

}
