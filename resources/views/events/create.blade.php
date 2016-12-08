@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un évènement</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'event.store', 'method' => 'POST']) !!}

                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null,
                        ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                        {!! Form::label('description', 'Informationn de l\'évènement') !!}

                        {!! Form::textarea('description', null,
                        ['class' => 'form-control', 'placeholder' => 'Description']) !!}

                        {!! Form::label('start', 'Début de l\'évènement') !!}

                        {!! Form::date('start', \Carbon\Carbon::now(),
                        ['class' => 'form-control', 'placeholder' => 'début l\'évènement?']) !!}

                        {!! Form::label('finish', 'Fin de l\'évènement') !!}

                        {!! Form::date('finish',\Carbon\Carbon::now(),
                        ['class' => 'form-control', 'placeholder' => 'Fin de l\'évènement?']) !!}


                        {!! Form::label('lieu', 'Lieu de l\'évènement') !!}

                        {!! Form::textarea('lieu', null,
                        ['class' => 'form-control', 'placeholder' => 'Lieu de l\'évènement?']) !!}

                        {!! Form::label('tarif', 'Tarif') !!}
                        {!! Form::text('tarif', null,
                        ['class' => 'form-control', 'placeholder' => 'Tarif de l\'évènement']) !!}

                        <br>
                        {!! Form::submit('Publier', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection