@extends('spark::layouts.app')

@section('extra-body-classes')
page-aside-fixed
@endsection()

@section('page')
    <people inline-template>
        <div class="page animsition bg-white" >
            <div class="page-aside">
                <div class="page-aside-switch">
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                    <i class="icon wb-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="page-aside-inner" data-plugin="pageAsideScroll">
                    <div data-role="container">
                        <div data-role="content">
                            <section class="page-aside-section">
                                <h5 class="page-aside-title">Main</h5>
                                <div class="list-group">
                                    <a class="list-group-item active" href="javascript:void(0)"><i class="icon wb-dashboard" aria-hidden="true"></i>Overview</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-pluse" aria-hidden="true"></i>Activity</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-heart" aria-hidden="true"></i>Dearest</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-folder" aria-hidden="true"></i>Folders</a>
                                </div>
                            </section>
                            <section class="page-aside-section">
                                <h5 class="page-aside-title">Filter</h5>
                                <div class="list-group">
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-image" aria-hidden="true"></i>Images</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-volume-high" aria-hidden="true"></i>Audio</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-camera" aria-hidden="true"></i>Video</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-file" aria-hidden="true"></i>Notes</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-link-intact" aria-hidden="true"></i>Links</a>
                                    <a class="list-group-item" href="javascript:void(0)"><i class="icon wb-order" aria-hidden="true"></i>Files</a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!---page-aside-inner-->
            </div>
            <div class="page-main">
                <div class="page-content page-content-table" data-selectable="selectable">
                    <div class="table-responsive">
                        <div class="vertical-align text-center height-500" v-if="!leads">
                            <div class="loader-default loader vertical-align-middle" data-type="default"></div>
                        </div>
                        <table class="table table-hover table-striped" v-if="leads">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>First seen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="lead in leads.data" data-user-id="@{{ lead.public_id }}" @click="show(lead.public_id);">
                                <td><span>Visitor @{{lead.id}}</span></td>
                                <td>
                                    <span class="flag-icon flag-icon-@{{ lead.last_hit.geo.country_code | lowercase }} flag-icon-squared"></span>
                                    <span class="padding-left-5">@{{ lead.last_hit.geo.country_name }}</span>
                                </td>
                                <td>
                                    <span v-if="lead.last_hit.geo.city">@{{ lead.last_hit.geo.city  }}</span>
                                    <span v-if="!lead.last_hit.geo.city"> - </span>
                                </td>
                                <td>
                                    <span><i class="wb wb-time text-primary"></i> @{{ lead.first_hit.created_at | datetime }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </people>
@endsection()