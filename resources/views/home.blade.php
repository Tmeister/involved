@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    Home - Dashboard
    <div class="inner-content full-height">
    </div>
</home>
@endsection
