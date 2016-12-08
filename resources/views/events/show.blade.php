@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $event->name }}</div>

                    <div class="panel-body">
                        {{ $event->lieu }}
                        <br>
                        <p>{{ $event->tarif }} euros</p>
                        <br>
                        {{ $event->description }}
                        <br>
                        <br>
                        <strong>Date de début : </strong>{{ $event->start }}
                        <br>
                        <strong>Date de fin : </strong>{{ $event->finish }}

                        <br>
                        <strong>Proposé par : </strong> {{ $event->user->name }}

                    </div>


                    @if(Auth::check() && Auth::user()->isAdmin)
                        <br>
                        <div class="panel-body">
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-info ">Modifier</a>
                        </div>

                        <div class="panel-body">
                            {!! Form::model($event, [
                            'route' => ['event.destroy', $event->id],
                            'method' => 'DELETE'
                            ]) !!}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-outline-danger']) !!}

                            {!! Form::close() !!}
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection