<?php

namespace App\Http\Controllers\Note;

use App\Http\Filters\NoteFilter;
use App\Http\Requests\Note\FilterRequest;
use App\Models\Note;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request): View
    {
        $data = $request->validated();

        $user = auth()->user();
        $filter = app()->make(NoteFilter::class, ['queryParams' => array_filter($data)]);
        $filtered = $user->notes()->filter($filter);

        $notes = $filtered->paginate(4);

        return view('notes.index', compact(['notes']));
    }

}
