@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('notification.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="sujet" class="col-md-4 control-label">Sujet</label>

                            <input type="hidden" name="id" value="{{ \Auth::user()->id }}">

                            <div class="col-md-6">
                                <input id="sujet" type="text" class="form-control" name="sujet" value="{{ old('sujet') }}" required autofocus>

                                @if ($errors->has('sujet'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sujet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type_notif" class="col-md-4 control-label">Type de notification</label>

                            <div class="col-md-6">
                                <select id="type_notif" name="type_notif" class="form-control">
                                    <option value="0">Alerte</option>
                                    <option value="1">Plainte</option>
                                    <option value="2">Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="textarea" rows="4" class="form-control" name="message" value="" required autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection