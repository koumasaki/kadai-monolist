@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">会員登録</div>
            @if (count($errors) > 0)
            <p>入力内容に間違いがあります。</p>
            @endif
            <div class="panel-body">
                {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                    {!! Form::label('name', 'お名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-controller']) !!}
                    <span class="help-block">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-controller']) !!}
                    <span class="help-block">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('password'))) has-error @endif">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-controller']) !!}
                    <span class="help-block">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('password_confirmation'))) has-error @endif">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-controller']) !!}
                    <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                </div>
                
                <div class="text-right">
                    {!! Form::submit('登録する', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection