@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['action' => 'TwitterController@search', 'method' => 'get', 'id' => 'search_form']) !!}
        {{-- <div class="d-block"> --}}
            <h5 class="d-block">
                {!! Form::label('keyword_txt', 'キーワード', ['class' => 'control-label']) !!}
            </h5>
            <div class="d-block">
                {!! Form::text('keyword', '', ['class' => 'form-control']) !!}
            </div>


            <h5 class="d-block">
                {!! Form::label('date_select', 'From', ['class' => 'control-label']) !!}
            </h5>
            <div class="row">
                {!! Form::date('', '', ['class' => 'form-control col-5 offset-1 input_date_time form-disabled', 'id' => 'from_date_select']) !!}
                {!! Form::time('', '00:00', ['class' => 'form-control col-5 input_date_time form-disabled', 'id' => 'from_time_select', 'step'=>'300']) !!}
            </div>

            <h5 class="d-block">
                {!! Form::label('date_select', 'To', ['class' => 'control-label']) !!}
            </h5>
            <div class="row">
                {!! Form::date('', '', ['class' => 'form-control col-5 offset-1 input_date_time form-disabled', 'id' => 'to_date_select']) !!}
                {!! Form::time('', '00:00', ['class' => 'form-control col-5 input_date_time form-disabled', 'id' => 'to_time_select', 'step'=>'300']) !!}
            </div>

            {{-- 日付のhidden値 --}}
            {!! Form::hidden('from_date_time', '', ['id' => 'hidden_from_date_time']) !!}
            {!! Form::hidden('to_date_time', '', ['id' => 'hidden_to_date_time']) !!}

            <div class="d-block">
                {!! Form::submit('検索', ['class' => 'btn btn-success']) !!}
            </div>
            <br>


        {{ Form::close() }}

　　　   {{-- コントローラーで取得した$resultをforeachで回す --}}


        @foreach ($result as $tweet)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
                        <div class="media-body">
                            <h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}</strong></h5>
                            {{-- 修正後 --}}
                            <h6 class="d-inline text-secondary">{{ $tweet->created_at }}</h6>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex flex-row justify-content-end">
                        <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                        <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                        <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
