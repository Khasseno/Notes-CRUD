@extends('layouts.app')
@section('content')

    <form action="{{ route('notes.update', $note->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="mt-3 mb-3">
            <input type="text" name="title" value="{{ old('title') ? old('title') : $note->title }}" class="form-control" id="titleInput" placeholder="Заголовок">
            @error('title')
            <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>

        <div class="mb-3">
            <textarea class="form-control" name="body" id="body_input" placeholder="Какие у Вас планы?"> {{ old('body') ? old('body') : $note->body }}</textarea>
            @error('body')
            <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>

        <div class="mb-1 form-group row">
            <label class="col-sm-2 col-form-label" for="date">Выберите дату заметки:</label>
            <div class="col-sm-10">
                <input
                    type="date"
                    name="date"
                    @if(old('date'))
                        value="{{ date_format(date_create_from_format("Y-m-d", old('date')), 'Y-m-d') }}"
                    @elseif($note->date)
                        value="{{ date_format(date_create_from_format("Y-m-d H:i:s", $note['date']), 'Y-m-d') }}"
                    @endif
                    class="form-control"
                    id="date"
                >
            </div>
            @error('date')
            <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Изменить заметку</button>
    </form>

@endsection
