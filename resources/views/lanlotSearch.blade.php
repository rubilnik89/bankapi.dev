@extends('layouts.app')

@section('content')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <div class="list-group">
                            <a class="list-group-item active" href="{{ route('banks') }}">Банки</a>
                            <div class="row">
                                <div class="col-md-offset-1">
                            <a class="list-group-item" href="{{ route('ceska') }}">Ceska Sporitelna</a>
                                </div>
                            </div>

                        </div>
                    </div>

                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">Результаты поиска</div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="col-md-1">Name</th>
                                            <th class="col-md-1">Photo</th>
                                            <th class="col-md-1">Types</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($places as $place)
                                            {{--<tr>--}}
                                            <tr class="clickable" onclick="window.location.href='{{ route('lanLotSearch', ['placeid' => $place['place_id']]) }}';">
                                                <td class="col-md-3">{{ $place['name'] }}</td>
                                                <td class="col-md-3"><img src="{{ $place['photo'] }}"></td>
                                                <td class="col-md-3">
                                                @foreach($place['types'] as $type)
                                                    {!! $type .'<br>' !!}
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if(isset($data->next_page_token))
                                    <div class="pull-right">
                                        <a class="btn btn-default" href="{{ route('lanLotSearch', ['next' => $data->next_page_token]) }}" role="button">Следующие 20</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    <div class="col-md-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Поиск мест по координатам</div>
                            <div class="panel-body">
                                {{ Form::open(array('action' => array('GeoController@lanLotSearch'), 'method' => 'get')) }}
                                <input name="lanLotSearch" type="hidden" value="1">
                                <label for="latitude">Search by account latitude</label>
                                <input id="latitude" class="form-control" name="latitude" placeholder="latitude">
                                <label for="longitude">Search by account longitude</label>
                                <input id="longitude" class="form-control" name="longitude" placeholder="longitude">
                                <label for="radius">Radius</label>
                                <input id="radius" class="form-control" name="radius" placeholder="radius (m)">
                                <label for="type">Type</label>
                                <select id="type" class="form-control" name="type">
                                    <option value="0" selected>Select type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->name }}" {{ $type->name == Request::get('type') ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">OK</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


@endsection
