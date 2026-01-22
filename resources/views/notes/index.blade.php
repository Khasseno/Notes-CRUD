@extends('layout.main')
@section('content')
    @if (count($notes) == 0)
        <div class="mt-3 card">
            <div class="card-body">
                <h5>
                    Заметок нет
                </h5>
            </div>
        </div>
    @endif

    <a href="{{ route('notes.create') }}">
        <button type="button" class="mt-3 btn btn-success">Добавить новую заметку</button>
    </a>

    @foreach($notes as $note)
        <a class="text-decoration-none" href="{{ route('notes.show', $note->id) }}">
            <div class="mb-3 mt-3 card">
                <div class="card-body">
                    <h4 class="card-title">{{ $note->title }}</h4>

                    <h6 class="card-subtitle mb-2 text-muted">
                        @if($note->date)
                            {{ date_format(date_create_from_format("Y-m-d H:i:s", $note->date), 'd F Y') }}
                        @else
                            Бессрочная заметка
                        @endif
                    </h6>

                    <p class="card-text">{{ $note->body }}</p>
                </div>
            </div>
        </a>
    @endforeach

    <div>
        {{ $notes->withQueryString()->links() }}
    </div>

@endsection
