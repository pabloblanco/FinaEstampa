<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Form Wizard</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Form Wizard with validations</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <form id="commentForm">

                                            <div id="pills"class="wizardpills" >
                                                <ul class="form-wizard">
                                                    <li><a href="#pills-tab1" data-toggle="tab"><span>Basic</span></a></li>
                                                    <li><a href="#pills-tab2" data-toggle="tab"><span>Profile</span></a></li>
                                                    <li><a href="#pills-tab3" data-toggle="tab"><span>Contact</span></a></li>
                                                    <li><a href="#pills-tab4" data-toggle="tab"><span>Settings</span></a></li>
                                                    <li><a href="#pills-tab5" data-toggle="tab"><span>Portfolio</span></a></li>
                                                </ul>
                                                <div id="bar" class="progress active">
                                                    <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane" id="pills-tab1">

                                                        <h4>Basic Information</h4><br>
                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Full Name</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Full Name" class="form-control" name="txtFullName" id="txtFullName">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Email</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Email" class="form-control" name="txtEmail" id="txtEmail">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label" for="field-1">Phone</label>
                                                            <div class="controls">
                                                                <input type="text" placeholder="Phone" class="form-control" name="txtPhone" id="txtPhone">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="pills-tab2">
                                                        <h4>Profile Information</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab3">
                                                        <h4>Contact Information</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab4">
                                                        <h4>Settings Information</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab5">
                                                        <h4>Portfolio Information</h4><br>
                                                        <p>Form goes here</p>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <ul class="pager wizard">
                                                        <li class="previous first" style="display:none;"><a href="javascript:;">First</a></li>
                                                        <li class="previous"><a href="javascript:;">Previous</a></li>
                                                        <li class="next last" style="display:none;"><a href="javascript:;">Last</a></li>
                                                        <li class="next"><a href="javascript:;">Next</a></li>
                                                        <li class="finish"><a href="javascript:;">Finish</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
';
?>