@extends('spark::layouts.app')

@section('content')
    <people inline-template>
        <div class="full-height">
            <div class="split-view">
                <div class="split-list">
                    <div class="list-view">
                        <h2 class="list-view-fake-header text-white" style="background-color:#6dc0f9 !important;">
                            Today April 23
                        </h2>
                        <div class="list-view-wrapper">
                            <div class="list-view-group-container">
                                <div @click="show(lead);" v-for="lead in leads.data" class="panel bg-white no-margin">
                                <div class="panel-heading top-left top-right">
                                    <div class="panel-title text-black hint-text">
                                        <span class="font-montserrat fs-13 all-caps">Visitor @{{ lead.id }}</span>
                                    </div>
                                    <div class="panel-controls">
                                        <ul>
                                            <li>
                                                <span class="font-montserrat fs-11">1</span>
                                                <span class="font-montserrat fs-11">2</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body p-t-40">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div> @{{ lead.last_seen }} </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="split-details">
                <div class="no-result" v-if="!lead">
                    <h1>No lead has been selected</h1>
                </div>
                <div v-if="lead" class="container-fluid m-t-30">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card share full-width">
                                <div class="card-header clearfix">
                                    <h5>Lead Details</h5>
                                    <h6>
                                        <span class="location semi-bold">
                                            <i class="fa fa-map-marker"></i>
                                            @{{ lead.first_hit.geo.country_name }}
                                            <span v-if="lead.first_hit.geo.city">, @{{ lead.first_hit.geo.city }}</span>
                                        </span>
                                    </h6>
                                </div>
                                <div class="card-description">
                                    <div class="p-b-10 m-b-10" style="border-bottom: 1px solid rgba(0,0,0,0.05)">
                                        <span>Last Viewed</span>
                                        <p>
                                            <a href="#">http://some.com</a>
                                        </p>
                                    </div>
                                    @for ($i = 0; $i < 10; $i++)
                                    <div class="p-b-10 m-b-10" style="border-bottom: 1px solid rgba(0,0,0,0.05)">
                                        <span>Another</span>
                                        <p>
                                            <a href="#">http://some.com</a>
                                        </p>
                                    </div>
                                    @endfor

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card share full-width">
                                <div class="card-header clearfix">
                                    {{--<div class="user-pic">--}}
                                    {{--<img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg">--}}
                                    {{--</div>--}}
                                    <h5>History</h5>
                                    <h6>Shared a Tweet
                                        <span class="location semi-bold"><i class="fa fa-map-marker"></i> SF, California</span>
                                    </h6>
                                </div>
                                <div class="card-description">
                                    <p>What you think, you become. What you feel, you attract. What you imagine, you
                                        create
                                        - Buddha. <a href="#">#quote</a></p>
                                    <div class="via">via Twitter</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </people>
@endsection
