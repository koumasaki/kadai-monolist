@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
        <div class="item">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <img src="{{ $item->image_url}}" alt="">
                </div>
                <div class="panel-body">
                    <p class="item-title">{{ $item->name }}</p>
                    <div class="buttons text-center">
                        @if (Auth::check())
                            @include('items.want_button', ['item' => $item])
                            @include('items.have_button', ['item' => $item])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="want-user">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Wantしたユーザー</div>
                <div class="panel-body">
                    <ul>
                    @foreach ($want_users as $user)
                        <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="have-user">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Haveしたユーザー</div>
                <div class="panel-body">
                    <ul>
                    @foreach ($have_users as $user)
                        <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="{{ $item->url }}" target="_blank">楽天詳細ページへ</a></p>
    </div>
</div>
@endsection