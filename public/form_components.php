<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Form Components (Advanced)</h1>
                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Date Picker</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Date Format</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" value="Mon, 02 February 2015">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Start & End Date</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-start-date="-2d" data-end-date="+1w">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Disabled days</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-disabled-days="0,6">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Start with month</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-start-view="1">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Start with year</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-start-view="2">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Only month & year</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-min-view-mode="months" data-start-view="2" data-format="mm/yyyy">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Only year</label>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-min-view-mode="years" data-start-view="2" data-format="yyyy">
                                            </div>
                                        </div>

                                        <label class="form-label" for="field-1">Date Component</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" data-min-view-mode="months" data-start-view="2" data-format="mm/yyyy">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Time Picker</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Simple Rotator</label>
                                            <div class="controls">
                                                <input type="text" class="form-control timepicker">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Simple Drop Down</label>
                                            <div class="controls">
                                                <input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="09:45 PM" data-show-meridian="true" data-minute-step="5">
                                            </div>
                                        </div>



                                        <label class="form-label" for="field-1">Input Group with DropDown</label>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="09:45 PM" data-show-meridian="true" data-minute-step="5" data-second-step="5">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>


                                        <label class="form-label" for="field-1">Date & Time (both)</label>
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <input type="text" value="Mon, 02 February 2015" class="form-control datepicker col-md-4" data-format="D, dd MM yyyy">
                                            </div>
                                            <div class="col-xs-4" style="padding-left:0px;">
                                                <input type="text" class="form-control timepicker col-md-4" data-template="dropdown" data-show-seconds="true" data-default-time="09:45 PM" data-show-meridian="true" data-minute-step="5" data-second-step="5">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Date & Time Picker</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">




                                        <label class="form-label" for="field-1">Default Format</label>
                                        <div class="form-group">
                                            <div class="input-group date form_datetime" data-date="2014-05-26T05:35:07Z" data-date-format="MM dd yyyy - HH:ii p" data-link-field="dtpick_1">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dtpick_1" value="" />
                                        </div>



                                        <label class="form-label" for="field-1">Meridian Format</label>
                                        <div class="form-group">
                                            <div class="input-group date form_datetime_meridian" data-date="2014-05-26T05:35:07Z" data-date-format="MM dd yyyy - HH:ii p" data-link-field="dtpick_2">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dtpick_2" value="" />
                                        </div>


                                        <label class="form-label" for="field-1">Language Example</label>
                                        <div class="form-group">
                                            <div class="input-group date form_datetime_lang" data-date="2014-05-26T05:35:07Z" data-date-format="MM dd yyyy - HH:ii p" data-link-field="dtpick_3">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="fa fa-times"></span></span>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            </div>
                                            <input type="hidden" id="dtpick_3" value="" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>





                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Date Range</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="daterange-1">Default</label>
                                            <div class="controls">
                                                <input type="text" id="daterange-1" class="form-control daterange">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-2">Selected Date Range</label>
                                            <div class="controls">
                                                <input type="text" id="daterange-2" class="form-control daterange" data-format="MM-DD-YYYY" data-start-date="02-10-2014" data-end-date="21-10-2014" data-separator=",">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-3">Disabled Range</label>
                                            <div class="controls">
                                                <input type="text" id="daterange-3" class="form-control daterange" data-min-date="10-21-2014" data-max-date="11-08-2014">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-4">Date Range with Timepicker</label>
                                            <div class="controls">
                                                <input type="text" id="daterange-4" class="form-control daterange" data-time-picker="true" data-time-picker-increment="5" data-format="YYYY/MM/DD hh:mm A">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="daterange-5">Custom Ranges</label>
                                            <div class="daterange daterange-text add-date-ranges" data-format="MMMM D, YYYY" data-start-date="February 19, 2015" data-end-date="March 19, 2015">
                                                <i class="fa fa-calendar"></i>
                                                <span>February 19, 2015 - March 19, 2015</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Color Picker</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-1">Default</label>
                                            <div class="controls">
                                                <input type="text" class="form-control colorpicker ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-1">RGBA Format</label>
                                            <div class="controls">
                                                <input type="text" class="form-control colorpicker " data-format="rgba">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="daterange-1">Horizontal</label>
                                            <div class="controls">
                                                <input type="text" class="form-control colorpicker " data-horizontal="true">
                                            </div>
                                        </div>


                                        <label class="form-label" for="daterange-1">Preview Color</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="sel-color" style="background-color:#da4237;"></i>
                                            </span>
                                            <input type="text" class="form-control colorpicker " data-format="hex" value="#da4237">
                                        </div>                

                                        <br>


                                        <label class="form-label" for="daterange-1">Color icon indicator</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-eye"></i>     
                                            </span>
                                            <input type="text" class="form-control colorpicker " data-format="hex">
                                        </div>                



                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Spinners</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Default</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="spinner" name="value">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Steps Incremental</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="spinner2" value="5">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Overflow</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="spinner3" name="value">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="clearfix"></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Tags</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Default</label>
                                            <span class="desc">(&lt;input&gt;)</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="tagsinput-1" data-role="tagsinput" value="Sample tag, Another great tag, Awesome!" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Select Tag</label>
                                            <span class="desc">(&lt;select&gt;)</span>
                                            <div class="controls">
                                                <select multiple data-role="tagsinput">
                                                    <option value="Amsterdam">Amsterdam</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="Sydney">Sydney</option>
                                                    <option value="Beijing">Beijing</option>
                                                    <option value="Cairo">Cairo</option>
                                                    <option value="Paris">Paris</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Custom colors</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="tagsinput-2" value="Sample tag, Another great tag, Awesome!, Every time, Different Color" />
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </section></div>







                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Switches</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>Sizes</h4>


                                                <div class="form-block">
                                                    <input type="checkbox" class="iswitch iswitch-primary">
                                                </div>

                                                <div class="form-block">
                                                    <input type="checkbox" checked="" class="iswitch iswitch-md iswitch-primary">
                                                </div>

                                                <div class="form-block">
                                                    <input type="checkbox" class="iswitch iswitch-lg iswitch-primary">
                                                </div>



                                            </div>
                                            <div class="col-md-8">
                                                <h4>Colors</h4>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-primary"></div>
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-warning"></div>
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-danger"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-success"></div>
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-orange"></div>
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-purple"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-info"></div>
                                                        <div class="form-block"><input type="checkbox" checked="" class="iswitch iswitch-md iswitch-secondary"></div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>




                                    </div>
                                </div>
                            </div>
                        </section></div>





                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sliders</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <h3>Horizontal</h3>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Types</h4>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Default</label>
                                                <div class="controls">
                                                    <div class="slider slider-primary" data-min="0" data-max="1800" data-value="223"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">With Prefix Value</label>
                                                <div class="controls">
                                                    <div class="slider slider-primary" data-prefix="&pound;" data-min="0" data-max="1800" data-value="223"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Snap Increment Value</label>
                                                <div class="controls">
                                                    <div class="slider slider-primary" data-min="0" data-max="1800" data-value="223" data-step="100"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Transparent (Basic)</label>
                                                <div class="controls">
                                                    <div class="slider slider-primary" data-basic="1" data-min="0" data-max="1800" data-value="120" data-step="10"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Range</label>
                                                <div class="controls">
                                                    <div class="slider slider-primary" data-postfix="$" data-min="0" data-max="2000" data-min-val="400" data-max-val="1400"></div>
                                                </div>
                                            </div><br>

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h4>Colors</h4>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Success</label>
                                                <div class="controls">
                                                    <div class="slider slider-success" data-min="0" data-max="1800" data-value="1223"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Warning</label>
                                                <div class="controls">
                                                    <div class="slider slider-warning" data-min="0" data-max="1800" data-value="723"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Info</label>
                                                <div class="controls">
                                                    <div class="slider slider-info" data-min="0" data-max="1800" data-value="1213"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Danger</label>
                                                <div class="controls">
                                                    <div class="slider slider-danger" data-min="0" data-max="1800" data-value="435"></div>
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <label class="form-label" for="daterange-1">Purple</label>
                                                <div class="controls">
                                                    <div class="slider slider-purple" data-min="0" data-max="1800" data-value="878"></div>
                                                </div>
                                            </div><br>


                                        </div>

                                        <div class="clearfix"></div><br>

                                        <h3>Vertical</h3>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h4>Types</h4>

                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Default</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-primary" data-vertical="1" data-min="0" data-max="1800" data-value="865"></div>
                                            </div>

                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">With&nbsp;Prefix</div><br>
                                                <div style="height:200px;margin:0 auto;" data-prefix="&pound;" class="slider slider-primary" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="1465"></div>
                                            </div>

                                            <div class="col-md-2 col-sm-3 col-xs-4"> 
                                                <div class="text-center">Transparent</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider" data-vertical="1" data-basic="1" data-min="0" data-max="1800" data-value="700"></div>
                                            </div>

                                            <div class="col-md-2 col-sm-3 col-xs-4"> 
                                                <div class="text-center">Snap&nbsp;Increment</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-primary" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="1200" data-step="100"></div>
                                            </div>

                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Range</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-primary" data-vertical="1" data-postfix=" $" data-min="0" data-max="2000" data-min-val="400" data-max-val="1400"></div>
                                            </div>

                                            <br><div class="clearfix"></div><br>

                                            <h4>Colors</h4>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Success</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-success" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Warning</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-warning" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Info</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-info" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Danger</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-danger" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Purple</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-purple" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>
                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                <div class="text-center">Orange</div><br>
                                                <div style="height:200px;margin:0 auto;" class="slider slider-orange" data-vertical="1" data-prefix="&pound; " data-min="0" data-max="1800" data-value="865"></div>
                                            </div>


                                        </div>	


                                        <br><div class="clearfix"></div><br><br>





                                        <div class="col-md-12 ">
                                            <h3>Slider Color Widget</h3><br>
                                            <div class="col-md-6 col-sm-7 col-xs-12">

                                                <div class="form-group">
                                                    <label class="form-label" for="daterange-1">Red</label>
                                                    <div id="slider-red"></div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="form-label" for="daterange-1">Green</label>
                                                    <div id="slider-green"></div>
                                                </div><br>

                                                <div class="form-group">
                                                    <label class="form-label" for="daterange-1">Blue</label>
                                                    <div id="slider-blue"></div>
                                                </div><br>

                                            </div>

                                            <div class="col-md-4 col-sm-5 col-xs-12">
                                                <div id="slider-swatch" style="height:200px;width:100%;margin-top:32px;" class=""></div>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Select2 - select Replacement</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label">Select list</label>

                                            <select class="" id="s2example-1">
                                                <option></option>
                                                <optgroup label="North America">
                                                    <option>Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>Arizona</option>
                                                    <option>Arkansas</option>
                                                    <option>California</option>
                                                    <option>Colorado</option>
                                                    <option>Connecticut</option>
                                                    <option>Delaware</option>
                                                    <option>Florida</option>
                                                    <option>Georgia</option>
                                                    <option>Hawaii</option>
                                                    <option>Idaho</option>
                                                    <option>Illinois</option>
                                                    <option>Indiana</option>
                                                    <option>Iowa</option>
                                                    <option>Kansas</option>
                                                    <option>Kentucky[C]</option>
                                                    <option>Louisiana</option>
                                                    <option>Maine</option>
                                                    <option>Maryland</option>
                                                    <option>Massachusetts[D]</option>
                                                    <option>Michigan</option>
                                                    <option>Minnesota</option>
                                                    <option>Mississippi</option>
                                                    <option>Missouri</option>
                                                    <option>Montana</option>
                                                    <option>Nebraska</option>
                                                    <option>Nevada</option>
                                                    <option>New Hampshire</option>
                                                    <option>New Jersey</option>
                                                    <option>New Mexico</option>
                                                    <option>New York</option>
                                                    <option>North Carolina</option>
                                                    <option>North Dakota</option>
                                                    <option>Ohio</option>
                                                    <option>Oklahoma</option>
                                                    <option>Oregon</option>
                                                    <option>Pennsylvania[E]</option>
                                                    <option>Rhode Island[F]</option>
                                                    <option>South Carolina</option>
                                                    <option>South Dakota</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Utah</option>
                                                    <option>Vermont</option>
                                                    <option>Virginia[G]</option>
                                                    <option>Washington</option>
                                                    <option>West Virginia</option>
                                                    <option>Wisconsin</option>
                                                    <option>Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Europe">
                                                    <option>Albania</option>
                                                    <option>Andorra</option>
                                                    <option>Armenia</option>
                                                    <option>Austria</option>
                                                    <option>Azerbaijan</option>
                                                    <option>Belarus</option>
                                                    <option>Belgium</option>
                                                    <option>Bosnia & Herzegovina</option>
                                                    <option>Bulgaria</option>
                                                    <option>Croatia</option>
                                                    <option>Cyprus</option>
                                                    <option>Czech Republic</option>
                                                    <option>Denmark</option>
                                                    <option>Estonia</option>
                                                    <option>Finland</option>
                                                    <option>France</option>
                                                    <option>Georgia</option>
                                                    <option>Germany</option>
                                                    <option>Greece</option>
                                                    <option>Hungary</option>
                                                    <option>Iceland</option>
                                                    <option>Ireland</option>
                                                    <option>Italy</option>
                                                    <option>Kosovo</option>
                                                    <option>Latvia</option>
                                                    <option>Liechtenstein</option>
                                                    <option>Lithuania</option>
                                                    <option>Luxembourg</option>
                                                    <option>Macedonia</option>
                                                    <option>Malta</option>
                                                    <option>Moldova</option>
                                                    <option>Monaco</option>
                                                    <option>Montenegro</option>
                                                    <option>The Netherlands</option>
                                                    <option>Norway</option>
                                                    <option>Poland</option>
                                                    <option>Portugal</option>
                                                    <option>Romania</option>
                                                    <option>Russia</option>
                                                    <option>San Marino</option>
                                                    <option>Serbia</option>
                                                    <option>Slovakia</option>
                                                    <option>Slovenia</option>
                                                    <option>Spain</option>
                                                    <option>Sweden</option>
                                                    <option>Switzerland</option>
                                                    <option>Turkey</option>
                                                    <option>Ukraine</option>
                                                    <option>United Kingdom</option>
                                                    <option>Vatican City (Holy See)</option>
                                                </optgroup>
                                                <optgroup label="Asia">
                                                    <option>Afghanistan</option>
                                                    <option>Bahrain</option>
                                                    <option>Bangladesh</option>
                                                    <option>Bhutan</option>
                                                    <option>Brunei</option>
                                                    <option>Cambodia</option>
                                                    <option>China</option>
                                                    <option>East Timor</option>
                                                    <option>India</option>
                                                    <option>Indonesia</option>
                                                    <option>Iran</option>
                                                    <option>Iraq</option>
                                                    <option>Israel</option>
                                                    <option>Japan</option>
                                                    <option>Jordan</option>
                                                    <option>Kazakhstan</option>
                                                    <option>Korea North</option>
                                                    <option>Korea South</option>
                                                    <option>Kuwait</option>
                                                    <option>Kyrgyzstan</option>
                                                    <option>Laos</option>
                                                    <option>Lebanon</option>
                                                    <option>Malaysia</option>
                                                    <option>Maldives</option>
                                                    <option>Mongolia</option>
                                                    <option>Myanmar (Burma)</option>
                                                    <option>Nepal</option>
                                                    <option>Oman</option>
                                                    <option>Pakistan</option>
                                                    <option>The Philippines</option>
                                                    <option>Qatar</option>
                                                    <option>Russia</option>
                                                    <option>Saudi Arabia</option>
                                                    <option>Singapore</option>
                                                    <option>Sri Lanka</option>
                                                    <option>Syria</option>
                                                    <option>Taiwan</option>
                                                    <option>Tajikistan</option>
                                                    <option>Thailand</option>
                                                    <option>Turkey</option>
                                                    <option>Turkmenistan</option>
                                                    <option>United Arab Emirates</option>
                                                    <option>Uzbekistan</option>
                                                    <option>Vietnam</option>
                                                    <option>Yemen</option>
                                                </optgroup>
                                            </select>


                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Multiple select</label>


                                            <select class="" id="s2example-2" multiple>
                                                <option></option>
                                                <optgroup label="United States">
                                                    <option>Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>Arizona</option>
                                                    <option>Arkansas</option>
                                                    <option selected>California</option>
                                                    <option>Colorado</option>
                                                    <option>Connecticut</option>
                                                    <option>Delaware</option>
                                                    <option selected>Florida</option>
                                                    <option>Georgia</option>
                                                    <option>Hawaii</option>
                                                    <option>Idaho</option>
                                                    <option>Illinois</option>
                                                    <option>Indiana</option>
                                                    <option>Iowa</option>
                                                    <option>Kansas</option>
                                                    <option>Kentucky[C]</option>
                                                    <option>Louisiana</option>
                                                    <option>Maine</option>
                                                    <option>Maryland</option>
                                                    <option>Massachusetts[D]</option>
                                                    <option>Michigan</option>
                                                    <option>Minnesota</option>
                                                    <option>Mississippi</option>
                                                    <option>Missouri</option>
                                                    <option>Montana</option>
                                                    <option>Nebraska</option>
                                                    <option>Nevada</option>
                                                    <option>New Hampshire</option>
                                                    <option>New Jersey</option>
                                                    <option>New Mexico</option>
                                                    <option>New York</option>
                                                    <option>North Carolina</option>
                                                    <option>North Dakota</option>
                                                    <option>Ohio</option>
                                                    <option>Oklahoma</option>
                                                    <option>Oregon</option>
                                                    <option>Pennsylvania[E]</option>
                                                    <option>Rhode Island[F]</option>
                                                    <option>South Carolina</option>
                                                    <option>South Dakota</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Utah</option>
                                                    <option>Vermont</option>
                                                    <option>Virginia[G]</option>
                                                    <option selected>Washington</option>
                                                    <option>West Virginia</option>
                                                    <option>Wisconsin</option>
                                                    <option>Wyoming</option>
                                                </optgroup>
                                            </select>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label">Remote Data</label> 
                                            <input type="hidden" name="s2example-4" id="s2example-4" />

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Typeahead / Auto Complete / Suggestion</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label">Basics</label> 
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-globe"></i>     
                                                </span>
                                                <input type="text" class="form-control" placeholder="Type for Suggestions" id="typeahead-1">
                                            </div>   
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Prefetch Example</label> 
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-globe"></i>     
                                                </span>
                                                <input type="text" class="form-control" placeholder="Type for Suggestions" id="typeahead-2">
                                            </div>   
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Remote data Example</label> 
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-globe"></i>     
                                                </span>
                                                <input type="text" class="form-control" placeholder="Type for Suggestions" id="typeahead-3">
                                            </div>   
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Templating Example</label> 
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-globe"></i>     
                                                </span>
                                                <input type="text" class="form-control" placeholder="My Favorite Oscar Movie" id="typeahead-4">
                                            </div>   
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Multi Select</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">




                                    <div class="col-md-6">
                                        <h4>Basic</h4>
                                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option selected>Philadelphia Eagles</option>
                                            <option selected>Washington Redskins</option>
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                            <option selected>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <h4>Grouped Options and Labels</h4>
                                        <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                            <optgroup label="NFC EAST">
                                                <option>Dallas Cowboys</option>
                                                <option>New York Giants</option>
                                                <option>Philadelphia Eagles</option>
                                                <option>Washington Redskins</option>
                                            </optgroup>
                                            <optgroup label="NFC NORTH">
                                                <option>Chicago Bears</option>
                                                <option>Detroit Lions</option>
                                                <option>Green Bay Packers</option>
                                                <option>Minnesota Vikings</option>
                                            </optgroup>
                                            <optgroup label="NFC SOUTH">
                                                <option>Atlanta Falcons</option>
                                                <option>Carolina Panthers</option>
                                                <option>New Orleans Saints</option>
                                                <option>Tampa Bay Buccaneers</option>
                                            </optgroup>
                                            <optgroup label="NFC WEST">
                                                <option>Arizona Cardinals</option>
                                                <option>St. Louis Rams</option>
                                                <option>San Francisco 49ers</option>
                                                <option>Seattle Seahawks</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <br><div class="clearfix"></div><br>

                                    <div class="col-md-6">
                                        <h4>Searchable Options</h4>
                                        <select name="country" class="multi-select" multiple="" id="my_multi_select3" >
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegowina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote d"Ivoire</option>
                                            <option value="HR">Croatia (Hrvatska)</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard and Mc Donald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran (Islamic Republic of)</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People"s Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People"s Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau</option>
                                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint LUCIA</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia (Slovak Republic)</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SH">St. Helena</option>
                                            <option value="PM">St. Pierre and Miquelon</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands (British)</option>
                                            <option value="VI">Virgin Islands (U.S.)</option>
                                            <option value="WF">Wallis and Futuna Islands</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
';
?>