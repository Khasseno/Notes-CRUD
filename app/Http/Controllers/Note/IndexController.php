<?php

namespace App\Http\Controllers\Note;

use App\Http\Filters\NoteFilter;
use App\Http\Requests\Note\FilterRequest;
use App\Models\Note;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request): View
    {
        $data = $request->validated();

        $filter = app()->make(NoteFilter::class, ['queryParams' => array_filter($data)]);
        $notes = Note::filter($filter)->paginate(5);

        return view('notes.index', compact(['notes']));
    }

}
