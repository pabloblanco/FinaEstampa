<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">File Uploader</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">DropZone (Drag n Drop)</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <form action="javascript:if(confirm("http://jaybabani.com/ultra-admin/data/upload-file.html"))window.location="http://softhaus.com.mx/logistik/app/upload-file.html"" class="dropzone"></form>
                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Custom Uploader</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="custom-dropzone">
                                            <div class="col-sm-8 drop-table">

                                                <table class="table" id="custom-droptable">
                                                    <thead>
                                                        <tr>
                                                            <th width="1%" class="text-center">#</th>
                                                            <th width="50%">Name</th>
                                                            <th width="20%">Progress</th>
                                                            <th>Size</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">No Files Uploaded Yet!</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-4 drop-area text-center">
                                                <div id="customDZ" class="droppable-area">
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
';
?>