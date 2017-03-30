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
                            <a class="list-group-item" href="{{ route('ceska') }}">Ceska Sporitelna</a>
                                    <div class="row">
                                        <div class="col-md-offset-1">
                                            <a class="list-group-item active" href="{{ route('ceskaExchange') }}">Обменные курсы</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Обменный курс</div>
                                    <div class="panel-body">

                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th class="col-md-1">Short Name</th>
                                                <th class="col-md-1">Name</th>
                                                <th class="col-md-1">Country</th>
                                                <th class="col-md-1">Amount</th>
                                                <th class="col-md-1">valBuy</th>
                                                <th class="col-md-1">valSell</th>
                                                <th class="col-md-1">valMid</th>
                                                <th class="col-md-1">currBuy</th>
                                                <th class="col-md-1">currSell</th>
                                                <th class="col-md-1">currMid</th>
                                                <th class="col-md-1">move</th>
                                                <th class="col-md-1">cnbMid</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key)
                                                <tr>
                                                    <td class="col-md-1">{{ $key->shortName }}</td>
                                                    <td class="col-md-1">{{ $key->name }}</td>
                                                    <td class="col-md-1">{{ $key->country }}</td>
                                                    <td class="col-md-1">{{ $key->amount }}</td>
                                                    <td class="col-md-1">{{ $key->valBuy }}</td>
                                                    <td class="col-md-1">{{ $key->valSell }}</td>
                                                    <td class="col-md-1">{{ $key->valMid }}</td>
                                                    <td class="col-md-1">{{ $key->currBuy }}</td>
                                                    <td class="col-md-1">{{ $key->currSell }}</td>
                                                    <td class="col-md-1">{{ $key->currMid }}</td>
                                                    <td class="col-md-1">{{ $key->move }}</td>
                                                    <td class="col-md-1">{{ $key->cnbMid }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
