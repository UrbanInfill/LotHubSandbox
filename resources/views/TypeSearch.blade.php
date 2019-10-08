@extends('master')
@section('title','Historically Platted Lots')
@section('content')
    <div class="pt-3">
        <div class="row">
            <div class="col" style="justify-content: center">
                <label class="form-text text-muted center" for="searchByPropForm">Enter the Zip-Code Below to Find Historically Platted Lots</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <div class="input-group  mb-3 search search-reduce" id="searchByPropForm">
                        <input class="form-control" id="search" name="address" type="text" placeholder="By Property"  onFocus="geolocate()" required="true" value="" aria-describedby="searchByProperty"/>
                        <div class="input-group-append">
                            <select class="parameter " name="propertytype" id="typeSelect">
                                <option selected="" value=""></option>
                                <option value="AGRICULTURAL (NEC)"> AGRICULTURAL (NEC)  </option>
                                <option value="APARTMENT"> APARTMENT  </option>
                                <option value="CABIN"> CABIN  </option>
                                <option value="CLUB"> CLUB  </option>
                                <option value="COMMERCIAL (NEC)"> COMMERCIAL (NEC)  </option>
                                <option value="COMMERCIAL BUILDING"> COMMERCIAL BUILDING  </option>
                                <option value="COMMERCIAL CONDOMINIUM"> COMMERCIAL CONDOMINIUM  </option>
                                <option value="COMMON AREA"> COMMON AREA  </option>
                                <option value="CONDOMINIUM"> CONDOMINIUM  </option>
                                <option value="CONVERTED RESIDENCE"> CONVERTED RESIDENCE  </option>
                                <option value="COUNTY PROPERTY"> COUNTY PROPERTY  </option>
                                <option value="DUPLEX"> DUPLEX  </option>
                                <option value="FARMS"> FARMS  </option>
                                <option value="FAST FOOD FRANCHISE"> FAST FOOD FRANCHISE  </option>
                                <option value="FEDERAL PROPERTY"> FEDERAL PROPERTY  </option>
                                <option value="FOREST"> FOREST  </option>
                                <option value="GROUP QUARTERS"> GROUP QUARTERS  </option>
                                <option value="INDUSTRIAL (NEC)"> INDUSTRIAL (NEC)  </option>
                                <option value="INDUSTRIAL PLANT"> INDUSTRIAL PLANT  </option>
                                <option value="MANUFACTURED HOME"> MANUFACTURED HOME  </option>
                                <option value="MARINA FACILITY"> MARINA FACILITY  </option>
                                <option value="MISCELLANEOUS"> MISCELLANEOUS  </option>
                                <option value="MOBILE HOME"> MOBILE HOME  </option>
                                <option value="MOBILE HOME LOT"> MOBILE HOME LOT  </option>
                                <option value="MOBILE HOME PARK"> MOBILE HOME PARK  </option>
                                <option value="MULTI FAMILY DWELLING"> MULTI FAMILY DWELLING  </option>
                                <option value="NURSERY/HORTICULTURE"> NURSERY/HORTICULTURE  </option>
                                <option value="OFFICE BUILDING"> OFFICE BUILDING  </option>
                                <option value="PUBLIC (NEC)"> PUBLIC (NEC)  </option>
                                <option value="RELIGIOUS"> RELIGIOUS  </option>
                                <option value="RESIDENTIAL (NEC)"> RESIDENTIAL (NEC)  </option>
                                <option value="RESIDENTIAL ACREAGE"> RESIDENTIAL ACREAGE  </option>
                                <option value="RESIDENTIAL LOT"> RESIDENTIAL LOT  </option>
                                <option value="RETAIL TRADE"> RETAIL TRADE  </option>
                                <option value="SFR"> SFR  </option>
                                <option value="STATE PROPERTY"> STATE PROPERTY  </option>
                                <option value="STORES &amp; OFFICES"> STORES &amp; OFFICES  </option>
                                <option value="STORES &amp; RESIDENTIAL"> STORES &amp; RESIDENTIAL  </option>
                                <option value="TAX EXEMPT"> TAX EXEMPT  </option>
                                <option value="TOWNHOUSE/ROWHOUSE"> TOWNHOUSE/ROWHOUSE  </option>
                                <option value="TRIPLEX"> TRIPLEX  </option>
                                <option value="UTILITIES"> UTILITIES  </option>
                                <option value="VACANT LAND (NEC)"> VACANT LAND (NEC)  </option>
                            </select>
                            <input class="btn btn-primary" type="button" value="Search" id="searchByTypeProperty">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="searchloading">
        <div
            class="label-center"
            id="ldBar"
            style="width:30%;height:30%;margin:auto"
            data-value="0"
            data-preset="bubble">
        </div>
    </div>
    <div id="issearchdone">
    <div class="row">
        <div class="col-md-6">


            <div class="map" id="map"></div>



            <div class="row">
                <div class="col-md-6 pd-col brd" id="houseDiv">
                    <h2 class="ageDemo mt-30">Housing Inventory</h2>
                    <div class="chart_bar" style="position: relative; margin:0 auto;width:80%; height:150px;" >
                        <div id="chart-1" ></div>
                    </div>
                </div>

                <div class="col-md-6 brd" id="eduDiv">

                    <img src="Img/icon-stat.png" alt="">
                    <h2 class="ageDemo mt-30">Highest education<br>level attained</h2>
                    <h3>Info</h3>
                    <p>The highest education level attained is based on the percentage of eligible graduates within the given population who have achieved the level of education listed.</p>
                    <div class="gap20"></div>

                    <div class="list-row">
                        <span class="list-title">No HS</span>
                        <span class="list-price" id="noHS">  </span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">Some HS</span>
                        <span class="list-price" id="someHS"></span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">HS Grad</span>
                        <span class="list-price" id="hsGrad"></span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">Some College</span>
                        <span class="list-price" id="someCollege"></span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">Associate Degree</span>
                        <span class="list-price" id="associate"></span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">Bachelor's Degreee</span>
                        <span class="list-price" id="bachlor"></span>
                    </div>
                    <div class="list-row">
                        <span class="list-title">Graduate Degreee</span>
                        <span class="list-price" id="graduate"></span>
                    </div>


                </div>
            </div>
            <div class="col-md-12 brd" id="incomeDiv">
                <h2 class="ageDemo mt-30">Income by Households</h2>
                <div class="chart_bar" style="position: relative;height:150px;" >
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>


        <div class="col-md-6 mt-30" id="poiContent">
            <div class="alert alert-dark" role="alert" id="searchCount">
                Count :
            </div>
            <div class="input-group mb-3"  style="padding-right: 10px;">
                <input type="email" id="emailaddress" class=" form-control" placeholder="Enter Email Address" aria-label="Enter Email Address aria-describedby="sendEmail">
                <div class="input-group-append">
                    <button type="button" id="sendEmail" class="btn btn-secondary mb-1"><i class="far fa-envelope"></i></button>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted"></small>

            <div class="row">
                <div class="col">
                    <div class="next-slide " id="next-slide"> <button type="button" class="btn btn-outline-dark" style="width: 100%;"><i class="fa fa-arrow-circle-up" aria-hidden="true" style="font-size: 20px;"></i></button></div>
                </div>
                <div class="col">
                    <div class="prev-slide " id="prev-slide"> <button type="button" class="btn btn-outline-dark" style="width: 100%;"><i class="fa fa-arrow-circle-down" aria-hidden="true" style="font-size: 20px;"></i></button></div>
                </div>
            </div>

            <br>

            <div class="swiper-container">


                <div class="swiper-wrapper">



                    <!-- Add Arrows -->
                    <!-- Add Pagination -->

                </div>
                <!--<div class="swiper-button-next"><img src="images/icons/right.png" alt="right"></div>
                <div class="swiper-button-prev"><img src="images/icons/left.png" alt="left"></div>-->
                <div class="swiper-scrollbar"></div>




            </div>
        </div>
    </div>
    </div>
    <div class="modal fade bd-example-modal-xl" id="myModal"  role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Property info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <img id="ModalImg" width="100%" height="400" src="" alt="">
                            </div>
                            <div class="col-6">
                                <div class=" map" id="Modalmap" style="width: 100%;height: 100%">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="SaveLink" class="btn btn-primary">Save Property</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/xy.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <script type='text/javascript' src="js/donut-chart.js"></script>
    <script>

        /*
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 10,
            direction: 'vertical',
            slideToClickedSlide: true,
            preventClicks:true,
            on:{
                click: function(swiper, e){
                    // var clicked = $(e.target);
                    //openInfoModal(this.clickedIndex+1);
                    //console.log(clicked);
                },slideChangeTransitionEnd: function (swiper) {
                    focusonmarker(this.activeIndex);

                }
            },
            navigation: {
                nextEl: '.prev-slide',
                prevEl: '.next-slide',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },mousewheel: {
                invert: false,
            },
        });

        */
        $('.nav-link').removeClass("active");
        $("#menu1").addClass("active");
        $("input[type='checkbox']").click(function ()  {
            if($('input:checkbox:checked').length > 10)
            {
                alert("Email send limit is 10");
                $(this).attr('checked',false)
            }
        });
    </script>

    <style>
        #chartincomediv {
            width: 100%;
            height: 300px;
        }
        #chart-1 {
            width		: 100%;
            height		: 150px;
            font-size	: 12px;
        }
        #chart-1 a {
            display: none !important;
        }

    </style>
@endsection
