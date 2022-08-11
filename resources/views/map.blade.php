<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>VNG Pilot</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<style>
			.form-select .form-select-sm .form-select-solid{
				width: 200px !important;
			}
			.select2-dropdown .select2-dropdown--below{
				width: 200px !important;
			}
		</style>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>

<script>
	function change_myselect() {
		$.ajax({
		type: 'GET',
		url: 'https://2c028aa685c8.ngrok.io/vngp1_predict_pre_extracted?place_type=car_dealer',
		mimeType: 'json',
		success: function(data) {
		cars = data["compnaies_indicators_dict"]
		console.log(cars)
		//	const cars = JSON.parse(x)

		out = ""
		for(let car of cars){

			console.log(car["Search text"])
		}
		$( "#companyTable tbody" ).append(out);
		$( "#companyTable" ).DataTable();

		console.log(data["map_coordinates"])
		var dataPoints = [
		{
			type: "scattermapbox",
			lon: data["map_coordinates"]["longitudes"].map(Number),
			lat: data["map_coordinates"]["latitudes"].map(Number),
			marker: { color: "red", size: 8 }
		}
		];
		var layout = {
		dragmode: "zoom",
		mapbox: { style: "open-street-map", center: { lat: 52.05926412880043, lon: 4.324132285204885 }, zoom: 10 },
		margin: { r: 0, t: 0, b: 0, l: 0 }
		};
		Plotly.newPlot("map", dataPoints, layout);



		},
		error: function() {
		alert('No response');
		}
		});
}	
$(document).ready(function(){
	
	console.log('helellsadlasdklasd');
	change_myselect()

	// Activate tooltips
	$('[data-toggle="tooltip"]').tooltip();
    
	// Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(6)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
    $("#search2").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(3)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});

</script>
<script>

function change_myselect2(sel2) {
	//    console.log(sel)

	var table = $('#carTable').DataTable();
		table.destroy();
		$("#carTable tbody tr").remove(); 
		$.ajax({
type: 'GET',
url: 'https://2c028aa685c8.ngrok.io/vngp1_predict_pre_extracted?place_type='+sel2,
mimeType: 'json',
success: function(data) {
	cars = data["ai_results_list"]
		console.log(cars)
	//	const cars = JSON.parse(x)
	
	out2 = ""
		for(let car of cars){

		   // console.log(car["Search text"])
			if(car["detected_text"].length > 20) car["detected_text"] = car["detected_text"].substring(0,20);
			out2 += `
				<tr>
					<td>${car["detected_text"]}</td>
					<td>${car["car_specs"]}</td>
					<td>1</td>
				</tr>
			`;
		}
		$( "#carTable tbody" ).append(out2);
		$( "#carTable" ).DataTable();

		var dataPoints = [
		{
			type: "scattermapbox",
			lon: data["map_coordinates"]["longitudes"].map(Number),
			lat: data["map_coordinates"]["latitudes"].map(Number),
			marker: { color: "red", size: 8 }
		}
	];
	var layout = {
		dragmode: "zoom",
		mapbox: { style: "open-street-map", center: { lat: 52.05926412880043, lon: 4.324132285204885 }, zoom: 10 },
		margin: { r: 0, t: 0, b: 0, l: 0 }
	};
	Plotly.newPlot("map", dataPoints, layout);


},
error: function() {
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
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<!-- <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper"> -->
					<!--begin::Header-->
					<div id="kt_header" class="header header-bg1">
						<!--begin::Container-->
						<div class="container-fluid">
							<!--begin::Brand-->
							<div class="header-brand me-5">
								<!--begin::Aside toggle-->
								<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
									<div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_toggle">
										<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
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
									<h2 class="fw-bolder" style="color:white;">VNG Pilot</h2>
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Brand-->
							<!--begin::Topbar-->
							<div class="topbar d-flex align-items-stretch">
								<!--begin::Item-->
								<div class="d-flex align-items-stretch me-2 me-lg-4">
									<!--begin::Search-->
									<div id="kt_header_search" class="d-flex align-items-center header-search w-lg-250px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
										<!--begin::Tablet and mobile search toggle-->
										<div data-kt-search-element="toggle" class="d-flex d-lg-none align-items-center">
											<div class="btn btn-icon btn-borderless btn-active-primary bg-white bg-opacity-10">
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-white">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Tablet and mobile search toggle-->
									</div>
									<!--end::Search-->
								</div>
								<!--end::Item-->
								<!--begin::Theme mode-->
								<div class="d-flex align-items-center me-2 me-lg-4">
									<a href="index.html" class="btn btn-primary me-5" >Company Indicator</a>

									<!--end::Theme mode docs-->
								</div>
								<!--end::Theme mode-->
								<!--begin::Item-->
								<div class="d-flex align-items-center me-2 me-lg-4">
									<a href="#" class="btn btn-success border-0 px-3 px-lg-6">Vehicle Information
										<span>- Coming Soon</span>
									</a>
								</div>

								<div class="d-flex align-items-center me-2 me-lg-4">
									<a target="map.html" href="map.html" id="maps" class="btn btn-success border-0 px-3 px-lg-6">Maps
									</a>
								</div>
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
								<!--begin::Card-->
								<div class="card mb-7">
									<!--begin::Card body-->
									<div class="card-body bg-white">
										<!--begin::Compact form-->
										<div class="d-flex align-items-center">
											<div class="row">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div id='map'><!-- Plotly chart will be drawn inside this DIV --></div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<!--end::Compact form-->
									</div>
									<!--end::Card body-->
								</div>
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
		</div>
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
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>