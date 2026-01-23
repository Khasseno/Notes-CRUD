@extends('layouts.admin')
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

    @foreach($notes as $note)
        <div class="my-3 card">
            <div class="mt-2 card-header">
                <h3 class="card-title"><b>{{$note->user->name}}</b> {{ $note->title }}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <a class="text-decoration-none" href="{{ route('admin.notes.edit', $note->id) }}">
                        <button type="button" class="btn btn-primary">Редактировать сообщение</button>
                    </a>
                    <button onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                            class="btn btn-danger">Удалить заметку
                    </button>
                    <form id="delete-form" class="mt-3" action="{{ route('admin.notes.destroy', $note->id) }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{ $note->body }}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                @if($note->date)
                    {{ date_format(date_create_from_format("Y-m-d H:i:s", $note->date), 'd F Y') }}
                @else
                    Бессрочная заметка
                @endif
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    @endforeach

    <div>
        {{ $notes->withQueryString()->links() }}
    </div>
@endsection
