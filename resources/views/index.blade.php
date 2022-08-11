<!-- <!DOCTYPE html>
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <title>VNG Pilot</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous"/>
    <script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--end::Global Stylesheets Bundle-->
    <style>
        .form-select .form-select-sm .form-select-solid {
            width: 200px !important;
        }

        .select2-dropdown .select2-dropdown--below {
            width: 200px !important;
        }

        td {
            text-align: center !important;
        }
        .
    </style>

    <script>
        $(document).ready(function () {
            $("#companyTable").DataTable({language: {
                    searchPlaceholder: "Search By Company Name"
                }, paging: true, searching: true, ordering: true, info: true, "order": [[0, "asc"]]});

            $('#companyTable input').addClass('form-control');

            // var sel1 = 'all';
            // company_table(sel1);


$("#globalSearch").on("keyup", function() {
    var value = $(this).val();
    $.ajax({
        type: 'GET',
        url: "{{url('/global-search')}}"+'/'+value,

        mimeType: 'json',
        success: function (data) {
            var table = $('#companyTable').DataTable();
            table.destroy();
            $("#companyTable tbody tr").remove();
            cars = data
            // console.log(data);

            out = ""
            for (let car of cars) {

                // console.log(car["Search text"])
                if (car["place_api_address"].length > 2) car["place_api_address"] = car["place_api_address"].substring(0, 20);

                if (car["duplicate_location"] == 'Null') car["duplicate_location"] = '-';
                if (car["kvk_other"] == 0) car["kvk_other"] = '-';
                if (car["kvk_tradename"] == 0) car["kvk_tradename"] = '-';
                if (car["kvk_partnership_name"] == 0) car["kvk_partnership_name"] = '-'
                if (car["kvk_chamber_of_commerce"] == 0) car["kvk_chamber_of_commerce"] = '-';
                if (car["kvk_establishment_no"] == 0) car["kvk_establishment_no"] = '-';
                car["Bovag"] = `<td class="text-center"><span class="badge badge-light-danger fw-bold me-1" id="bovagBtn" data-toggle="modal" data-target="#bovagModal"><i class="fa fa-eye" style="color:black;"></span></td>`;
                out += `
				<tr>
					<td class="text-center">${car["place_api_company_name"]}</td>
					<td class="text-center">${car["kvk_tradename"]}</td>
					<td class="text-center">${car["kvk_chamber_of_commerce"]}</td>
					<td class="text-center">${car["kvk_establishment_no"]}</td>
					<td class="text-center">${car["poitive_reviews"]}</td>
					<td class="text-center">${car["negative_reviews"]}</td>
					${car["Bovag"]}
					<td class="text-center">${car["duplicate_location"]}</td>
					<td class="text-center">
					<button type="button" id="but" class="gfgselect btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Map</button></td>>
					<td style="display:none;"class="text-center">${car["lat"]}</td>
					<td style="display:none;"class="text-center">${car["lng"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_address"]}</td>
					<td style="display:none;"class="text-center">${car["business_status"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_full_address"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_phone_number"]}</td>
					<td style="display:none;"class="text-center">${car["kvk_partnership_name"]}</td>
					<td style="display:none;"class="text-center">${car["kvk_other"]}</td>
					<td style="display:none;"class="text-center">${car["types"]}</td>
					<td style="display:none;"class="text-center">${car["permanently_closed"]}</td>

					<td style="display:none;"class="text-center">${car["place_api_company_name"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_name"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_name_score"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_full_address"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_address"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_address_score"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_phone_number"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_telephone"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_telephone_score"]}</td>
				</tr>
			`;
            }
            $("#companyTable tbody").append(out);
            $("#companyTable").DataTable({language: {
                    searchPlaceholder: "Search By Company Name"
                }, paging: true, searching: true, ordering: true, info: true, "order": [[0, "asc"]]});

            $('#companyTable input').addClass('form-control');

            // console.log(data["map_coordinates"])
            var dataPoints = [
                {
                    type: "scattermapbox",
                    // lon: data["map_coordinates"]["longitudes"].map(Number),
                    // lat: data["map_coordinates"]["latitudes"].map(Number),
                    // lon: data["lng"],
                    // lat: data["lat"],
                    lon: [parseFloat(data["lng"])],
                    lat: [parseFloat(data["lat"])],
                    marker: {color: "red", size: 8}
                }
            ];
            var layout = {
                dragmode: "zoom",
                mapbox: {
                    style: "open-street-map",
                    center: {lat: 52.05926412880043, lon: 4.324132285204885},
                    zoom: 10
                },
                margin: {r: 0, t: 0, b: 0, l: 0}
            };
            Plotly.newPlot("map", dataPoints, layout);
        },
    });


    $("table tbody tr").each(function(index) {
        if (index != 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        }
    });
});


            $(document).on('click', '#but', function() {
                Plotly.purge('map');
                $("#modal").html("");
                var row = $(this).closest('tr');
                var cell = $(this).closest('td');

                // console.log("Edit button was clicked: " + row.index() + ', ' + cell.index());


                var address = row.find("td:nth-child(12)").text();
                var neg = row.find("td:nth-child(6)").text();
                var pos = row.find("td:nth-child(5)").text();
                var lat = row.find("td:nth-child(10)").text();
                var lon = row.find("td:nth-child(11)").text();
//console.log(lon+"lajsndljsndl")


                //console.log(a)
                add = "<p><b>Address: </b>" + address + " </p>";
                negativeR = "<p><b>Negative Reviews:</b> " + neg + " </p>";
                positiveR = "<p><b>Positive Reviews:</b> " + pos + " </p>";
                // $('#myTable').append('<tr><td>my data</td><td>more data</td></tr>');



                var bs = row.find("td:nth-child(13)").text();
                var fa = row.find("td:nth-child(14)").text();
                var fpn = row.find("td:nth-child(15)").text();
                var pn = row.find("td:nth-child(16)").text();
                var oo = row.find("td:nth-child(17)").text();
                var tt = row.find("td:nth-child(18)").text();
                var pc = row.find("td:nth-child(19)").text();


                out = `
                <table id="companyTable"
            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
         <!--begin::Head-->
         <thead class="fs-7 text-gray-400 text-uppercase">
         <tr>
             <th class="min-w-30px text-end" style="display:none;">Company Name</th>
             <th class="min-w-30px text-end" style="display:none;">Trade Name</th>
         </tr>
         </thead>
         <!--end::Head-->
         <!--begin::Body-->
         <tbody class="fs-6">
				<tr>
					<td class="min-w-30px text-end">Business Status</td>
					<td class="text-center">`+ bs +`</td>

				</tr>
                <tr>
					<td class="min-w-30px text-end">Formatted Address</td>
					<td class="text-center">`+ fa +`</td>

				</tr>
                <tr>
					<td class="min-w-30px text-end">Formatted Phone Number</td>
					<td class="text-center">`+ fpn +`</td>

				</tr>
                <tr>
					<td class="min-w-30px text-end">Partnership Name</td>
					<td class="text-center">`+ pn +`</td>

				</tr>
                <tr>
					<td class="min-w-30px text-end">Types</td>
					<td class="text-center">`+ tt +`</td>

				</tr>
                <!-- tr>
					<td class="min-w-30px text-end">Permanently Closed</td>
					<td class="text-center">`+ pc +`</td>

				</tr -->


         </tbody>
         <!--end::Body-->
    </table>
			`;

        //    val = $("#myTable tbody").append(out);
                // $("#myTable").DataTable();
                // $("#modal").append(add);
                // $("#modal").append(negativeR);
                // $("#modal").append(positiveR);
                $("#modal").append(out);

                $("#modal").append("<div id='map'></div>");


                var dataPoints = [
                    {
                        type: "scattermapbox",
                        lon: [parseFloat(lon)],
                        lat: [parseFloat(lat)],
                        marker: {color: "red", size: 8}
                    }
                ];
                var layout = {
                    dragmode: "zoom",
                    mapbox: {style: "open-street-map", center: {lat: lat, lon: lon}, zoom: 10},
                    margin: {r: 0, t: 0, b: 0, l: 0}
                };
                Plotly.newPlot("map", dataPoints, layout);


            });

            $(document).on('click', '#bovagBtn', function() {
                $("#bovagModalBody").html("");
                var row = $(this).closest('tr');
                var cell = $(this).closest('td');


                var one = row.find("td:nth-child(20)").text();
                var two = row.find("td:nth-child(21)").text();
                var three = row.find("td:nth-child(22)").text();
                var four = row.find("td:nth-child(23)").text();
                var five = row.find("td:nth-child(24)").text();
                var six = row.find("td:nth-child(25)").text();
                var seven = row.find("td:nth-child(26)").text();
                var eight = row.find("td:nth-child(27)").text();
                var nine = row.find("td:nth-child(28)").text();
                var avg = ((parseFloat(three) + parseFloat(six) + parseFloat(nine))/3).toFixed(2);
                if (avg > 0.7){
                    avg = '<td class="text-center " style="color:green;">Recommeded Match</td>'
                }else{
                    avg = String(avg)
                    avg = '<td class="text-center ">'+avg+'</td>'

                }

                output = `
                <table id="bovagTable"
            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
         <!--begin::Head-->
         <thead class="fs-7 text-gray-400 text-uppercase">
         <tr>
             <th class="min-w-30px text-center"></th>
             <th class="min-w-30px text-center">Place API</th>
             <th class="min-w-30px text-center">BOVAG</th>
             <th class="min-w-30px text-center">Similarity Score</th>
         </tr>
         </thead>
         <!--end::Head-->
         <!--begin::Body-->
         <tbody class="fs-6">
				<tr>
					<td class="text-center">Company Name</td>
					<td class="text-center">`+ one +`</td>
					<td class="text-center">`+ two +`</td>
					<td class="text-center">`+ three +`</td>
				</tr>
                <tr>
					<td class="text-center">Address</td>
					<td class="text-center">`+ four +`</td>
					<td class="text-center">`+ five +`</td>
					<td class="text-center">`+ six +`</td>
				</tr>
                <tr>
					<td class="text-center">Phone Number</td>
					<td class="text-center">`+ seven +`</td>
					<td class="text-center">`+ eight +`</td>
					<td class="text-center">`+ nine +`</td>
				</tr>
				<tr>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					`+avg+`
				</tr>
         </tbody>
         <!--end::Body-->
    </table>
			`;

                //    val = $("#myTable tbody").append(out);
                // $("#myTable").DataTable();
                // $("#modal").append(add);
                // $("#modal").append(negativeR);
                // $("#modal").append(positiveR);
                $("#bovagModalBody").append(output);

            });



            // Activate tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Filter table rows based on searched term
            $("#search").on("keyup", function () {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function () {
                    $row = $(this);
                    var name = $row.find("td:nth-child(1)").text().toLowerCase();
                    // console.log(name);
                    if (name.search(term) < 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                });
            });
            $("#search2").on("keyup", function () {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function () {
                    $row = $(this);
                    var name = $row.find("td:nth-child(3)").text().toLowerCase();
                    // console.log(name);
                    if (name.search(term) < 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                });
            });
        });
    </script>
    <script>


        function change_myselect(sel1) {
            company_table(sel1);
        }

        function company_table(sel1){
            var table = $('#companyTable').DataTable();
            table.destroy();
            $("#companyTable tbody tr").remove();
            //    console.log(sel)
            $.ajax({
                type: 'GET',
                url: 'https://2c028aa685c8.ngrok.io/vngp1_predict_pre_extracted?place_type=' + sel1,
                mimeType: 'json',
                success: function (data) {
                    cars = data["compnaies_indicators_dict"]
                    // console.log(data);

                    out = ""
                    for (let car of cars) {

                        // console.log(car["Search text"])
                        if (car["place_api_address"].length > 2) car["place_api_address"] = car["place_api_address"].substring(0, 20);

                        if (car["duplicate_location"] == 'Null') car["duplicate_location"] = '-';
                        if (car["kvk_other"] == 0) car["kvk_other"] = '-';
                        if (car["kvk_tradename"] == 0) car["kvk_tradename"] = '-';
                        if (car["kvk_partnership_name"] == 0) car["kvk_partnership_name"] = '-'
                        if (car["kvk_chamber_of_commerce"] == 0) car["kvk_chamber_of_commerce"] = '-';
                        if (car["kvk_establishment_no"] == 0) car["kvk_establishment_no"] = '-';
                        car["Bovag"] = `<td class="text-center"><span class="badge badge-light-danger fw-bold me-1" id="bovagBtn" data-toggle="modal" data-target="#bovagModal"><i class="fa fa-eye" style="color:black;"></span></td>`;
                        out += `
				<tr>
					<td class="text-center">${car["place_api_company_name"]}</td>
					<td class="text-center">${car["kvk_tradename"]}</td>
					<td class="text-center">${car["kvk_chamber_of_commerce"]}</td>
					<td class="text-center">${car["kvk_establishment_no"]}</td>
					<td class="text-center">${car["poitive_reviews"]}</td>
					<td class="text-center">${car["negative_reviews"]}</td>
					${car["Bovag"]}
					<td class="text-center">${car["duplicate_location"]}</td>
					<td class="text-center">
					<button type="button" id="but" class="gfgselect btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Map</button></td>>
					<td style="display:none;"class="text-center">${car["lat_lng"][0]}</td>
					<td style="display:none;"class="text-center">${car["lat_lng"][1]}</td>
					<td style="display:none;"class="text-center">${car["place_api_address"]}</td>
					<td style="display:none;"class="text-center">${car["business_status"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_full_address"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_phone_number"]}</td>
					<td style="display:none;"class="text-center">${car["kvk_partnership_name"]}</td>
					<td style="display:none;"class="text-center">${car["kvk_other"]}</td>
					<td style="display:none;"class="text-center">${car["types"]}</td>
					<td style="display:none;"class="text-center">${car["permanently_closed"]}</td>

					<td style="display:none;"class="text-center">${car["place_api_company_name"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_name"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_name_score"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_full_address"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_address"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_address_score"]}</td>
					<td style="display:none;"class="text-center">${car["place_api_phone_number"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_telephone"]}</td>
					<td style="display:none;"class="text-center">${car["bovag_matched_telephone_score"]}</td>
				</tr>
			`;
                    }
                    $("#companyTable tbody").append(out);
                    $("#companyTable").DataTable({language: {
                            searchPlaceholder: "Search By Company Name"
                        }, paging: true, searching: true, ordering: true, info: true, "order": [[0, "asc"]]});

                    $('#companyTable input').addClass('form-control');

                    // console.log(data["map_coordinates"])
                    var dataPoints = [
                        {
                            type: "scattermapbox",
                            lon: data["map_coordinates"]["longitudes"].map(Number),
                            lat: data["map_coordinates"]["latitudes"].map(Number),
                            marker: {color: "red", size: 8}
                        }
                    ];
                    var layout = {
                        dragmode: "zoom",
                        mapbox: {
                            style: "open-street-map",
                            center: {lat: 52.05926412880043, lon: 4.324132285204885},
                            zoom: 10
                        },
                        margin: {r: 0, t: 0, b: 0, l: 0}
                    };
                    Plotly.newPlot("map", dataPoints, layout);
                },
                error: function () {
                    alert('No response');
                }
            });

        }

        function change_myselect2(sel2) {

            var table = $('#carTable').DataTable();
            table.destroy();
            $("#carTable tbody tr").remove();
            $.ajax({
                type: 'GET',
                url: 'https://2c028aa685c8.ngrok.io/vngp1_predict_pre_extracted?place_type=' + sel2,
                mimeType: 'json',
                success: function (data) {

                    $.ajax({
                        type: 'POST',
                        url: '{{route('company.store')}}',
                        mimeType: 'json',
                    });

                    cars = data["ai_results_list"]


                    // console.log(cars)
                    //	const cars = JSON.parse(x)

                    out2 = ""
                    for (let car of cars) {

                        // console.log(car["Search text"])
                        if (car["detected_text"].length > 20) car["detected_text"] = car["detected_text"].substring(0, 20);
                        out2 += `
				<tr>
					<td>${car["detected_text"]}</td>
					<td>${car["car_specs"]}</td>
					<td>1</td>
				</tr>
			`;
                    }
                    $("#carTable tbody").append(out2);
                    $("#carTable").DataTable();

                    var dataPoints = [
                        {
                            type: "scattermapbox",
                            lon: data["map_coordinates"]["longitudes"].map(Number),
                            lat: data["map_coordinates"]["latitudes"].map(Number),
                            marker: {color: "red", size: 8}
                        }
                    ];
                    var layout = {
                        dragmode: "zoom",
                        mapbox: {
                            style: "open-street-map",
                            center: {lat: 52.05926412880043, lon: 4.324132285204885},
                            zoom: 10
                        },
                        margin: {r: 0, t: 0, b: 0, l: 0}
                    };
                    Plotly.newPlot("map", dataPoints, layout);


                },
                error: function () {
                    alert('No response');
                }
            });
        }
    </script>


