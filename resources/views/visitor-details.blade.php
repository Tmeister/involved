@extends('spark::layouts.app')

@section('extra-body-classes')

@endsection

@section('content')
    <div class="page animsition">
        {{--<div class="page-header height-300 margin-bottom-30">--}}
            {{--<div class="text-center blue-grey-800 margin-top-50 margin-xs-0">--}}
                {{--<div class="font-size-50 margin-bottom-30 blue-grey-800">Mount Mckinley</div>--}}
                {{--<ul class="list-inline font-size-14">--}}
                    {{--<li>--}}
                        {{--<i class="icon wb-map margin-right-5" aria-hidden="true"></i> Central--}}
                        {{--and southern Alaska--}}
                    {{--</li>--}}
                    {{--<li class="margin-left-20">--}}
                        {{--<i class="icon wb-heart margin-right-5" aria-hidden="true"></i> 26,428--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-xlg-3 col-lg-4 col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading ">
                            <h4 class="panel-title">Lead</h4>
                        </div>
                        <div class="panel-body">
                            BODY
                        </div>
                    </div>
                </div>
                <div class="col-xlg-6 col-lg-8 col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <h4 class="panel-title">Activity</h4>
                        </div>
                        <div class="panel-body">
                            BODY
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()