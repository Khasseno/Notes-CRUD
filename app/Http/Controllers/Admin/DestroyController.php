<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    public function __invoke(Note $note): RedirectResponse
    {
        $this->service->destroy($note);
        return redirect()->route('admin.notes');
    }
}
