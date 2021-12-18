<?php
echo '
                <div  style="display:none;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Flot Charts</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>



                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Stacking</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-stack" class="flot-demo-placeholder"></div>
                                        </div>
                                        <p class="stackControls">
                                            <button class="btn btn-success">With stacking</button>
                                            <button class="btn btn-default">Without stacking</button>
                                        </p>
                                        <p class="graphControls">
                                            <button class="btn btn-success">Bars</button>
                                            <button class="btn btn-default">Lines</button>
                                            <button class="btn btn-default">Lines with steps</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Area Chart</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div id="demoarea-chart">
                                            <div id="demoarea-container" style="width: 100%;height:300px; text-align: center; margin:0 auto;">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>



                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All Types</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-types" class="flot-demo-placeholder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Navigate</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-navigate" class="flot-demo-placeholder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>




                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Toggle</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="col-md-10 col-sm-8 col-xs-12">
                                            <div class="flot-demo-container">
                                                <div id="flot-toggle" class="flot-demo-placeholder" style="float:left; width:100%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-12">
                                            <p id="choices" style="float:right; width:135px;"></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Real Time</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="flot-demo-container">
                                            <div id="flot-realtime" class="flot-demo-placeholder"></div>
                                        </div>
                                        <br>
                                        <p>You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
                                        <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:3em;padding:2px 5px;"> milliseconds</p>

                                    </div>
                                </div>
                            </div>
                        </section></div>



                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Pie</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="flot-demo-container">
                                                <div id="flotpie" class="flot-demo-placeholder"></div>
                                            </div>
                                        </div>	
                                        <div class=" col-md-4 col-sm-4 col-xs-4">
                                            <div id="flotpiemenu">
                                                <button class="btn btn-success" id="pieexample-1">Default Options</button>
                                                <button class="btn btn-default" id="pieexample-2">Without Legend</button>
                                                <button class="btn btn-default" id="pieexample-3">Label Formatter</button>
                                                <button class="btn btn-default" id="pieexample-4">Label Radius</button>
                                                <button class="btn btn-default" id="pieexample-5">Label Styles #1</button>
                                                <button class="btn btn-default" id="pieexample-6">Label Styles #2</button>
                                                <button class="btn btn-default" id="pieexample-7">Hidden Labels</button>
                                                <button class="btn btn-default" id="pieexample-8">Combined Slice</button>
                                                <button class="btn btn-default" id="pieexample-9">Rectangular Pie</button>
                                                <button class="btn btn-default" id="pieexample-10">Tilted Pie</button>
                                                <button class="btn btn-default" id="pieexample-11">Donut Hole</button>
                                                <button class="btn btn-default" id="pieexample-12">Interactivity</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Percentile</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-percentile" class="flot-demo-placeholder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>




                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Tracking</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-track" class="flot-demo-placeholder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Zooming</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="col-md-9 col-sm-8 col-xs-12">
                                            <div class="flot-demo-container">
                                                <div id="flot-zoom" class="flot-demo-placeholder" style="float:left; width:100%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div id="flot-zoom-overview" class="flot-demo-placeholder" style="float:right;width:160px; height:125px;"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Visitors</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="flot-demo-container">
                                            <div id="flot-visitors" class="flot-demo-placeholder"></div>
                                        </div>

                                        <div class="flot-demo-container" style="height:150px;">
                                            <div id="flot-visit-overview" class="flot-demo-placeholder"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>







                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Combined Chart</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div id="democombine" class="legend-block">
                                        </div>
                                        <div id="flotcombine" style="width: 100%;height:300px; text-align: center; margin:0 auto;">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>                    
';
?>