</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
<!--begin::Main-->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Company Details and location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"id="modal">
          <div id="map"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lg" id="bovagModal" tabindex="-1" role="dialog" aria-labelledby="bovagModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bovagModalLabel">Bovag Modal Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"id="bovagModalBody">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <!-- <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper"> -->
        <!--begin::Header-->
        <div id="kt_header" class="header header-bg">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Brand-->
                <div class="header-brand me-5">
                    <!--begin::Aside toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                      fill="black"/>
												<path opacity="0.3"
                                                      d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                      fill="black"/>
											</svg>
										</span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside toggle-->
                    <!--begin::Logo-->
                    <a href="index.html">
                        <!-- <img alt="Logo" src="assets/media/logos/logo-1-dark.svg" class="h-25px h-lg-30px d-none d-md-block" />
                        <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-25px d-block d-md-none" /> -->
                        <h2 class="fw-bolder" style="color:white;">Pilot Ondernemingen in de Autobranche</h2>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                <!--begin::Topbar-->
                <div class="topbar d-flex align-items-stretch">
                    <!--begin::Item-->
                    <div class="d-flex align-items-stretch me-2 me-lg-4">
                        <!--begin::Search-->
                        <div id="kt_header_search" class="d-flex align-items-center header-search w-lg-250px"
                             data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                             data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                             data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                            <!--begin::Tablet and mobile search toggle-->
                            <div data-kt-search-element="toggle" class="d-flex d-lg-none align-items-center">
                                <div class="btn btn-icon btn-borderless btn-active-primary bg-white bg-opacity-10">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-white">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="black"/>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                              fill="black"/>
													</svg>
												</span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Tablet and mobile search toggle-->
                            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                            <form data-kt-search-element="form"
                                  class="d-none d-lg-block w-100 position-relative mb-2 mb-lg-0" autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden"/>
                                <!--end::Hidden input-->
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen004.svg-->
                                <!-- <span class="svg-icon svg-icon-3 position-absolute top-50 translate-middle-y ms-0 ms-lg-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black" />
                                        <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black" />
                                    </svg>
                                </span> -->
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <!-- <input type="text" class="form-control form-control-flush ps-8 ps-lg-12" name="search" value="" placeholder="Search" data-kt-search-element="input" /> -->
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-lg-5"
                                      data-kt-search-element="spinner">
												<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
											</span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-lg-4"
                                      data-kt-search-element="clear">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                              rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
														<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                              transform="rotate(45 7.41422 6)" fill="black"/>
													</svg>
												</span>
                                    <!--end::Svg Icon-->
											</span>
                                <!--end::Reset-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Theme mode-->
                    <div class="d-flex align-items-center me-2 me-lg-4">
                        <input type="text" class="form-control" id="globalSearch" name="globalSearch" value="" placeholder="Global Search" />
                    </div>
                    <div class="d-flex align-items-center me-2 me-lg-4">
                        <a href="index.html" class="btn btn-primary me-5">Company Indicator</a>

                        <!--end::Theme mode docs-->
                    </div>
                    <div class="d-flex align-items-center me-2 me-lg-4">
                        <a href="irregular.html" class="btn btn-primary me-5">Irregularities on the map</a>

                        <!--end::Theme mode docs-->
                    </div>
                    <!--end::Theme mode-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center me-2 me-lg-4">
                        <a href="#" class="btn btn-success border-0 px-3 px-lg-6">Vehicle Information
                            <span>- Coming Soon</span>
                        </a>
                    </div>

                    <!-- <div class="d-flex align-items-center me-2 me-lg-4">
                        <a target="map.html" href="map.html" id="map" class="btn btn-success border-0 px-3 px-lg-6">Maps
                        </a>
                    </div> -->
                    <!--end::Item-->
                    <!--begin::Item-->
                    <!-- <div class="d-flex align-items-center">
                        <a href="../../demo10/dist/index.html" class="btn btn-icon btn-color-white btn-active-color-primary border-0 me-n3" data-bs-toggle="tooltip" data-bs-placement="left" title="Return to launcher">
                            begin::Svg Icon | path: icons/duotune/general/gen034.svg
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
                                </svg>
                            </span>
                            end::Svg Icon
                        </a>
                    </div> -->
                    <!--end::Item-->
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl" style="margin-top: 80px;">
                    <!--begin::Form-->
                    <form action="#">
                        <!--begin::Card-->
                        <div class="card mb-7">
                            <!--begin::Card body-->
                            <div class="card-body bg-dark">
                                <!--begin::Compact form-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Select-->
                                    <!-- <label for="" class="me-md-2">Select company type:</label> -->
                                    <select name="status" data-control="select2" data-hide-search="true" id="myselect"
                                            onchange="change_myselect(this.value)"
                                            data-placeholder="Select Car Company Type"
                                            class="form-select form-select-sm form-select-solid">
                                        <option value="">Choose an option:</option>
                                        <option value="car_dealer">car_dealer</option>
                                        <option value="car_repair">car_repair</option>
                                        <!-- <option value="car_rental">car_rental</option> -->
                                    </select>
                                    <!--end::Select-->
                                    <!--begin::Input group-->
                                    <!-- <div class="position-relative w-md-400px me-md-2"> -->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <!-- <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span> -->
                                    <!--end::Svg Icon-->
                                    <!-- <input type="text" class="form-control form-control-solid ps-10" id="search" name="search" value="" placeholder="Search By Company Name" /> -->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin:Action-->
                                    <!-- <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary me-5">Search</button>
                                    </div> -->
                                    <!--end:Action-->
                                </div>
                                <!--end::Compact form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </form>
                    <!--end::Form-->
                    <!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack pb-7">
                        <!--begin::Title-->
                        <!-- <div class="d-flex flex-wrap align-items-center my-1">
                            <h3 class="fw-bolder me-5 my-1">57 Items Found
                            <span class="text-gray-400 fs-6">by Recent Updates ↓</span></h3>
                        </div> -->
                        <!--end::Title-->
                        <!--begin::Controls-->
                        <!-- <div class="d-flex flex-wrap my-1">
                            begin::Tab nav
                            <ul class="nav nav-pills me-6 mb-2 mb-sm-0">
                                <li class="nav-item m-0">
                                    <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3" data-bs-toggle="tab" href="#kt_project_users_card_pane">
                                        begin::Svg Icon | path: icons/duotune/general/gen024.svg
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        end::Svg Icon
                                    </a>
                                </li>
                                <li class="nav-item m-0">
                                    <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary active" data-bs-toggle="tab" href="#kt_project_users_table_pane">
                                        begin::Svg Icon | path: icons/duotune/abstract/abs015.svg
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                            </svg>
                                        </span>
                                        end::Svg Icon
                                    </a>
                                </li>
                            </ul>
                            end::Tab nav

                        </div> -->
                        <!--end::Controls-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Company Details</h3>
                                    </div>

