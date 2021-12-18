<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Input Masks</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Basic Profile Fields</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Email</label>
                                            <span class="desc">e.g. "first.last@ex.com"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" data-mask="email" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-2">Phone</label>
                                            <span class="desc">e.g. "(534) 253-5353"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-2" data-mask="phone" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Currency (€)</label>
                                            <span class="desc">e.g. "€ 343,433.13"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-3" data-mask="currency" data-sign="€" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-4">Currency ($)</label>
                                            <span class="desc">e.g. "$ 343,433.13"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-4" data-mask="rcurrency" data-sign="$" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Date Time</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="field-5">Date (Default)</label>
                                            <span class="desc">e.g. "04/03/2015"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-5" data-mask="date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11">Date (Formatted)</label>
                                            <span class="desc">e.g. "04-03-2015"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-11" data-mask="d-m-y">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Date Time</label>
                                            <span class="desc">e.g. "31/12/2015 12:12"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-6" data-mask="datetime">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-7">Date Time (AM/PM)</label>
                                            <span class="desc">e.g. "31/12/2015 12:12 PM"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-7" data-mask="datetime12">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">More Common Fields</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label">ISBN 1</label>
                                            <span class="desc">e.g. "999-99-999-9999-9"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="999-99-999-9999-9" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ISBN 2</label>
                                            <span class="desc">e.g. "999 99 999 9999 9"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="999 99 999 9999 9" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ISBN 3</label>
                                            <span class="desc">e.g. "999/99/999/9999/9"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="999/99/999/9999/9" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">IPV4</label>
                                            <span class="desc">e.g. "192.168.110.310"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="999.999.999.9999" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">IPV6</label>
                                            <span class="desc">e.g. "4deg:1340:6547:2:540:h8je:ve73:98pd"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="9999:9999:9999:9:999:9999:9999:9999" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tax ID</label>
                                            <span class="desc">e.g. "99-9999999"</span>
                                            <div class="controls">
                                                <input type="text" placeholder="" data-mask="99-9999999" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </section></div>



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Numeric</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="form-group">
                                            <label class="form-label" for="field-8">Numbers Only</label>
                                            <span class="desc">e.g. "1234"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-8" data-mask="99999999" placeholder="Numbers">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-9">Numbers Only (Right Align)</label>
                                            <span class="desc">e.g. "1234"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-9" data-mask="99999999" placeholder="Numbers (Right Aligned)" data-numeric="true" data-numeric-align="right" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-10">Formatted Decimal</label>
                                            <span class="desc">e.g. "543,532.34"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-10" data-mask="fdecimal" placeholder="Formatted Decimal" data-dec="," data-rad="." maxlength="10" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">AutoNumeric completion</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group"><label class="form-label" for="field-12">Default</label>
                                            <span class="desc">e.g. "2.342.242,00"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-12" data-a-sep="." data-a-dec=","></div></div>

                                        <div class="form-group"><label class="form-label" for="field-13">Auto Numeric ($)</label>
                                            <span class="desc">e.g. "$ 4,532,532.00"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-13" data-a-sign="$ "></div></div>

                                        <div class="form-group"><label class="form-label" for="field-14">Auto Numeric (€)</label>
                                            <span class="desc">e.g. "$ 4,532,532.00"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-14" data-a-sign="€ "  data-a-sep="." data-a-dec=","></div></div>

                                        <div class="form-group"><label class="form-label" for="field-15">Maximum Value (0 - 9999)</label>
                                            <span class="desc">e.g. "4,553"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-15"  data-v-max="9999" data-v-min="0"></div></div>

                                        <div class="form-group"><label class="form-label" for="field-16">Range Value (-99.99 - 1000.00)</label>
                                            <span class="desc">e.g. "111"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-16" data-a-sep="." data-a-dec="," data-v-min="-99.99" data-v-max="1000.00"></div></div>

                                        <div class="form-group"><label class="form-label" for="field-17">Bracket Value</label>
                                            <span class="desc">e.g. "(4.354,00)"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-17" data-a-sep="." data-a-dec="," data-v-min="-9999.99" data-v-max="0.00" data-n-bracket="(,)"></div></div>

                                        <div class="form-group"><label class="form-label" for="field-18">4 digit Group (¥)</label>
                                            <span class="desc">e.g. "¥ 4,5325,3532.00"</span><div class="controls"> 
                                                <input type="text" class="autoNumeric form-control" id="field-18" data-d-group="4" data-a-sign="¥ "></div></div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
';
?>