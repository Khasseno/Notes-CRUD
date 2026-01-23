@extends('layouts.app')
@section('content')

    <div class="mb-3 mt-3 card">
        <div class="card-body">
            <h4 class="card-title">{{ $note->title }}</h4>

            <h6 class="card-subtitle mb-2 text-muted">
                @if($note['date'])
                    {{ date_format(date_create_from_format("Y-m-d H:i:s", $note['date']), 'd F Y') }}
                @else
                    Бессрочная заметка
                @endif
            </h6>

            <p class="card-text">{{ $note['body'] }}</p>
        </div>
    </div>

    <a class="text-decoration-none" href="{{ route('notes.edit', $note->id) }}">
        <button type="button" class="btn btn-primary" >Редактировать заметку</button>
    </a>

    <form class="mt-3" action="{{ route('notes.destroy', $note->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить заметку</button>
    </form>

@endsection
