@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier un évènement</div>

                    <div class="panel-body">
                        {!! Form::model($event, ['route' => ['event.update', $event->id],
                        'method' => 'PUT']) !!}

                        {!! Form::label('name', 'Titre') !!}
                        {!! Form::text('name', null,
                        ['class' => 'form-control', 'placeholder' => 'Titre']) !!}

                        {!! Form::label('lieu', 'Lieu de l\'évènement') !!}

                        {!! Form::textarea('lieu', null,
                        ['class' => 'form-control', 'placeholder' => 'Où se déroule l\'évènement?']) !!}


                        {!! Form::label('description', 'Description de l\'évènement') !!}

                        {!! Form::textarea('description', null,
                        ['class' => 'form-control', 'placeholder' => 'Description']) !!}

                        {!! Form::label('start', 'Date de début de l\'évènement') !!}

                        {!! Form::date('start', \Carbon\Carbon::now(),
                        ['class' => 'form-control', 'placeholder' => 'Quand débute l\'évènement?']) !!}

                        {!! Form::label('finish', 'Date de fin de l\'évènement') !!}

                        {!! Form::date('finsh',\Carbon\Carbon::now(),
                        ['class' => 'form-control', 'placeholder' => 'Quand fini l\'évènement?']) !!}


                        {!! Form::label('tarif', 'Prix') !!}
                        {!! Form::text('tarif', null,
                        ['class' => 'form-control', 'placeholder' => 'Prix de l\'évènement']) !!}

                        <br>
                        {!! Form::submit('Mettre à jour', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection