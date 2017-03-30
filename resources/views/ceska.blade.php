@extends('layouts.app')

@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <div class="list-group">
                            <a class="list-group-item" href="{{ route('banks') }}">Банки</a>
                            <div class="row">
                                <div class="col-md-offset-1">
                            <a class="list-group-item active" href="{{ route('ceska') }}">Ceska Sporitelna</a>
                                    <div class="row">
                                        <div class="col-md-offset-1">
                                            <a class="list-group-item" href="{{ route('ceskaExchange') }}">Обменные курсы</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection
