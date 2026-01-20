@extends('layout.main')
@section('content')

    <form action="{{ route('notes.update', $note->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="mt-3 mb-3">
            <input type="text" name="title" value="{{ $note->title }}" class="form-control" id="titleInput" placeholder="Заголовок">
        </div>

        <div class="mb-3">
            <textarea class="form-control" name="body" id="body_input" placeholder="Какие у Вас планы?">{{ $note->body }}</textarea>
        </div>

        <div class="mb-1 form-group row">
            <label class="col-sm-2 col-form-label" for="date">Выберите дату заметки:</label>
            <div class="col-sm-10">
                <input
                    type="date"
                    name="date"
                    @if($note->date)
                        value="{{ date_format(date_create_from_format("Y-m-d H:i:s", $note['date']), 'Y-m-d') }}"
                    @endif
                    class="form-control"
                    id="date"
                >
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Изменить заметку</button>
    </form>

@endsection
