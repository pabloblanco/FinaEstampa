<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Rickshaw Charts</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Extensions</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-3 col-sm-3 col-lg-3">


                                        <form id="rickshaw_side_panel">
                                            <section><div id="legend"></div></section>
                                            <section>
                                                <div id="renderer_form" class="toggler">
                                                    <input type="radio" name="renderer" id="area" value="area" checked>
                                                    <label for="area">area</label>
                                                    <input type="radio" name="renderer" id="bar" value="bar">
                                                    <label for="bar">bar</label>
                                                    <input type="radio" name="renderer" id="line" value="line">
                                                    <label for="line">line</label>
                                                    <input type="radio" name="renderer" id="scatter" value="scatterplot">
                                                    <label for="scatter">scatter</label>
                                                </div>
                                            </section>
                                            <section>
                                                <div id="offset_form">
                                                    <label for="stack">
                                                        <input type="radio" name="offset" id="stack" value="zero" checked>
                                                        <span>stack</span>
                                                    </label>
                                                    <label for="stream">
                                                        <input type="radio" name="offset" id="stream" value="wiggle">
                                                        <span>stream</span>
                                                    </label>
                                                    <label for="pct">
                                                        <input type="radio" name="offset" id="pct" value="expand">
                                                        <span>pct</span>
                                                    </label>
                                                    <label for="value">
                                                        <input type="radio" name="offset" id="value" value="value">
                                                        <span>value</span>
                                                    </label>
                                                </div>
                                                <div id="interpolation_form">
                                                    <label for="cardinal">
                                                        <input type="radio" name="interpolation" id="cardinal" value="cardinal" checked>
                                                        <span>cardinal</span>
                                                    </label>
                                                    <label for="linear">
                                                        <input type="radio" name="interpolation" id="linear" value="linear">
                                                        <span>linear</span>
                                                    </label>
                                                    <label for="step">
                                                        <input type="radio" name="interpolation" id="step" value="step-after">
                                                        <span>step</span>
                                                    </label>
                                                </div>
                                            </section>
                                            <section>
                                                <h4>Smoothing</h4>
                                                <div id="smoother"></div>
                                            </section>
                                            <br>
                                            <section>
                                                <h4>Preview Range</h4>
                                                <div id="preview" class="rickshaw_ext_preview"></div>
                                            </section>

                                        </form>


                                    </div>

                                    <div class="col-md-9 col-sm-9 col-lg-9">
                                        <div id="chart_container" class="rickshaw_ext">
                                            <div id="chart"></div>
                                            <div id="timeline"></div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Series</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-3 col-sm-3 col-lg-3">

                                        <div id="rickshaw_side_panel">

                                            <section><div id="serlegend"></div></section>

                                            <section>
                                                <form id="seroffset_form">
                                                    <label for="stack">
                                                        <input type="radio" name="seroffset" id="stack" value="zero" checked>
                                                        <span>stack</span>
                                                    </label>

                                                    <label for="lines">
                                                        <input type="radio" name="seroffset" id="lines" value="lines">
                                                        <span>lines</span>
                                                    </label>
                                                </form>
                                            </section>
                                            <section>
                                                <h4>Smoothing</h4>
                                                <div id="sersmoother"></div>
                                            </section>
                                            <section></section>
                                            <br>
                                            <section>
                                                <h4>Preview Range</h4>
                                                <div id="serslider" class="rickshaw_ser_preview"></div>
                                            </section>

                                        </div>
                                    </div>

                                    <div class="col-md-9 col-sm-9 col-lg-9 serchart_container">
                                        <div id="chart_container">
                                            <div id="serchart"></div>
                                            <div id="sertimeline"></div>
                                        </div>				
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
';
?>