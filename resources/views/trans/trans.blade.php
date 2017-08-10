@extends('layouts.app')

@section('content')

        <form method="get" action="{{ route('ttt') }}">
            <input type="text" name="trans">
            <button>submit</button>
        </form>


@endsection
