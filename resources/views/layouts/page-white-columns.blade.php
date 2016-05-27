@extends('spark::layouts.app')

@section('page')
    <div class="page animsition bg-white">
        <div class="page-aside">
            @yield('page-aside')
        </div>
        <div class="page-main">
            @yield('content')
        </div>
    </div>
@endsection