<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\StoreRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('notes.index');
    }

}
