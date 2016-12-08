@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des Evenements</div>

                    <div class="panel-body">
                        @foreach($list as $event)
                            <h2>
                                <a href="{{ route('event.show', $event->id) }}"><FONT SIZE="5pt"><b>{{ $event->name }}</b></FONT></a>
                            </h2>
                            <p>{{ $event->lieu }}</p>
                            <p>{{ $event->tarif }} euros </p>
                            <p>{{ $event->description }}</p>
                            <b>Proposé par : </b> {{ $event->user->name }}
                            <hr>
                        @endforeach


                        {!! $list->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection