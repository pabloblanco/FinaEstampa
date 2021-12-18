<?php
echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Vector Maps</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Vector Map</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <figure>
                                            <div id="world-map-markers" style="width: 100%; height: 400px"></div>    	
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </section></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Countries and Cities</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">




                                        <div class="tabs-vertical-env">
                                            <ul class="nav nav-tabs vertical col-lg-3 col-md-3 col-sm-3 col-xs-3 left-aligned " style="max-height:550px;overflow:auto;">

                                                <li class="active"><a href="#v-europe_mill_en" data-toggle="tab" aria-expanded="true">Europe</a></li>
                                                <li class=""><a href="#v-in_mill_en" data-toggle="tab" aria-expanded="false">India</a></li>
                                                <li class=""><a href="#v-us_aea_en" data-toggle="tab" aria-expanded="false">USA</a></li>
                                                <li class=""><a href="#v-pt_mill_en" data-toggle="tab" aria-expanded="false">Portugal</a></li>
                                                <li class=""><a href="#v-cn_mill_en" data-toggle="tab" aria-expanded="false">China</a></li>
                                                <li class=""><a href="#v-nz_mill_en" data-toggle="tab" aria-expanded="false">New Zealand</a></li>
                                                <li class=""><a href="#v-no_mill_en" data-toggle="tab" aria-expanded="false">Norway</a></li>
                                                <li class=""><a href="#v-es_mill_en" data-toggle="tab" aria-expanded="false">Spain</a></li>
                                                <li class=""><a href="#v-au_mill_en" data-toggle="tab" aria-expanded="false">Australia</a></li>
                                                <li class=""><a href="#v-fr_regions_mill_en" data-toggle="tab" aria-expanded="false">France - Regions</a></li>
                                                <li class=""><a href="#v-th_mill_en" data-toggle="tab" aria-expanded="false">Thailand</a></li>
                                                <li class=""><a href="#v-co_mill_en" data-toggle="tab" aria-expanded="false">Colombia</a></li>
                                                <li class=""><a href="#v-be_mill_en" data-toggle="tab" aria-expanded="false">Belgium</a></li>
                                                <li class=""><a href="#v-ar_mill_en" data-toggle="tab" aria-expanded="false">Argentina</a></li>
                                                <li class=""><a href="#v-ve_mill_en" data-toggle="tab" aria-expanded="false">Venezuela</a></li>
                                                <li class=""><a href="#v-it_mill_en" data-toggle="tab" aria-expanded="false">Italy</a></li>
                                                <li class=""><a href="#v-dk_mill_en" data-toggle="tab" aria-expanded="false">Denmark</a></li>
                                                <li class=""><a href="#v-at_mill_en" data-toggle="tab" aria-expanded="false">Austria</a></li>
                                                <li class=""><a href="#v-ca_lcc_en" data-toggle="tab" aria-expanded="false">Canada</a></li>
                                                <li class=""><a href="#v-nl_mill_en" data-toggle="tab" aria-expanded="false">Netherlands</a></li>
                                                <li class=""><a href="#v-se_mill_en" data-toggle="tab" aria-expanded="false">Sweden</a></li>
                                                <li class=""><a href="#v-pl_mill_en" data-toggle="tab" aria-expanded="false">Poland</a></li>
                                                <li class=""><a href="#v-de_mill_en" data-toggle="tab" aria-expanded="false">Germany</a></li>
                                                <li class=""><a href="#v-fr_mill_en" data-toggle="tab" aria-expanded="false">France - Departments</a></li>
                                                <li class=""><a href="#v-za_mill_en" data-toggle="tab" aria-expanded="false">South Africa</a></li>
                                                <li class=""><a href="#v-ch_mill_en" data-toggle="tab" aria-expanded="false">Switzerland</a></li>
                                                <li class=""><a href="#v-us-ny-newyork_mill_en" data-toggle="tab" aria-expanded="false">New York City</a></li>
                                                <li class=""><a href="#v-us-il-chicago_mill_en" data-toggle="tab" aria-expanded="false">Chicago</a></li>

                                            </ul>
                                            <div class="tab-content vertical col-lg-9 col-md-9 col-sm-9 col-xs-9 left-aligned">
                                                <div class="tab-pane fade in active" id="v-europe_mill_en"><figure><div id="europe_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-in_mill_en"><figure><div id="in_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-us_aea_en"><figure><div id="us_aea_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-pt_mill_en"><figure><div id="pt_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-cn_mill_en"><figure><div id="cn_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-nz_mill_en"><figure><div id="nz_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-no_mill_en"><figure><div id="no_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-es_mill_en"><figure><div id="es_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-au_mill_en"><figure><div id="au_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-fr_regions_mill_en"><figure><div id="fr_regions_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-th_mill_en"><figure><div id="th_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-co_mill_en"><figure><div id="co_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-be_mill_en"><figure><div id="be_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-ar_mill_en"><figure><div id="ar_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-ve_mill_en"><figure><div id="ve_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-it_mill_en"><figure><div id="it_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-dk_mill_en"><figure><div id="dk_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-at_mill_en"><figure><div id="at_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-ca_lcc_en"><figure><div id="ca_lcc_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-nl_mill_en"><figure><div id="nl_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-se_mill_en"><figure><div id="se_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-pl_mill_en"><figure><div id="pl_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-de_mill_en"><figure><div id="de_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-fr_mill_en"><figure><div id="fr_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-za_mill_en"><figure><div id="za_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-ch_mill_en"><figure><div id="ch_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-us-ny-newyork_mill_en"><figure><div id="us-ny-newyork_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                                <div class="tab-pane fade " id="v-us-il-chicago_mill_en"><figure><div id="us-il-chicago_mill_en-map" style="width: 100%; height:500px;"></div></figure></div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
';
?>