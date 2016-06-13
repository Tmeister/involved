@extends('spark::layouts.app')

@section('extra-body-classes')

@endsection

@section('scripts')
    <script>
        window.visitor = {!! json_encode(['id' => $visitor_id]) !!}
    </script>
@endsection

@section('content')
    <visitor inline-template>
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
                    <div class="col-xlg-4 col-lg-4 col-md-12">
                        <div class="widget widget-shadow" v-if="lead">
                            <div class="widget-content text-center bg-white padding-40">
                                <div class="avatar avatar-100 margin-bottom-20">
                                    <img src="http://getbootstrapadmin.com/remark/global/portraits/1.jpg" alt="">
                                </div>
                                <p class="font-size-20 blue-grey-700">Visitor</p>
                                <p>
                                    <span class="font-size-24 flag-icon flag-icon-@{{ lead.first_hit.geo.country_code | lowercase }} flag-icon-squared"></span><br>
                                </p>
                                <p class="font-weight-300">
                                    <span v-if="lead.first_hit.geo.city">@{{ lead.first_hit.geo.city }}, </span><span
                                            class="">@{{ lead.first_hit.geo.country_name }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="widget widget-shadow" v-if="lead">
                            <div class="widget-content bg-white padding-40">
                                <div class="padding-bottom-10">
                                    <h4 class="example-title font-weight-100">First Seen</h4>
                                    <hr class="margin-top-0 margin-bottom-10"/>
                                    <p>
                                        <span><i class="wb text-muted wb-time"></i> @{{ lead.first_hit.created_at | datetime }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-desktop"></i> @{{ lead.first_hit.device.platform }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-globe"></i> @{{ lead.first_hit.agent.browser }} @{{ lead.first_hit.agent.browser_version }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-link"></i> <a target="_blank" href="@{{ lead.first_hit.referer.url }}">@{{lead.first_hit.referer.url | cleanlink lead.first_hit.referer.host }}</a></span>
                                    </p>
                                </div>
                                <div class="">
                                    <h4 class="example-title font-weight-100">Last Seen</h4>
                                    <hr class="margin-top-0 margin-bottom-10"/>
                                    <p>
                                        <span><i class="wb text-muted wb-time"></i> @{{ lead.last_hit.created_at | datetime }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-desktop"></i> @{{ lead.last_hit.device.platform }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-globe"></i> @{{ lead.last_hit.agent.browser }} @{{ lead.last_hit.agent.browser_version }}</span>
                                    </p>
                                    <p>
                                        <span><i class="wb text-muted wb-link"></i> <a target="_blank" href="@{{ lead.last_hit.referer.url }}">@{{lead.last_hit.referer.url | cleanlink lead.last_hit.referer.host }}</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xlg-8 col-lg-8 col-md-12">
                        <div class="widget widget-shadow">
                            <div class="widget-content bg-white padding-40">
                                <div class="row padding-bottom-20">
                                    <div class="col-sm-8 col-xs-6">
                                        <div class="blue-grey-700 text-uppercase">Visitor Activity</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" v-if="hits">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>URL</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="hit in hits">
                                                <td>
                                                    <span class="label label-primary">@{{ hit.type }}</span>
                                                </td>
                                                {{--<td><span class="label label-success">Recovered</span></td>--}}
                                                {{--<td><span class="label label-warning">Other</span></td>--}}
                                                <td>
                                                    <span>
                                                        <a target="_blank" href="@{{ hit.referer.url }}">@{{hit.referer.url | cleanlink hit.referer.host }}</a>
                                                    </span>
                                                </td>
                                                <td><span>@{{ hit.created_at | datetime }}</span></td>
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
    </visitor>
@endsection()