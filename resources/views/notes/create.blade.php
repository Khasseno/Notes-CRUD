@extends('layout.main')
@section('content')

    <form action="{{ route('notes.store') }}" method="post">
        @csrf
        <div class="mt-3 mb-3">
            <input type="text" name="title" class="form-control" id="titleInput" placeholder="Заголовок">
        </div>

        <div class="mb-3">
            <textarea class="form-control" name="body" id="body_input" placeholder="Какие у Вас планы?"></textarea>
        </div>

        <div class="mb-1 form-group row">
            <label class="col-sm-2 col-form-label" for="date">Выберите дату заметки:</label>
            <div class="col-sm-10">
                <input type="date" name="date" value="{{date('Y-m-d') }}" class="form-control" id="date">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить заметку</button>
    </form>

@endsection
