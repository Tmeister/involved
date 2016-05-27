@extends('spark::layouts.app')

@section('page')
    <people inline-template>
        <div class="page animsition bg-white">
            <div class="page-aside">
                <div class="page-aside-switch">
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                    <i class="icon wb-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="page-aside-inner scrollable scrollable-vertical is-disabled" data-plugin="pageAsideScroll"
                     style="position: relative;">
                    <div data-role="container" class="scrollable-container" style="">
                        <div data-role="content" class="scrollable-content">
                            <div class="page-aside-section">
                                <h5 class="page-aside-title">FILTER 1</h5>
                            </div>
                            <div class="page-aside-section">
                                <h5 class="page-aside-title">FILTER 2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false">
                        <div class="scrollable-bar-handle" style="height: 386.942px;"></div>
                    </div>
                </div>

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
                            <tr v-for="lead in leads.data">
                                <td><span>Visitor @{{lead.id}}</span></td>
                                <td>
                                    <span class="flag-icon flag-icon-@{{ lead.last_hit.geo.country_code | lowercase }} flag-icon-squared"></span>
                                    <span class="padding-left-5">@{{ lead.last_hit.geo.country_name }}</span>
                                </td>
                                <td>
                                    <span v-if="lead.last_hit.geo.city">@{{ lead.last_hit.geo.city  }}</span>
                                    <span v-if="!lead.last_hit.geo.city"> - </span>
                                </td>
                                <td><span>@{{ lead.first_hit.created_at | relative }}</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </people>
@endsection()