@extends('spark::layouts.app')

@section('content')
    <people :user="user" inline-template>
        <div class="page-content-wrapper full-height">
            <div class="content full-height">
                <div class="full-height">
                    <div class="split-view">
                        <div class="split-list">
                            <a class="list-refresh" href="#"><i class="fa fa-refresh"></i></a>
                            <div class="list-view">
                                <div class="list-view-wrapper" data-ios="false">
                                    <div class="list-view-group-container">
                                        <div class="list-view-group-header"><span>Yesterday April 22 </span></div>
                                        <ul class="no-padding">
                                            <li class="item padding-15">
                                                <div class="thumbnail-wrapper d32 circular bordered b-warning">
                                                    <img width="40" height="40" alt=""
                                                         data-src-retina="assets/img/profiles/avatar2x.jpg"
                                                         data-src="assets/img/profiles/avatar.jpg"
                                                         src="assets/img/profiles/avatar2x.jpg">
                                                </div>
                                                <div class="checkbox  no-margin p-l-10">
                                                    <input type="checkbox" value="1" id="emailcheckbox-0-0">
                                                    <label for="emailcheckbox-0-0"></label>
                                                </div>
                                                <div class="inline m-l-15">
                                                    <p class="recipients no-margin hint-text small">David Nester,Jane Smith</p>
                                                    <p class="subject no-margin">Pages - Multi-Purpose Admin Template
                                                        Revolution Begins here!</p>
                                                </div>
                                                <div class="datetime">5 Mins ago</div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-email="opened" class="split-details">
                            <div class="no-result">
                                <h1>No email has been selected</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </people>
@endsection
