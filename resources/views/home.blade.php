@extends('spark::layouts.app')

@section('page')
<home :user="user" inline-template>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
                    <div class="widget widget-shadow">
                        <div class="widget-content bg-white padding-20"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
                    <div class="widget widget-shadow">
                        <div class="widget-content bg-white padding-20"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
                    <div class="widget widget-shadow">
                        <div class="widget-content bg-white padding-20"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
                    <div class="widget widget-shadow">
                        <div class="widget-content bg-white padding-20"></div>
                    </div>
                </div>
                <div class="col-ms-12 col-xs-12 col-md-12">
                    <div class="widget widget-shadow">
                        <div class="widget-header padding-20"></div>
                        <div class="widget-content-bg-white padding-20"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