{{--                                    <div class="col-md-4"></div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <input type="text" class="form-control" id="search" name="search" value="" placeholder="Search By Company Name" />--}}
{{--                                    </div>--}}
                                </div>


                            </div>
                        </div>
                        <!--begin::Tab pane-->
                        <!-- <div id="kt_project_users_table_pane" class="tab-pane fade"> -->
                        <!--begin::Card-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body pt-0 active">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="companyTable"
                                           class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                        <!--begin::Head-->
                                        <thead class="fs-7 text-gray-400 text-uppercase">
                                        <tr>
                                            <th class="min-w-50px text-end">Company Name</th>
                                            <th class="min-w-50px text-center">Trade Name</th>
                                            <th class="min-w-50px text-center">Chamber of Commerce</th>
                                            <th class="min-w-50px text-center">Establishment No</th>
                                            <th class="min-w-50px text-center">Positive Reviews</th>
                                            <th class="min-w-50px text-center">Negative Reviews</th>
                                            <th class="min-w-50px text-center">BOVAG</th>
                                            <th class="min-w-50px text-center">Companies at same location</th>
                                            <th class="min-w-50px text-center">Details and location</th>
                                            <th class="min-w-50px text-center" style="display: none;">lat</th>
                                            <th class="min-w-50px text-center" style="display: none;">Long</th>
                                            <th class="min-w-50px text-center" style="display: none;">Address</th>
                                            <th class="min-w-50px text-center" style="display: none;">business_status</th>
                                            <th class="min-w-50px text-center" style="display: none;">formatted_address</th>
                                            <th class="min-w-50px text-center" style="display: none;">formatted_phone_number</th>
                                            <th class="min-w-50px text-center" style="display: none;">Partnership name</th>
                                            <th class="min-w-50px text-center" style="display: none;">Other</th>
                                            <th class="min-w-50px text-center" style="display: none;">types</th>
                                            <th class="min-w-50px text-center" style="display: none;">permanently_closed</th>

                                            <th class="min-w-50px text-center" style="display: none;">place_api_company_name</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_name</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_name_score</th>

                                            <th class="min-w-50px text-center" style="display: none;">place_api_full_address</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_address</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_address_score</th>

                                            <th class="min-w-50px text-center" style="display: none;">place_api_phone_number</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_telephone</th>
                                            <th class="min-w-50px text-center" style="display: none;">bovag_matched_telephone_score</th>

                                        </tr>
                                        </thead>
                                        <!--end::Head-->
                                        <!--begin::Body-->
                                        <tbody class="fs-6">
                                          @foreach($companies as $company)
                                             <tr>
                                                 <td class="text-center ">{{$company->place_api_company_name}}</td>
                                                 <td class="text-center ">{{$company->kvk_tradename}}</td>
                                                 <td class="text-center ">{{$company->kvk_chamber_of_commerce}}</td>
                                                 <td class="text-center ">{{$company->kvk_establishment_no}}</td>
                                                 <td class="text-center ">{{$company->poitive_reviews}}</td>
                                                 <td class="text-center ">{{$company->negative_reviews}}</td>
                                                 <td class="text-center"><span class="badge badge-light-danger fw-bold me-1" id="bovagBtn" data-id="{{$company->id}}" data-toggle="modal" data-target="#bovagModal"><i class="fa fa-eye" style="color:black;"></i></span></td>
                                                 <td class="text-center ">{{$company->duplicate_location}}</td>
                                                 <td class="text-center">
                                                     <button type="button" id="but" class="gfgselect btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Map</button></td>
                                                 <td style="display:none;"class="text-center">{{$company->lat}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->lng}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->place_api_address}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->business_status}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->place_api_full_address}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->place_api_phone_number}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->kvk_partnership_name}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->kvk_other}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->types}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->permanently_closed}}</td>

                                                 <td style="display:none;"class="text-center">{{$company->place_api_company_name}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_name}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_name_score}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->place_api_full_address}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_address}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_address_score}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->place_api_phone_number}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_telephone}}</td>
                                                 <td style="display:none;"class="text-center">{{$company->bovag_matched_telephone_score}}</td>

                                             </tr>
                                          @endforeach
                                        </tbody>
                                        <!--end::Body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!-- </div> -->
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Content-->

        <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Page-->
<!--end::Root-->

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="assets/js/custom/utilities/search/horizontal.js"></script>
<script src="assets/js/custom/apps/projects/users/users.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.js"></script>


<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
