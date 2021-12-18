<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Form Validations</h1>
                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-6">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Message Validations</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <form id="msg_validate" action="javascript:;" novalidate="novalidate">

                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Name</label>
                                                <span class="desc">e.g. "Beautiful Mind"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield1" name="formfield1" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield2">Email</label>
                                                <span class="desc">e.g. "some@example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield2" name="formfield2" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield3">Website</label>
                                                <span class="desc">e.g. "www.example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield3" name="formfield3" >
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </form>





                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Iconic Validations</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <form id="icon_validate" action="#">



                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Name</label>
                                                <span class="desc">e.g. "Beautiful Mind"</span>
                                                <div class="controls">
                                                    <i class=""></i>
                                                    <input type="text" class="form-control" id="formfield1" name="formfield1" >
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="form-label" for="formfield2">Email</label>
                                                <span class="desc">e.g. "some@example.com"</span>
                                                <div class="controls">
                                                    <i class=""></i>
                                                    <input type="text" class="form-control" id="formfield2" name="formfield2" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield3">Website</label>
                                                <span class="desc">e.g. "www.example.com"</span>
                                                <div class="controls">
                                                    <i class=""></i>
                                                    <input type="text" class="form-control" id="formfield3" name="formfield3" >
                                                </div>
                                            </div>


                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-default"><i class="fa fa-times"></i></button>
                                            </div>
                                        </form>






                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">General Field Validations</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">

                                    <form id="general_validate" action="javascript:;" novalidate="novalidate">

                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <div class="form-group">
                                                <label class="form-label" for="formfield1">Required Field</label>
                                                <span class="desc">e.g. "anything"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield1" name="formfield1" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield2">Email</label>
                                                <span class="desc">e.g. "some@example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield2" name="formfield2" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield8">Password</label>
                                                <span class="desc">e.g. "hello123"</span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="formfield8" name="formfield8" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield9">Confirm Password</label>
                                                <span class="desc">e.g. "hello123"</span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="formfield9" name="formfield9" >
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="formfield3">URL</label>
                                                <span class="desc">e.g. "www.example.com"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield3" name="formfield3" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield4">Credit Card</label>
                                                <span class="desc">e.g. "4029343843434"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield4" name="formfield4" >
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">

                                            <div class="form-group">
                                                <label class="form-label" for="formfield5">Numeric</label>
                                                <span class="desc">e.g. "3423"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield5" name="formfield5" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield6">Minimum Length</label>
                                                <span class="desc">e.g. "minimum 3 characters"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield6" name="formfield6" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield7">Maximum Length</label>
                                                <span class="desc">e.g. "maximum 5 characters"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield7" name="formfield7" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield10">Upload File</label>
                                                <span class="desc">e.g. "character.jpg"</span>
                                                <div class="controls">
                                                    <input type="file" class="form-control" id="formfield10" name="formfield10" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield11">AlphaNumeric</label>
                                                <span class="desc">e.g. "hello123"</span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield11" name="formfield11" >
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right ">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>



                                    </form>




                                </div>
                            </div>
                        </section>
                    </div>
';
?>