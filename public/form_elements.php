<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Form Elements</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Basic Elements</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Name</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-2">Password</label>
                                            <span class="desc">e.g. "Cre@t!v!ty"</span>
                                            <div class="controls">
                                                <input type="password" value="Cre@t!v!ty" class="form-control" id="field-2" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Email</label>
                                            <span class="desc">e.g. "me@somesite.com"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-3" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-4">Placeholder</label>
                                            <span class="desc">e.g. "Username"</span>
                                            <div class="controls">
                                                <input type="text" id="field-4" placeholder="Enter your desired text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-5">Disabled</label>
                                            <span class="desc">e.g. "non-editable text"</span>
                                            <div class="controls">
                                                <input type="text" id="field-5" placeholder="Disabled input field" class="form-control" disabled="disabled">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Text area</label>
                                            <span class="desc">e.g. "Enter any size of text description here"</span>
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" id="field-6"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-7">Auto grow</label>
                                            <span class="desc">e.g. "This text area field auto grows"</span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-7" placeholder="This textarea will grow in size with new lines." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group has-error">
                                            <label class="form-label" for="field-8">Error Field</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-8" placeholder="I am a error field">
                                            </div>
                                        </div>

                                        <div class="form-group has-warning">
                                            <label class="form-label" for="field-9">Warning Field</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-9" placeholder="I am a warning field" >
                                            </div>
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="form-label" for="field-10">Success Field</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-10" placeholder="I am a success field" >
                                            </div>
                                        </div>

                                        <div class="form-group has-info">
                                            <label class="form-label" for="field-11">Info Field</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-11" placeholder="I am a info field" >
                                            </div>
                                        </div>

                                        <div class="form-group has-focus">
                                            <label class="form-label" for="field-12">Focus</label>
                                            <span class="desc">e.g. "Beautiful Mind"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-12" placeholder="I am a focused field ">
                                            </div>
                                        </div>

                                        <div class="form-group has-help">
                                            <label class="form-label" for="field-13">Help Field</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-13" placeholder="I am a help field">
                                                <span class="help-block">A help or brief description message of the input field.</span>
                                            </div>
                                        </div>

                                        <div class="form-group has-static">
                                            <label class="form-label">Static Field</label>
                                            <div class="controls">
                                                <p class="form-control-static">A static text field</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </section></div>



                    <div class="col-lg-7 col-md-7 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Input Groups</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="input-group transparent">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Transparent">
                                        </div>

                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="arrow"></span>
                                                <i class="fa fa-envelope"></i>     
                                            </span>
                                            <input type="text" class="form-control" placeholder="Default">
                                        </div>                

                                        <br>

                                        <div class="input-group primary">
                                            <span class="input-group-addon">                
                                                <span class="arrow"></span>
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Primary">
                                        </div>


                                        <br>


                                        <div class="input-group primary">
                                            <input type="text" class="form-control text-right" placeholder="Right Align" aria-describedby="basic-addon1">
                                            <span class="input-group-addon" id="basic-addon1"><span class="arrow"></span><i class="fa fa-user"></i></span>
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Recipient"s username" aria-describedby="basic-addon2">
                                            <span class="input-group-addon" id="basic-addon2">@example.com</span>
                                        </div>
                                        <br>


                                        <div class="input-group primary">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon">.00</span>
                                        </div>







                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>

                                        <br>

                                        <div class="input-group primary">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-red dropdown-toggle" data-toggle="dropdown">
                                                    Action <span class="caret"></span>
                                                </button>

                                                <ul class="dropdown-menu dropdown-red no-spacing">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </span>

                                            <input type="text" class="form-control no-left-border form-focus-red" placeholder="Dropdown">
                                        </div>

                                        <br>


                                        <div class="input-group m-bot15">
                                            <span class="input-group-addon">
                                                <input type="checkbox" class="iCheck">
                                            </span>
                                            <input type="text" class="form-control" placeholder="Input with Checkbox">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </section></div>

                    <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Element Sizes</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg">
                                        <br>
                                        <input class="form-control m-bot15" type="text" placeholder="Default input">
                                        <br>
                                        <input class="form-control input-sm m-bot15" type="text" placeholder=".input-sm">
                                        <br>

                                        <select class="form-control input-lg m-bot15">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                        <br>
                                        <select class="form-control m-bot15">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                        <br>
                                        <select class="form-control input-sm m-bot15">
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </section></div>



                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Vertical Form</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <form role="form">
                                            <div class="form-group">
                                                <label class="form-label" for="email-1">Email address:</label>
                                                <input type="email" class="form-control" id="email-1" placeholder="Enter your email…">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="password-1">Password:</label>
                                                <input type="password" class="form-control" id="password-1" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">
                                                    <input type="checkbox" class="iCheck" checked> <span>Remember me</span>
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary ">Sign in</button>
                                                <button type="button" class="btn btn-purple  pull-right">Register now</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </section></div>


                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Modal Forms</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <!-- START -->
                                        <div class="position-center ">
                                            <div class="text-center">
                                                <a href="#myModal" data-toggle="modal" class="btn btn-lg btn-success btn-block">
                                                    MODAL FORM 1
                                                </a>
                                                <br>
                                                <a href="#myModal-1" data-toggle="modal" class="btn btn-lg btn-warning btn-block">
                                                    MODAL FORM 2
                                                </a>
                                                <br>
                                                <a href="#myModal-2" data-toggle="modal" class="btn btn-lg btn-danger btn-block">
                                                    MODAL FORM 3
                                                </a>
                                                <br>
                                            </div>

                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Register as User</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form">

                                                                <div class="form-group">
                                                                    <label for="modalname1" class="form-label">Full Name</label>
                                                                    <input type="text" class="form-control" id="modalname1" placeholder="Enter name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="modalemail1" class="form-label">Email address</label>
                                                                    <input type="email" class="form-control" id="modalemail1" placeholder="Enter email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="modalpw1" class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="modalpw1" placeholder="Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="modalfile" class="form-label">File input</label>
                                                                    <input type="file" id="modalfile3">
                                                                    <span class="help-block">Example block-level help text here.</span>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" class="iCheck"> Check me out
                                                                    </label>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Sign In</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form-horizontal" role="form">



                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <span class="arrow"></span>
                                                                        <i class="fa fa-envelope"></i>     
                                                                    </span>
                                                                    <input type="text" class="form-control" placeholder="Your Email" id="inputEmail2" value="">
                                                                </div>
                                                                <br>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <span class="arrow"></span>
                                                                        <i class="fa fa-lock"></i>     
                                                                    </span>
                                                                    <input type="password" class="form-control" placeholder="Your Password" id="inputpw2" value="">
                                                                </div>

                                                                <br>
                                                                <div class="input-group">
                                                                    <label class="form-label">
                                                                        <input type="checkbox" checked="" class="iCheck"> <span>Remember me</span>
                                                                    </label>
                                                                </div>                                            
                                                                <br>
                                                                <div class="input-group">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Inline Form In modal</h4>
                                                        </div>
                                                        <div class="modal-body">


                                                            <form role="form" class="form-inline">

                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Username">
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" placeholder="Password">
                                                                </div>


                                                                <div class="form-group pull-right">
                                                                    <button class="btn btn-primary ">Sign in</button>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="cbr-inline form-label">
                                                                        <input type="checkbox"  class="iCheck" checked> <span>Remember</span>
                                                                    </label>
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END -->




                                    </div>
                                </div>

                            </div>
                        </section></div>








                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Inline Form</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                            </div>
                                            <div class="checkbox" style="margin:0px 15px;">
                                                <label>
                                                    <input type="checkbox" class="iCheck"> Remember me
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign in</button>

                                            <button type="button" class="btn btn-purple pull-right">Register</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </section></div>




                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Checkboxes</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- SKIN START -->

                                        <h3>Default Skin (Minimal)</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-1" class="icheck-minimal-red" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-1">Checkbox red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-2" class="icheck-minimal-green" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-2">Checkbox green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-3" class="icheck-minimal-aero" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-3">Checkbox aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-4" class="icheck-minimal-blue" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-4">Checkbox blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-5" class="icheck-minimal-yellow" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-5">Checkbox yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-6" class="icheck-minimal-grey" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-6">Checkbox grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-7" class="icheck-minimal-orange" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-7">Checkbox orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-8" class="icheck-minimal-pink" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-8">Checkbox pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="minimal-checkbox-9" class="icheck-minimal-purple" checked>
                                                                <label class="icheck-label form-label" for="minimal-checkbox-9">Checkbox purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state icheckbox_minimal"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_minimal hover"></div>
                                                        Hover
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_minimal checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_minimal disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_minimal checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>



                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Square Skin</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-1" class="skin-square-red" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-1">Checkbox red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-2" class="skin-square-green" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-2">Checkbox green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-3" class="skin-square-aero" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-3">Checkbox aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-4" class="skin-square-blue" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-4">Checkbox blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-5" class="skin-square-yellow" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-5">Checkbox yellow</label>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-6" class="skin-square-grey" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-6">Checkbox grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-7" class="skin-square-orange" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-7">Checkbox orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-8" class="skin-square-pink" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-8">Checkbox pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="square-checkbox-9" class="skin-square-purple" checked>
                                                                <label class="icheck-label form-label" for="square-checkbox-9">Checkbox purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state icheckbox_square-green"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_square-green hover"></div>
                                                        Hover
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_square-green checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_square-green disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_square-green checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>



                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Flat Skin</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-1" class="skin-flat-red" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-1">Checkbox red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-2" class="skin-flat-green" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-2">Checkbox green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-3" class="skin-flat-aero" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-3">Checkbox aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-4" class="skin-flat-blue" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-4">Checkbox blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-5" class="skin-flat-yellow" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-5">Checkbox yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-6" class="skin-flat-grey" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-6">Checkbox grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-7" class="skin-flat-orange" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-7">Checkbox orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-8" class="skin-flat-pink" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-8">Checkbox pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="flat-checkbox-9" class="skin-flat-purple" checked>
                                                                <label class="icheck-label form-label" for="flat-checkbox-9">Checkbox purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state icheckbox_flat-red"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_flat-red checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_flat-red disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_flat-red checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>


                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Line Skin (Boxes)</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">


                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-1" class="skin-line-red" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-1">Checkbox red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-2" class="skin-line-green" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-2">Checkbox green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-3" class="skin-line-aero" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-3">Checkbox aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-4" class="skin-line-blue" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-4">Checkbox blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-5" class="skin-line-yellow" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-5">Checkbox yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-6" class="skin-line-grey" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-6">Checkbox grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-7" class="skin-line-orange" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-7">Checkbox orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-8" class="skin-line-pink" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-8">Checkbox pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="checkbox" id="line-checkbox-9" class="skin-line-purple" checked>
                                                                <label class="icheck-label form-label" for="line-checkbox-9">Checkbox purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state icheckbox_line-blue">
                                                            <div class="icheck_line-icon"></div>
                                                            Normal
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_line-blue hover">
                                                            <div class="icheck_line-icon"></div>
                                                            Hover
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_line-blue checked">
                                                            <div class="icheck_line-icon"></div>
                                                            Checked
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_line-blue disabled">
                                                            <div class="icheck_line-icon"></div>
                                                            Disabled
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state icheckbox_line-blue checked disabled">
                                                            <div class="icheck_line-icon"></div>
                                                            Disabled &amp; checked
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>




                                    </div>
                                </div>

                            </div>
                        </section></div>












                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Radio Buttons</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- SKIN START -->

                                        <h3>Default Skin (Minimal)</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-1" class="icheck-minimal-red" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-1">Radio red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-2" class="icheck-minimal-green" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-2">Radio green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-3" class="icheck-minimal-aero" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-3">Radio aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-4" class="icheck-minimal-blue" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-4">Radio blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-5" class="icheck-minimal-yellow" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-5">Radio yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-6" class="icheck-minimal-grey" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-6">Radio grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-7" class="icheck-minimal-orange" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-7">Radio orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-8" class="icheck-minimal-pink" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-8">Radio pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="minimal-radio-9" class="icheck-minimal-purple" checked>
                                                                <label class="iradio-label form-label" for="minimal-radio-9">Radio purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state iradio_minimal"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_minimal hover"></div>
                                                        Hover
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_minimal checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_minimal disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_minimal checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>



                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Square Skin</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-1" class="skin-square-red" checked>
                                                                <label class="iradio-label form-label" for="square-radio-1">Radio red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-2" class="skin-square-green" checked>
                                                                <label class="iradio-label form-label" for="square-radio-2">Radio green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-3" class="skin-square-aero" checked>
                                                                <label class="iradio-label form-label" for="square-radio-3">Radio aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-4" class="skin-square-blue" checked>
                                                                <label class="iradio-label form-label" for="square-radio-4">Radio blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-5" class="skin-square-yellow" checked>
                                                                <label class="iradio-label form-label" for="square-radio-5">Radio yellow</label>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-6" class="skin-square-grey" checked>
                                                                <label class="iradio-label form-label" for="square-radio-6">Radio grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-7" class="skin-square-orange" checked>
                                                                <label class="iradio-label form-label" for="square-radio-7">Radio orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-8" class="skin-square-pink" checked>
                                                                <label class="iradio-label form-label" for="square-radio-8">Radio pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="square-radio-9" class="skin-square-purple" checked>
                                                                <label class="iradio-label form-label" for="square-radio-9">Radio purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state iradio_square-green"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_square-green hover"></div>
                                                        Hover
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_square-green checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_square-green disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_square-green checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>



                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Flat Skin</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-1" class="skin-flat-red" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-1">Radio red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-2" class="skin-flat-green" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-2">Radio green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-3" class="skin-flat-aero" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-3">Radio aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-4" class="skin-flat-blue" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-4">Radio blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-5" class="skin-flat-yellow" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-5">Radio yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-6" class="skin-flat-grey" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-6">Radio grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-7" class="skin-flat-orange" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-7">Radio orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-8" class="skin-flat-pink" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-8">Radio pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-radio-9" class="skin-flat-purple" checked>
                                                                <label class="iradio-label form-label" for="flat-radio-9">Radio purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state iradio_flat-red"></div>
                                                        Normal
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_flat-red checked"></div>
                                                        Checked
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_flat-red disabled"></div>
                                                        Disabled
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_flat-red checked disabled"></div>
                                                        Disabled &amp; checked
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>


                                        <!-- SKIN START -->
                                        <br>
                                        <h3>Line Skin (Boxes)</h3>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Colors</h4>
                                                <div class="row">
                                                    <div class="col-md-6">


                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-1" class="skin-line-red" checked>
                                                                <label class="iradio-label form-label" for="line-radio-1">Radio red</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-2" class="skin-line-green" checked>
                                                                <label class="iradio-label form-label" for="line-radio-2">Radio green</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-3" class="skin-line-aero" checked>
                                                                <label class="iradio-label form-label" for="line-radio-3">Radio aero</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-4" class="skin-line-blue" checked>
                                                                <label class="iradio-label form-label" for="line-radio-4">Radio blue</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-5" class="skin-line-yellow" checked>
                                                                <label class="iradio-label form-label" for="line-radio-5">Radio yellow</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-6" class="skin-line-grey" checked>
                                                                <label class="iradio-label form-label" for="line-radio-6">Radio grey</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-7" class="skin-line-orange" checked>
                                                                <label class="iradio-label form-label" for="line-radio-7">Radio orange</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-8" class="skin-line-pink" checked>
                                                                <label class="iradio-label form-label" for="line-radio-8">Radio pink</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="line-radio-9" class="skin-line-purple" checked>
                                                                <label class="iradio-label form-label" for="line-radio-9">Radio purple</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>States</h4>
                                                <ul class="list-unstyled states">
                                                    <li>
                                                        <div class="state iradio_line-blue">
                                                            <div class="icheck_line-icon"></div>
                                                            Normal
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_line-blue hover">
                                                            <div class="icheck_line-icon"></div>
                                                            Hover
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_line-blue checked">
                                                            <div class="icheck_line-icon"></div>
                                                            Checked
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_line-blue disabled">
                                                            <div class="icheck_line-icon"></div>
                                                            Disabled
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="state iradio_line-blue checked disabled">
                                                            <div class="icheck_line-icon"></div>
                                                            Disabled &amp; checked
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>




                                    </div>
                                </div>

                            </div>
                        </section></div>




















                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Input Grid</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <!-- START -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" placeholder="xs-12">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder=".col-xs-6">
                                    </div>

                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" placeholder=".col-xs-6">
                                    </div>
                                </div>
                                <br>                                    
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>
                                </div>
                                <br>                                    
                                <div class="row">
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>

                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>

                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>

                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>

                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>

                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>

                                    <div class="col-xs-1 ">
                                        <input type="text" class="form-control" placeholder=".xs-1">
                                    </div>
                                </div>
                                <!-- END -->


                            </div>
                        </section>
                    </div>
';
?>