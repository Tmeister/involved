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
                    <div class="col-xlg-3 col-lg-4 col-md-12">
                        <div class="widget widget-shadow" v-if="lead">
                            <div class="widget-content text-center bg-white padding-40 padding-bottom-0">
                                <div class="avatar avatar-100 margin-bottom-20">
                                    <img src="http://getbootstrapadmin.com/remark/global/portraits/1.jpg" alt="">
                                </div>
                                <p class="font-size-20 blue-grey-700">Visitor</p>
                            </div>
                            <div class="widget-content bg-white padding-40 padding-top-0">
                                <div class="padding-bottom-10">
                                    <h4 class="example-title font-weight-100">First Seen</h4>
                                    <hr class="margin-top-0 margin-bottom-10"/>
                                    <p>
                                        <span><i class="wb wb-time text-primary"></i> @{{ lead.first_hit.created_at | datetime }}</span>
                                    </p>
                                </div>
                                <div class="">
                                    <h4 class="example-title font-weight-100">Last Seen</h4>
                                    <hr class="margin-top-0 margin-bottom-10"/>
                                    <p>
                                        <span><i class="wb wb-time text-primary"></i> @{{ lead.last_seen | datetime }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xlg-6 col-lg-8 col-md-12">
                        <div class="widget widget-shadow">
                            <div class="widget-content bg-white padding-20">
                                <div v-for="hit in hits">
                                    @{{ hit.created_at | relativeFull }}
                                    | @{{ hit.referer.url }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </visitor>
@endsection()