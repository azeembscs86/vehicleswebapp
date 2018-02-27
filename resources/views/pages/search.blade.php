@include('include.head')
<div class="search-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Select Vehicle</h1>
                <p>Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
<section class="search-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 search-filter">
                <h3>Search Filter</h3>
                <div class="bg-red search-line"></div>
                <table class="table select-box-one">
                    <tbody>
                        <tr>
                            <th class="padding-bottom">From</th>
                            <td class="padding-bottom">{{$pic_city->city_name}}</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th class="padding-top">To</th>
                            <td class="padding-top">{{$drop_city->city_name}}</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                        </tr>

                        <tr>
                            <th class="padding-bottom">From</th>
                            <td class="padding-bottom"><?php if(isset($pic_date)!=''){ echo $pic_date;}else{ echo $pic_date=' ';}?>  </td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th class="padding-top">Until</th>
                            <td class="padding-top"><?php if(isset($drop_date)!=''){ echo $drop_date;}else{ echo $pic_date=' ';}?></td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th class="padding-top">Total Days</th>
                            <td class="padding-top"><?php if(isset($daysnumber)!=0){ echo $daysnumber;}else{ echo $daysnumber=0;}?></td>                      
                        </tr>
                    </tbody>
                </table>
                <div class="bg-red search-line"></div>
                <table class="select-box-two">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <h4>Rental Company</h4>
                            </td>
                        </tr>
                        @foreach($companies as $company)
                        <tr>
                            <th><label  value="{{$company->id}}" class="company color-white fa fa-circle" aria-hidden="true"></label></th>
                            <td>{{$company->company_name}}</td>
                        </tr>
                        @endforeach
               </tbody>
                </table>
                <div class="bg-red search-line"></div>
               <table class="select-box-three">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <h4 class="red-line">Vehicle Category / Type</h4>
                            </td>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <th><label  value="{{$category->id}}" class="categories color-white fa fa-circle" aria-hidden="true"></label>
                               </button></th>
                            <td>{{$category->category_name}}</td>
                        </tr>
                        @endforeach
                   </tbody>
                </table>
            </div>
            <div class="col-md-8 search-result" id="main_search">
               <h3>Search Vehicles</h3>
                <div class="bg-red search-line-3"></div>
<!-- <p>4 affordable Motorhomes from 1 rental company in Windhoek </p> -->
                @if(isset($vehicles))
                @foreach($vehicles as $vehicle)
                <div class="row margin-bottom">
                    <div class="col-md-6 search-result-car padding-right">
                        <?php
                        $imgs = explode(",", $vehicle->v_images);
                        for ($i = 0; $i < count($imgs); $i++):
                            if ($i == 1) {
                                break;
                            }
                            ?>
                            <img src="public/uploads/vehicles/<?php echo $imgs[$i]; ?>" class="img-responsive">

<?php endfor; ?>
                        <div class="bg-red">
                            <h4>{{$vehicle->v_name}}         <img class="company-logo" src="{{asset('public/'.$vehicle->company->img_path)}}"></h4>
                        </div>
                    </div>
                    <div class="col-md-6 search-result-car bg-black">
                        <div class="col-md-12">
                            <table class="table select-box-four">
                                <tr>
                                    <th>Suitable for</th>
                                    <td>{{$vehicle->v_person}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle age</th>
                                    <td>{{$vehicle->v_age}}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle type</th>
                                    <td>{{$vehicle->v_type}}</td>
                                </tr>
                                <tr>
                                    <th class="select-price">Price</th>
                                    <td class="currency">{{$vehicle->v_toll_fee + $vehicle->v_dep_fee}} <i class="fa fa-eur" aria-hidden="true"></i></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 search-button text-center">
                            <form name="selectVehicleForm" id="selectVehicleForm" method="POST" action="{{url('/faredetails')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle->id}}">
                                <input type="hidden" name="from_city" id="from_city" value="{{$pic_city->city_name}}">
                                <input type="hidden" name="drop_city" id="drop_city" value="{{$drop_city->city_name}}">
                                <input type="hidden" name="pic_date" id="pic_date" value="{{$pic_date}}">
                                <input type="hidden" name="drop_date" id="drop_date" value="{{$drop_date}}">
                                <input type="hidden" name="number_days" id="number_days" value="{{$daysnumber}}">
                                <input type="submit" name="submit" id="submit" class="btn btn-lg" value="Select Vehicle">
                            </form>
                            <!-- <a class="btn btn-lg" href="{{url('/faredetails')}}/{{$vehicle->id}}">Select Vehicle</a> -->

                        </div>

                    </div>

                </div>

                @endforeach

                @else

                <div>Sorry there no found search result</div>

                @endif

            </div>

            <div class="col-md-8 search-result" id="company_search">



            </div>



            <div class="col-md-8 search-result" id="categories_search">



            </div>





        </div>

    </div>

</section>

@include('include.footer')

<script type="text/javascript">

    $(document).on('click', ".company", function (event) {
        $("#categories_search").empty();
        $("#company_search").empty();
        $("#main_search").hide();
        var company_id = $(this).attr("value");
        var _token = $("input[name*='_token']").val();
        var from_city = $('#from_city').val();
        var drop_city = $('#drop_city').val();
        var pic_date = $('#pic_date').val();
        var drop_date = $('#drop_date').val();
        var number_days = $('#number_days').val();
        $(".company").removeClass("active");
        $(this).addClass("active");
        if (company_id) {
            $.ajax({
                type: "POST",
                url: "get-vehicles-companies",
                data: {company_id: company_id, _token: _token,from_city:from_city,drop_city:drop_city,pic_date:pic_date,drop_date:drop_date,number_days:number_days},
                success: function (res) {
                    $("#company_search").html(res);
                    $("#main_search").hide();
                }
            });
        } else {
            $("#main_search").show();
            $("#categories_search").hide();
            $("#company_search").hide();
        }
    });

</script>

<script type="text/javascript">
    $(document).on('click', ".categories", function (event) {
        $(".categories").removeClass("active");
        $(this).addClass("active");
        $("#categories_search").empty();
        $("#company_search").empty();
        $("#main_search").hide();
        var category_id = $(this).attr("value");
        var _token = $("input[name*='_token']").val();
        var from_city = $('#from_city').val();
        var drop_city = $('#drop_city').val();
        var pic_date = $('#pic_date').val();
        var drop_date = $('#drop_date').val();
        var number_days = $('#number_days').val();
        if (category_id) {
            $.ajax({
                type: "POST",
                url: "get-vehicles-categories",
                data: {category_id: category_id, _token: _token,from_city:from_city,drop_city:drop_city,pic_date:pic_date,drop_date:drop_date,number_days:number_days},
                success: function (res1) {
                    $("#categories_search").html(res1);
                    $("#main_search").hide();
                }
            });
        } else {
            $("#main_search").show();
            $("#categories_search").hide();
            $("#company_search").hide();
        }
    });

</script>