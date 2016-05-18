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
                        <div class="col-md-12">
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
                                        <h5>Last Viewed</h5>
                                        <p>
                                            <span>@{{ lead.last_hit.created_at | date }}</span><br>
                                            <a href="@{{ lead.last_hit.referer.url }}">@{{ lead.last_hit.referer.url }}</a>
                                        </p>
                                    </div>

                                    <div class="p-b-10 m-b-10" style="border-bottom: 1px solid rgba(0,0,0,0.05)">
                                        <h5>First Viewed</h5>
                                        <p>
                                            <span>@{{ lead.first_hit.created_at | date }}</span><br>
                                            <a href="@{{ lead.first_hit.referer.url }}">@{{ lead.first_hit.referer.url }}</a>
                                        </p>
                                    </div>

                                    <div class="p-b-10 m-b-10" style="border-bottom: 1px solid rgba(0,0,0,0.05)">
                                        <h5>Pages Viewed</h5>
                                        <p>
                                            <span>@{{ hits.total_hits }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card share full-width">
                                <div class="card-header clearfix">
                                    <h5>History</h5>
                                    <h6>
                                        <span class="location semi-bold">&nbsp;</span>
                                    </h6>
                                </div>
                                <div class="card-description">
                                    <div v-for="day in hits.hits" class="p-b-10 m-b-10"
                                         style="border-bottom: 1px solid rgba(0,0,0,0.05)">
                                        <h2 class="text-danger bold">@{{ day[0].created_at | date }}</h2>
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                            <tr role="row">
                                                <th style="width:75%;" class="sorting_disabled" rowspan="1" colspan="1">
                                                    URL
                                                </th>
                                                <th style="width: 25%;" class="sorting_disabled" rowspan="1"
                                                    colspan="1">Viewed
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="hit in day">
                                                <td class="v-align-middle semi-bold">@{{ hit.referer.url }}</td>
                                                <td class="text-right">
                                                    <span class="hint-text small semi-bold">@{{ hit.created_at | small-time }}</span>
                                                </td>
                                            </tr>
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
        </div>
    </people>
@endsection
