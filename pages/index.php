<?php
	function viewMapDesaOld($request){
		extract($request,EXTR_SKIP);
		$view = "Lat: <input type=\"text\" id=\"ds_latitude\" class=\"form-control\" name=\"ds_latitude\" value=\"".$ds_latitude."\">
					Lon: <input type=\"text\" id=\"ds_longitude\" class=\"form-control\" name=\"ds_longitude\" value=\"".$ds_longitude."\">
				<!DOCTYPE html>
				<html>
				  <head>
					<title>Simple Map</title>
					<meta name=\"viewport\" content=\"initial-scale=1.0\">
					<meta charset=\"utf-8\">
					<style>
					  /* Always set the map height explicitly to define the size of the div
					   * element that contains the map. */
					  #map {
						height: 100%;
					  }
					  /* Optional: Makes the sample page fill the window. */
					  html {
						height: 100%;
						margin: 0;
						padding: 0;
					  }
					</style>
				  </head>
				  <body style=\"height: 100%;
						margin: 0;
						padding: 0;\">
					<div id=\"map\"></div>

					<script>
					  var map;
					  function initMap() {
						  var myLatLng = {lat: -8.65422, lng: 115.20532};
						  var pst = {lat: -8.65320, lng: 115.20274};
						  var status = '".$latlan."';
						  var latnew = document.getElementById('ds_latitude').value;
						  var lonnew = document.getElementById('ds_longitude').value;
						  if(status=='ok'){
							  myLatLng = {lat: parseFloat(latnew), lng: parseFloat(lonnew)};
							  pst = myLatLng;
						  }
						  var map = new google.maps.Map(document.getElementById('map'), {
							center: myLatLng,
							zoom: 14
						  });

						  var marker = new google.maps.Marker({
							draggable: true,
							position: pst,
							map: map,
							title: 'Silahkan geser sesuai lokasi kejadian'

						  });
						  var geocoder = new google.maps.Geocoder;
						var infowindow = new google.maps.InfoWindow;
						  google.maps.event.addListener(marker, 'dragend', function (event) {
							// get lat/lon of click
							var clickLat = event.latLng.lat();
							var clickLon = event.latLng.lng();

							// show in input box
							document.getElementById('ds_latitude').value = clickLat.toFixed(5);
							document.getElementById('ds_longitude').value = clickLon.toFixed(5);
							/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
							geocoder.geocode({'location': pst}, function(results, status) {
								if (status === google.maps.GeocoderStatus.OK) {
								  if (results[1]) {
									infowindow.setContent(results[1].formatted_address);
									infowindow.open(map, marker);
								  } else {
									window.alert('No results found');
								  }
								} else {
								  window.alert('Geocoder failed due to: ' + status);
								}
							  }); */
						});
					}



					</script>
					<script src=\"https://maps.googleapis.com/maps/api/js?key=".getKeyAPIGoogleMAP()."&callback=initMap\"
					async defer></script>
				  </body>
				</html>";
		return $view;
	}
    
    function viewMapDesa($request){
		extract($request,EXTR_SKIP);
		//user
		/*$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u 
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);	
		*/
		$view = "Lat: <input type=\"text\" id=\"ds_latitude\" class=\"form-control\" name=\"ds_latitude\" value=\"".$ds_latitude."\">
					Lon: <input type=\"text\" id=\"ds_longitude\" class=\"form-control\" name=\"ds_longitude\" value=\"".$ds_longitude."\">
				
				<!DOCTYPE html>
				<html>
				  <head>
					<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\">
					<meta charset=\"utf-8\">
					<title>Places Searchbox</title>
					<style>
					  /* Always set the map height explicitly to define the size of the div
					   * element that contains the map. */
					  #map {
						height: 100%;
					  }
					  /* Optional: Makes the sample page fill the window. */
					  html, body {
						height: 100%;
						margin: 0;
						padding: 0;
					  }
					  .controls {
						margin-top: 10px;
						border: 1px solid transparent;
						border-radius: 2px 0 0 2px;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						height: 32px;
						outline: none;
						box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
					  }

					  #pac-input {
						background-color: #fff;
						font-family: Roboto;
						font-size: 15px;
						font-weight: 300;
						margin-left: 12px;
						padding: 0 11px 0 13px;
						text-overflow: ellipsis;
						width: 300px;
					  }

					  #pac-input:focus {
						border-color: #4d90fe;
					  }

					  .pac-container {
						font-family: Roboto;
					  }

					  #type-selector {
						color: #fff;
						background-color: #4d90fe;
						padding: 5px 11px 0px 11px;
					  }

					  #type-selector label {
						font-family: Roboto;
						font-size: 13px;
						font-weight: 300;
					  }
					  #target {
						width: 345px;
					  }
					</style>
				  </head>
				  <body>
					<input id=\"pac-input\" class=\"controls\" type=\"text\" placeholder=\"Search Box\">
					<div id=\"map\"></div>
					<script>
						var markers = [];
						function initAutocomplete() {
							var myLatLng = {lat: -8.65422, lng: 115.20532};
							var pst = {lat: -8.66415, lng: 115.23029};
							var status = '".$latlan."';
							var latnew = document.getElementById('ds_latitude').value;
							var lonnew = document.getElementById('ds_longitude').value;
							if(status=='ok'){
								myLatLng = {lat: parseFloat(latnew), lng: parseFloat(lonnew)};
								pst = myLatLng;
							}
							var map = new google.maps.Map(document.getElementById('map'), {
								center: myLatLng,
								zoom: 14,
								mapTypeId: 'roadmap'
							});
							markers[0] = new google.maps.Marker({
								draggable: true,
								position: pst,
								map: map,
								title: 'Silahkan geser sesuai lokasi kejadian'
								
							  });
							var geocoder = new google.maps.Geocoder;
							var infowindow = new google.maps.InfoWindow;
							google.maps.event.addListener(markers[0], 'dragend', function (event) {
								// get lat/lon of click
								var clickLat = event.latLng.lat();
								var clickLon = event.latLng.lng();

								// show in input box
								document.getElementById('ds_latitude').value = clickLat.toFixed(5);
								document.getElementById('ds_longitude').value = clickLon.toFixed(5);
								/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
								geocoder.geocode({'location': pst}, function(results, status) {
									if (status === google.maps.GeocoderStatus.OK) {
										if (results[1]) {
											infowindow.setContent(results[1].formatted_address);
											infowindow.open(map, markers[0]);
										} else {
											window.alert('No results found');
										}
									} else {
										window.alert('Geocoder failed due to: ' + status);
									}
								}); */
							});
							// Create the search box and link it to the UI element.
							var input = document.getElementById('pac-input');
							var searchBox = new google.maps.places.SearchBox(input);
							map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

							// Bias the SearchBox results towards current map's viewport.
							map.addListener('bounds_changed', function() {
								searchBox.setBounds(map.getBounds());
							});

							searchBox.addListener('places_changed', function() {
								var places = searchBox.getPlaces();
								if (places.length == 0) {
									return;
								}
								// Clear out the old markers.
								markers.forEach(function(marker) {
									marker.setMap(null);
								});
						  
								// For each place, get the icon, name and location.
								var bounds = new google.maps.LatLngBounds();
								places.forEach(function(place) {
										if (!place.geometry) {
										console.log('Returned place contains no geometry');
										return;
									}
									var icon = {
										url: place.icon,
										size: new google.maps.Size(71, 71),
										origin: new google.maps.Point(0, 0),
										anchor: new google.maps.Point(17, 34),
										scaledSize: new google.maps.Size(25, 25)
									};
									clearLocations();
									// Create a marker for each place.							
									var lati = place.geometry.location.lat();
									var lngi = place.geometry.location.lng();
									document.getElementById('ds_latitude').value = lati.toFixed(5);
									document.getElementById('ds_longitude').value = lngi.toFixed(5);
								
									markers[0] = new google.maps.Marker({
										draggable: true,
										position: place.geometry.location,
										map: map,
										title: 'Silahkan geser sesuai lokasi kejadian'
									});
									var geocoder = new google.maps.Geocoder;
									var infowindow = new google.maps.InfoWindow;
									google.maps.event.addListener(markers[0], 'dragend', function (event) {
										// get lat/lon of click
										var clickLat = event.latLng.lat();
										var clickLon = event.latLng.lng();

										// show in input box
										document.getElementById('ds_latitude').value = clickLat.toFixed(5);
										document.getElementById('ds_longitude').value = clickLon.toFixed(5);
										/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
										geocoder.geocode({'location': pst}, function(results, status) {
											if (status === google.maps.GeocoderStatus.OK) {
											  if (results[1]) {
												infowindow.setContent(results[1].formatted_address);
												infowindow.open(map, markers[0]);
											  } else {
												window.alert('No results found');
											  }
											} else {
											  window.alert('Geocoder failed due to: ' + status);
											}
										  }); */
									});
									if (place.geometry.viewport) {
									  // Only geocodes have viewport.
									  bounds.union(place.geometry.viewport);
									} else {
									  bounds.extend(place.geometry.location);
									}
								});
								map.fitBounds(bounds);
							});
						}
						function clearLocations() {
							info_Window = new google.maps.InfoWindow();
							info_Window.close();
							for (var i = 0; i < markers.length; i++) {
								markers[i].setMap(null);
							}
							markers.length = 0;
						}
					</script>
					<script src=\"https://maps.googleapis.com/maps/api/js?key=".getKeyAPIGoogleMAP()."&libraries=places&callback=initAutocomplete\"
					 async defer></script>
			  </body>
			</html>";
		return $view;
	}

    function viewMapBanjar($request){
		extract($request,EXTR_SKIP);
		//user
		/*$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u 
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);	
		*/
		$view = "Lat: <input type=\"text\" id=\"bnj_latitude\" class=\"form-control\" name=\"bnj_latitude\" value=\"".$bnj_latitude."\">
					Lon: <input type=\"text\" id=\"bnj_longitude\" class=\"form-control\" name=\"bnj_longitude\" value=\"".$bnj_longitude."\">
				
				<!DOCTYPE html>
				<html>
				  <head>
					<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\">
					<meta charset=\"utf-8\">
					<title>Places Searchbox</title>
					<style>
					  /* Always set the map height explicitly to define the size of the div
					   * element that contains the map. */
					  #map {
						height: 100%;
					  }
					  /* Optional: Makes the sample page fill the window. */
					  html, body {
						height: 100%;
						margin: 0;
						padding: 0;
					  }
					  .controls {
						margin-top: 10px;
						border: 1px solid transparent;
						border-radius: 2px 0 0 2px;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						height: 32px;
						outline: none;
						box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
					  }

					  #pac-input {
						background-color: #fff;
						font-family: Roboto;
						font-size: 15px;
						font-weight: 300;
						margin-left: 12px;
						padding: 0 11px 0 13px;
						text-overflow: ellipsis;
						width: 300px;
					  }

					  #pac-input:focus {
						border-color: #4d90fe;
					  }

					  .pac-container {
						font-family: Roboto;
					  }

					  #type-selector {
						color: #fff;
						background-color: #4d90fe;
						padding: 5px 11px 0px 11px;
					  }

					  #type-selector label {
						font-family: Roboto;
						font-size: 13px;
						font-weight: 300;
					  }
					  #target {
						width: 345px;
					  }
					</style>
				  </head>
				  <body>
					<input id=\"pac-input\" class=\"controls\" type=\"text\" placeholder=\"Search Box\">
					<div id=\"map\"></div>
					<script>
						var markers = [];
						function initAutocomplete() {
							var myLatLng = {lat: -8.65422, lng: 115.20532};
							var pst = {lat: -8.66415, lng: 115.23029};
							var status = '".$latlan."';
							var latnew = document.getElementById('bnj_latitude').value;
							var lonnew = document.getElementById('bnj_longitude').value;
							if(status=='ok'){
								myLatLng = {lat: parseFloat(latnew), lng: parseFloat(lonnew)};
								pst = myLatLng;
							}
							var map = new google.maps.Map(document.getElementById('map'), {
								center: myLatLng,
								zoom: 14,
								mapTypeId: 'roadmap'
							});
							markers[0] = new google.maps.Marker({
								draggable: true,
								position: pst,
								map: map,
								title: 'Silahkan geser sesuai lokasi kejadian'
								
							  });
							var geocoder = new google.maps.Geocoder;
							var infowindow = new google.maps.InfoWindow;
							google.maps.event.addListener(markers[0], 'dragend', function (event) {
								// get lat/lon of click
								var clickLat = event.latLng.lat();
								var clickLon = event.latLng.lng();

								// show in input box
								document.getElementById('bnj_latitude').value = clickLat.toFixed(5);
								document.getElementById('bnj_longitude').value = clickLon.toFixed(5);
								/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
								geocoder.geocode({'location': pst}, function(results, status) {
									if (status === google.maps.GeocoderStatus.OK) {
										if (results[1]) {
											infowindow.setContent(results[1].formatted_address);
											infowindow.open(map, markers[0]);
										} else {
											window.alert('No results found');
										}
									} else {
										window.alert('Geocoder failed due to: ' + status);
									}
								}); */
							});
							// Create the search box and link it to the UI element.
							var input = document.getElementById('pac-input');
							var searchBox = new google.maps.places.SearchBox(input);
							map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

							// Bias the SearchBox results towards current map's viewport.
							map.addListener('bounds_changed', function() {
								searchBox.setBounds(map.getBounds());
							});

							searchBox.addListener('places_changed', function() {
								var places = searchBox.getPlaces();
								if (places.length == 0) {
									return;
								}
								// Clear out the old markers.
								markers.forEach(function(marker) {
									marker.setMap(null);
								});
						  
								// For each place, get the icon, name and location.
								var bounds = new google.maps.LatLngBounds();
								places.forEach(function(place) {
										if (!place.geometry) {
										console.log('Returned place contains no geometry');
										return;
									}
									var icon = {
										url: place.icon,
										size: new google.maps.Size(71, 71),
										origin: new google.maps.Point(0, 0),
										anchor: new google.maps.Point(17, 34),
										scaledSize: new google.maps.Size(25, 25)
									};
									clearLocations();
									// Create a marker for each place.							
									var lati = place.geometry.location.lat();
									var lngi = place.geometry.location.lng();
									document.getElementById('bnj_latitude').value = lati.toFixed(5);
									document.getElementById('bnj_longitude').value = lngi.toFixed(5);
								
									markers[0] = new google.maps.Marker({
										draggable: true,
										position: place.geometry.location,
										map: map,
										title: 'Silahkan geser sesuai lokasi kejadian'
									});
									var geocoder = new google.maps.Geocoder;
									var infowindow = new google.maps.InfoWindow;
									google.maps.event.addListener(markers[0], 'dragend', function (event) {
										// get lat/lon of click
										var clickLat = event.latLng.lat();
										var clickLon = event.latLng.lng();

										// show in input box
										document.getElementById('bnj_latitude').value = clickLat.toFixed(5);
										document.getElementById('bnj_longitude').value = clickLon.toFixed(5);
										/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
										geocoder.geocode({'location': pst}, function(results, status) {
											if (status === google.maps.GeocoderStatus.OK) {
											  if (results[1]) {
												infowindow.setContent(results[1].formatted_address);
												infowindow.open(map, markers[0]);
											  } else {
												window.alert('No results found');
											  }
											} else {
											  window.alert('Geocoder failed due to: ' + status);
											}
										  }); */
									});
									if (place.geometry.viewport) {
									  // Only geocodes have viewport.
									  bounds.union(place.geometry.viewport);
									} else {
									  bounds.extend(place.geometry.location);
									}
								});
								map.fitBounds(bounds);
							});
						}
						function clearLocations() {
							info_Window = new google.maps.InfoWindow();
							info_Window.close();
							for (var i = 0; i < markers.length; i++) {
								markers[i].setMap(null);
							}
							markers.length = 0;
						}
					</script>
					<script src=\"https://maps.googleapis.com/maps/api/js?key=".getKeyAPIGoogleMAP()."&libraries=places&callback=initAutocomplete\"
					 async defer></script>
			  </body>
			</html>";
		return $view;
	}
    
	function viewMapBanjarOld($request){
		extract($request,EXTR_SKIP);
		$view = "Lat: <input type=\"text\" id=\"bnj_latitude\" class=\"form-control\" name=\"bnj_latitude\" value=\"".$bnj_latitude."\">
					Lon: <input type=\"text\" id=\"bnj_longitude\" class=\"form-control\" name=\"bnj_longitude\" value=\"".$bnj_longitude."\">
				<!DOCTYPE html>
				<html>
				  <head>
					<title>Simple Map</title>
					<meta name=\"viewport\" content=\"initial-scale=1.0\">
					<meta charset=\"utf-8\">
					<style>
					  /* Always set the map height explicitly to define the size of the div
					   * element that contains the map. */
					  #map {
						height: 100%;
					  }
					  /* Optional: Makes the sample page fill the window. */
					  html {
						height: 100%;
						margin: 0;
						padding: 0;
					  }
					</style>
				  </head>
				  <body style=\"height: 100%;
						margin: 0;
						padding: 0;\">
					<div id=\"map\"></div>

					<script>
					  var map;
					  function initMap() {
						  var myLatLng = {lat: -8.65422, lng: 115.20532};
						  var pst = {lat: -8.65320, lng: 115.20274};
						  var status = '".$latlan."';
						  var latnew = document.getElementById('bnj_latitude').value;
						  var lonnew = document.getElementById('bnj_longitude').value;
						  if(status=='ok'){
							  myLatLng = {lat: parseFloat(latnew), lng: parseFloat(lonnew)};
							  pst = myLatLng;
						  }
						  var map = new google.maps.Map(document.getElementById('map'), {
							center: myLatLng,
							zoom: 14
						  });

						  var marker = new google.maps.Marker({
							draggable: true,
							position: pst,
							map: map,
							title: 'Silahkan geser sesuai lokasi kejadian'

						  });
						  var geocoder = new google.maps.Geocoder;
						var infowindow = new google.maps.InfoWindow;
						  google.maps.event.addListener(marker, 'dragend', function (event) {
							// get lat/lon of click
							var clickLat = event.latLng.lat();
							var clickLon = event.latLng.lng();

							// show in input box
							document.getElementById('bnj_latitude').value = clickLat.toFixed(5);
							document.getElementById('bnj_longitude').value = clickLon.toFixed(5);
							/* var pst = {lat: parseFloat(clickLat), lng: parseFloat(clickLon)};
							geocoder.geocode({'location': pst}, function(results, status) {
								if (status === google.maps.GeocoderStatus.OK) {
								  if (results[1]) {
									infowindow.setContent(results[1].formatted_address);
									infowindow.open(map, marker);
								  } else {
									window.alert('No results found');
								  }
								} else {
								  window.alert('Geocoder failed due to: ' + status);
								}
							  }); */
						});
					}



					</script>
					<script src=\"https://maps.googleapis.com/maps/api/js?key=".getKeyAPIGoogleMAP()."&callback=initMap\"
					async defer></script>
				  </body>
				</html>";
		return $view;
	}
	function changeComboDistrict($request){
		extract($request,EXTR_SKIP);
		include ("thk_ontology.php");
		$cbkab = "<select name=\"Kecamatan\" id=\"Kecamatan\" class=\"form-control comboauto\" style=\"width:100%\" >";
		if ($kode=="tambah")
				$cbkab .="<option value=\"\" selected=\"selected\"> - </option> ";
		//untuk mengambil value kabupaten, bisa digunakan dengan variabel $kab_desc;
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?kecamatan a thk:Kecamatan;
					  thk:isPartOf thk:$kab_desc.
					}
					ORDER BY ?kecamatan"
					);
		$results = array();
		foreach ($result as $row) {
			$kec_desc = explode("#",$row->kecamatan);
			$kec_desc = $kec_desc[1];
			$kec_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $kec_desc);
			$kec_desc = str_replace(' ', '', $kec_desc);
			$cbkab .= "<option value=\"".$kec_desc."\">".$kec_desc."</option>";
		}
		$cbkab .= "</select>
		<script languange=\"javascript\">
					$(document).ready(function() {
						$('.comboauto').select2();
					});
		</script>";
		return $cbkab;
	}
/*Connection to ontology */
	function autoCompleteRegency($request){
		include ("thk_ontology.php");

/*Request regions from THK ontology */
		$result = $sparql->query(
					"SELECT * WHERE {
					  ?kabupaten a thk:Kabupaten.
					}
					ORDER BY ?kabupaten"
					);
		$results = array();
		foreach ($result as $row) {
			$kab_desc = explode("#",$row->kabupaten);
			$kab_desc = $kab_desc[1];
			$kab_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $kab_desc);
			$kab_desc = str_replace(' ', '', $kab_desc);
			$results[] = $kab_desc;
		}
		return json_encode($results);
	}
/*Request kecamatan from THK ontology */
	function autoCompleteDistricts($request){
		include ("thk_ontology.php");

		//untuk mengambil value kabupaten, bisa digunakan dengan variabel $kab_desc;

		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?kecamatan a thk:Kecamatan;
					  thk:isPartOf thk:$kab_desc.
					}
					ORDER BY ?kecamatan"
					);
		$results = array();
		foreach ($result as $row) {
			$kec_desc = explode("#",$row->kecamatan);
			$kec_desc = $kec_desc[1];
			$kec_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $kec_desc);
			$kec_desc = str_replace(' ', '', $kec_desc);
			$results[] = $kec_desc;
		}
		return json_encode($results);

	}
/* Request village from THK ontology */
	function autoCompleteVillage($request){
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?desa a thk:Desa;
					  thk:isPartOf thk:$kec_desc;
						rdfs:label ?desalabel.
					}
					ORDER BY ?desa"
					);
		$results = array();
		foreach ($result as $row) {
			$desa_desc = explode("#",$row->desa);
			$desa_desc = $desa_desc[1];
			$desa_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $desa_desc);
			$desa_desc = str_replace(' ', '', $desa_desc);
			$results[] = $desa_desc;
		}
		return json_encode($results);
	}
/* Request banjars from THK ontology */
	function autoCompleteBanjar($request){
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?banjar a thk:Banjar;
					  thk:isPartOf thk:$desa_desc.
					}
					ORDER BY ?banjar"
					);
		$results = array();
		foreach ($result as $row) {
			$banjar_desc = explode("#",$row->banjar);
			$banjar_desc = $banjar_desc[1];
			$banjar_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $banjar_desc);
			$banjar_desc = str_replace(' ', '', $banjar_desc);
			$results[] = $banjar_desc;
		}
		return json_encode($results);
	}

/*Request kulkul sound from THK Ontology */
function autoCompleteSound($request){
		include ("thk_ontology.php");
		$nama_tempat = str_replace(' ', '', $nama_tempat);
		$result = $sparql->query(
					"SELECT DISTINCT * {
						thk:$nama_tempat thk:hasKulkul ?kulkulName .
						?kulkulName thk:hasSound ?sound .
						?sound a thk:SuaraKulkul ;
						rdfs:label ?soundlabel.
					}
					ORDER BY ?soundlabel"
					);
		$results = array();
		foreach ($result as $row) {
			$sound_desc = parsingString("#",$row->sound,1);
			$sound_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $sound_desc);

			$results[] = $sound_desc;
		}
		return json_encode($results);
	}
/*Request kulkul activity from THK Ontology */
function autoCompleteActivity($request){
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?activity rdf:type/rdfs:subClassOf* thk:Aktivitas.

					}
					ORDER BY ?activity"
					);
		$results = array();
		foreach ($result as $row) {
			$activity_desc = explode("#",$row->activity);
			$activity_desc = $activity_desc[1];
			$activity_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $activity_desc);
			$activity_desc = str_replace(' ', '', $activity_desc);
			$results[] = $activity_desc;
		}
		return json_encode($results);
	}

	/*Request raw material kulkul from THK Ontology */
	function autoCompleteRawMaterial($request){
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?material rdf:type/rdfs:subClassOf* thk:BahanBakuKulkul
					}
					ORDER BY ?material"
					);
		$results = array();
		foreach ($result as $row) {
			$material_desc = explode("#",$row->material);
			$material_desc = $material_desc[1];
			$material_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $material_desc);
			$material_desc = str_replace(' ', '', $material_desc);
			$results[] = $material_desc;
		}
		return json_encode($results);
	}

	/*Request penggange from THK Ontology */
	function autoCompletePakaianKulkul($request){
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT * {
					  ?pakaian rdf:type/rdfs:subClassOf* thk:PakaianKulkul
					}
					ORDER BY ?pakaian"
					);
		$results = array();
		foreach ($result as $row) {
			$pakaian_desc = explode("#",$row->pakaian);
			$pakaian_desc = $pakaian_desc[1];
			$pakaian_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $pakaian_desc);
			$pakaian_desc = str_replace(' ', '', $pakaian_desc);
			$results[] = $pakaian_desc;
		}
		return json_encode($results);
	}
    
    function changeKulkulBanjar($request){
		extract($request,EXTR_SKIP);
        
        for($i=0; $i<$jumlah; $i++){
            $array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
            $array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
            $cbukbanjar = "<select name=\"kulkuldimensionbanjar[".$i."]\" id=\"kulkuldimensionbanjar\" class=\"form-control\">
                        <option value=\"\" selected=\"selected\">-</option>";
            $j = 0;
            foreach($array_ukuran_kulkul as $ukd){
                $cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
                $j++;
            }
            $cbukbanjar .="</select>";
            if($jumlah>1){
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialbanjar[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_banjar[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_banjar[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }else{
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialbanjar[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_banjar[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_banjar[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }
        }
        if($jumlah==1){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==2){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"Berhadapan\" checked>
                                    <img src=\"/images/kulkul/kulkul1.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"Beriringan\">
                                    <img src=\"/images/kulkul/kulkul2.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"Membelakangi\">
                                    <img src=\"/images/kulkul/kulkul3.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"Sejajar\">
                                    <img src=\"/images/kulkul/kulkul4.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==3){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul3_1\" checked>
                                    <img src=\"/images/kulkul/kulkul3_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul3_2\">
                                    <img src=\"/images/kulkul/kulkul3_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul3_3\">
                                    <img src=\"/images/kulkul/kulkul3_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul3_4\">
                                    <img src=\"/images/kulkul/kulkul3_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul3_5\">
                                    <img src=\"/images/kulkul/kulkul3_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==4){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_1\" checked>
                                    <img src=\"/images/kulkul/kulkul4_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_2\">
                                    <img src=\"/images/kulkul/kulkul4_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_3\">
                                    <img src=\"/images/kulkul/kulkul4_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_4\">
                                    <img src=\"/images/kulkul/kulkul4_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_5\">
                                    <img src=\"/images/kulkul/kulkul4_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_6\">
                                    <img src=\"/images/kulkul/kulkul4_6.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_7\">
                                    <img src=\"/images/kulkul/kulkul4_7.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_8\">
                                    <img src=\"/images/kulkul/kulkul4_8.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_9\">
                                    <img src=\"/images/kulkul/kulkul4_9.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"kulkul4_10\">
                                    <img src=\"/images/kulkul/kulkul4_10.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulbanjar[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }
        
        return $view;
    }
    
    function changeKulkulDesa($request){
		extract($request,EXTR_SKIP);
        for($i=0; $i<$jumlah; $i++){
            $array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
            $array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
            $cbukbanjar = "<select name=\"kulkuldimensiondesa[".$i."]\" id=\"kulkuldimensiondesa\" class=\"form-control\">
                        <option value=\"\" selected=\"selected\">-</option>";
            $j = 0;
            foreach($array_ukuran_kulkul as $ukd){
                $cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
                $j++;
            }
            $cbukbanjar .="</select>";
            if($jumlah>1){
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialdesa[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_desa[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_desa[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }else{
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialdesa[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_desa[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_desa[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }
        }
        if($jumlah==1){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==2){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"Berhadapan\" checked>
                                    <img src=\"/images/kulkul/kulkul1.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"Beriringan\">
                                    <img src=\"/images/kulkul/kulkul2.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"Membelakangi\">
                                    <img src=\"/images/kulkul/kulkul3.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"Sejajar\">
                                    <img src=\"/images/kulkul/kulkul4.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==3){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul3_1\" checked>
                                    <img src=\"/images/kulkul/kulkul3_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul3_2\">
                                    <img src=\"/images/kulkul/kulkul3_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul3_3\">
                                    <img src=\"/images/kulkul/kulkul3_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul3_4\">
                                    <img src=\"/images/kulkul/kulkul3_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul3_5\">
                                    <img src=\"/images/kulkul/kulkul3_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==4){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_1\" checked>
                                    <img src=\"/images/kulkul/kulkul4_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_2\">
                                    <img src=\"/images/kulkul/kulkul4_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_3\">
                                    <img src=\"/images/kulkul/kulkul4_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_4\">
                                    <img src=\"/images/kulkul/kulkul4_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_5\">
                                    <img src=\"/images/kulkul/kulkul4_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_6\">
                                    <img src=\"/images/kulkul/kulkul4_6.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_7\">
                                    <img src=\"/images/kulkul/kulkul4_7.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_8\">
                                    <img src=\"/images/kulkul/kulkul4_8.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_9\">
                                    <img src=\"/images/kulkul/kulkul4_9.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"kulkul4_10\">
                                    <img src=\"/images/kulkul/kulkul4_10.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkuldesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }
        
        return $view;
    }

    function changeKulkulPuraDesa($request){
		extract($request,EXTR_SKIP);
        
        for($i=0; $i<$jumlah; $i++){
            $array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
            $array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
            $cbukbanjar = "<select name=\"kulkuldimensionpuradesa[".$i."]\" id=\"kulkuldimensionpuradesa\" class=\"form-control\">
                        <option value=\"\" selected=\"selected\">-</option>";
            $j = 0;
            foreach($array_ukuran_kulkul as $ukd){
                $cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
                $j++;
            }
            $cbukbanjar .="</select>";
            if($jumlah>1){
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpuradesa[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradesa[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradesa[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }else{
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpuradesa[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradesa[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradesa[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }
        }
        if($jumlah==1){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==2){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"Berhadapan\" checked>
                                    <img src=\"/images/kulkul/kulkul1.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"Beriringan\">
                                    <img src=\"/images/kulkul/kulkul2.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"Membelakangi\">
                                    <img src=\"/images/kulkul/kulkul3.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"Sejajar\">
                                    <img src=\"/images/kulkul/kulkul4.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==3){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul3_1\" checked>
                                    <img src=\"/images/kulkul/kulkul3_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul3_2\">
                                    <img src=\"/images/kulkul/kulkul3_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul3_3\">
                                    <img src=\"/images/kulkul/kulkul3_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul3_4\">
                                    <img src=\"/images/kulkul/kulkul3_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul3_5\">
                                    <img src=\"/images/kulkul/kulkul3_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==4){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_1\" checked>
                                    <img src=\"/images/kulkul/kulkul4_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_2\">
                                    <img src=\"/images/kulkul/kulkul4_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_3\">
                                    <img src=\"/images/kulkul/kulkul4_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_4\">
                                    <img src=\"/images/kulkul/kulkul4_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_5\">
                                    <img src=\"/images/kulkul/kulkul4_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_6\">
                                    <img src=\"/images/kulkul/kulkul4_6.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_7\">
                                    <img src=\"/images/kulkul/kulkul4_7.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_8\">
                                    <img src=\"/images/kulkul/kulkul4_8.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_9\">
                                    <img src=\"/images/kulkul/kulkul4_9.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"kulkul4_10\">
                                    <img src=\"/images/kulkul/kulkul4_10.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradesa[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }
        
        return $view;
    }

    function changeKulkulPuraPuseh($request){
		extract($request,EXTR_SKIP);
        for($i=0; $i<$jumlah; $i++){
            $array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
            $array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
            $cbukbanjar = "<select name=\"kulkuldimensionpurapuseh[".$i."]\" id=\"kulkuldimensionpurapuseh\" class=\"form-control\">
                        <option value=\"\" selected=\"selected\">-</option>";
            $j = 0;
            foreach($array_ukuran_kulkul as $ukd){
                $cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
                $j++;
            }
            $cbukbanjar .="</select>";
            if($jumlah>1){
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpurapuseh[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_purapuseh[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_purapuseh[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }else{
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpurapuseh[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_purapuseh[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_purapuseh[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }
        }
        if($jumlah==1){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==2){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"Berhadapan\" checked>
                                    <img src=\"/images/kulkul/kulkul1.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"Beriringan\">
                                    <img src=\"/images/kulkul/kulkul2.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"Membelakangi\">
                                    <img src=\"/images/kulkul/kulkul3.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"Sejajar\">
                                    <img src=\"/images/kulkul/kulkul4.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==3){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul3_1\" checked>
                                    <img src=\"/images/kulkul/kulkul3_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul3_2\">
                                    <img src=\"/images/kulkul/kulkul3_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul3_3\">
                                    <img src=\"/images/kulkul/kulkul3_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul3_4\">
                                    <img src=\"/images/kulkul/kulkul3_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul3_5\">
                                    <img src=\"/images/kulkul/kulkul3_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==4){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_1\" checked>
                                    <img src=\"/images/kulkul/kulkul4_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_2\">
                                    <img src=\"/images/kulkul/kulkul4_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_3\">
                                    <img src=\"/images/kulkul/kulkul4_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_4\">
                                    <img src=\"/images/kulkul/kulkul4_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_5\">
                                    <img src=\"/images/kulkul/kulkul4_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_6\">
                                    <img src=\"/images/kulkul/kulkul4_6.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_7\">
                                    <img src=\"/images/kulkul/kulkul4_7.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_8\">
                                    <img src=\"/images/kulkul/kulkul4_8.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_9\">
                                    <img src=\"/images/kulkul/kulkul4_9.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"kulkul4_10\">
                                    <img src=\"/images/kulkul/kulkul4_10.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpurapuseh[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }
        
        return $view;
    }

    function changeKulkulPuraDalem($request){
		extract($request,EXTR_SKIP);
        for($i=0; $i<$jumlah; $i++){
            $array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
            $array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
            $cbukbanjar = "<select name=\"kulkuldimensionpuradalem[".$i."]\" id=\"kulkuldimensionpuradalem\" class=\"form-control\">
                        <option value=\"\" selected=\"selected\">-</option>";
            $j = 0;
            foreach($array_ukuran_kulkul as $ukd){
                $cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
                $j++;
            }
            $cbukbanjar .="</select>";
            if($jumlah>1){
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpuradalem[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradalem[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradalem[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL." ".($i+1)."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }else{
                $view .= "<div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                            <div class=\"col-sm-4\">
                                <input type=\"text\" name=\"rawmaterialpuradalem[".$i."]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                            </div>
                            <div class=\"col-md-2\">
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradalem[".$i."]\" id=\"optionsRadios1\" value=\"@id\" >
                                        ".ID_."
                                    </label>
                                </div>
                                <div class=\"radio-inline\">
                                    <label>
                                        <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradalem[".$i."]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                        ".BAN."
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                            <div class=\"col-sm-4\">
                                ".$cbukbanjar."
                            </div>
                        </div>";   
            }
        }
        if($jumlah==1){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==2){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"Berhadapan\" checked>
                                    <img src=\"/images/kulkul/kulkul1.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"Beriringan\">
                                    <img src=\"/images/kulkul/kulkul2.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"Membelakangi\">
                                    <img src=\"/images/kulkul/kulkul3.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"Sejajar\">
                                    <img src=\"/images/kulkul/kulkul4.png\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==3){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul3_1\" checked>
                                    <img src=\"/images/kulkul/kulkul3_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul3_2\">
                                    <img src=\"/images/kulkul/kulkul3_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul3_3\">
                                    <img src=\"/images/kulkul/kulkul3_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul3_4\">
                                    <img src=\"/images/kulkul/kulkul3_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul3_5\">
                                    <img src=\"/images/kulkul/kulkul3_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }elseif($jumlah==4){
            $view .= "<div class=\"form-group\">
                        <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                        <div class=\"col-md-6\">
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_1\" checked>
                                    <img src=\"/images/kulkul/kulkul4_1.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_2\">
                                    <img src=\"/images/kulkul/kulkul4_2.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_3\">
                                    <img src=\"/images/kulkul/kulkul4_3.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_4\">
                                    <img src=\"/images/kulkul/kulkul4_4.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_5\">
                                    <img src=\"/images/kulkul/kulkul4_5.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_6\">
                                    <img src=\"/images/kulkul/kulkul4_6.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_7\">
                                    <img src=\"/images/kulkul/kulkul4_7.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_8\">
                                    <img src=\"/images/kulkul/kulkul4_8.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_9\">
                                    <img src=\"/images/kulkul/kulkul4_9.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"kulkul4_10\">
                                    <img src=\"/images/kulkul/kulkul4_10.jpg\" class=\"img img-responsive\">
                                </label>
                            </div>
                            <div class=\"radio-inline\">
                                <label>
                                    <input type=\"radio\" name=\"directionkulkulpuradalem[".$i."]\" value=\"TidakTau\">
                                    Tidak Tau
                                </label>
                            </div>
                        </div>
                    </div>";
        }
        
        return $view;
    }

	function viewData($request){
		extract($request,EXTR_SKIP);
        //get uid
		$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);
		$uid = $du["uname"];
        
		include ("thk_ontology.php");
		$result = $sparql->query(
					"SELECT DISTINCT ?kulkulNameOnly ?jumlahkulkul ?dimension ?dimension02 ?rawMaterial ?pengangge ?imageUrl ?direction
										{
										thk:$uid a thk:uid;
											thk:hasKulkul ?kulkulName.
					OPTIONAL		{?kulkulName rdfs:label ?kulkulNameOnly.}
					OPTIONAL	{	?kulkulName thk:numberKulkul ?jumlahkulkul .}
					OPTIONAL	{	?kulkulName thk:hasDimension ?dimension .
										?dimension rdfs:label ?dimension02 .}
					OPTIONAL	{	?kulkulName thk:hasRawMaterial ?rawMaterial. }
					OPTIONAL	{	?kulkulName thk:hasPengangge ?pengangge. }
					OPTIONAL	{ ?kulkulName thk:hasDirection ?direction .}
													}");
		$results = array();
        foreach($results as $row){
            $view .= "1";
        }
		return $view;
	}

	function formSearch($request){
		extract($request,EXTR_SKIP);
		$view ="";
		return $view;
	}
	function viewFormAdd($request){
		extract($request,EXTR_SKIP);
		include ("thk_ontology.php");

		$array_ukuran_kulkul = array("170 - 250 cm","150 - 170 cm","130 - 150 cm","120 - 130 cm","100 - 110 cm","50 - 100 cm","40 - 50 cm");
		$array_value_ukuran_kulkul = array("UkuranKulkul1","UkuranKulkul2","UkuranKulkul3","UkuranKulkul4","UkuranKulkul5","UkuranKulkul6","UkuranKulkul7");
		$j = 0;
		$cbukdesa = "<select name=\"kulkuldimensiondesa[0]\" id=\"kulkuldimensiondesa\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		foreach($array_ukuran_kulkul as $ukd){
			$cbukdesa .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
			$j++;
		}
		$cbukdesa .="</select>";

		$cbukbanjar = "<select name=\"kulkuldimensionbanjar[0]\" id=\"kulkuldimensionbanjar\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_ukuran_kulkul as $ukd){
			$cbukbanjar .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
			$j++;
		}
		$cbukbanjar .="</select>";

		$cbukpuradesa = "<select name=\"kulkuldimensionpuradesa[0]\" id=\"kulkuldimensionpuradesa\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_ukuran_kulkul as $ukd){
			$cbukpuradesa .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
			$j++;
		}
		$cbukpuradesa .="</select>";

		$cbukpurapuseh = "<select name=\"kulkuldimensionpurapuseh[0]\" id=\"kulkuldimensionpurapuseh\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_ukuran_kulkul as $ukd){
			$cbukpurapuseh .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
			$j++;
		}
		$cbukpurapuseh .="</select>";

		$cbukpuradalem = "<select name=\"kulkuldimensionpuradalem[0]\" id=\"kulkuldimensionpuradalem\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_ukuran_kulkul as $ukd){
			$cbukpuradalem .= "<option value=\"".$array_value_ukuran_kulkul[$j]."\">".$ukd."</option>";
			$j++;
		}
		$cbukpuradalem .="</select>";

		$array_kegiatan = array("Bencana","Bencana Alam","Bencana Non Alam","Bencana Sosial","Kegiatan Sosial","Upacara","Bhuta Yadnya","Dewa Yadnya","Manusa Yadnya","Pitra Yadnya","Rsi Yadnya");
		$arrayvalue_kegiatan = array("Bencana","BencanaAlam","BencanaNonAlam","BencanaSosial","KegiatanSosial","Upacara","BhutaYadnya","DewaYadnya","ManusaYadnya","PitraYadnya","RsiYadnya");
		$cbkegiatanbanjar = "<select name=\"aktivitasbanjar[0][0]\" id=\"aktivitas\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatanbanjar .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanbanjar .="</select>";

		$j = 0;
		$cbkegiatandesa = "<select name=\"aktivitasdesa[0][0]\" id=\"cbkegiatandesa\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		foreach($array_kegiatan as $kgt){
			$cbkegiatandesa .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatandesa .="</select>";

		$j = 0;
		$cbkegiatanpuradesa = "<select name=\"aktivitaspuradesa[0][0]\" id=\"cbkegiatanpuradesa\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpuradesa .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
		}
		$cbkegiatanpuradesa .="</select>";

		$j = 0;
		$cbkegiatanpurapuseh = "<select name=\"aktivitaspurapuseh[0][0]\" id=\"cbkegiatanpurapuseh\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpurapuseh .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanpurapuseh .="</select>";

		$j = 0;
		$cbkegiatanpuradalem = "<select name=\"aktivitaspuradalem[0][0]\" id=\"cbkegiatanpuradalem\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpuradalem .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanpuradalem .="</select>";

		//combo box kabupaten
		$cbkab = "<select name=\"Kabupaten\" id=\"Kabupaten\" class=\"form-control comboauto\" onchange=\"changeComboDistrict('','tambah');\" style=\"width:100%\" >
					<option value=\"\" selected=\"selected\">-</option>";
		/*Request regions from THK ontology */
		$result = $sparql->query(
					"SELECT * WHERE {
					  ?kabupaten a thk:Kabupaten.
					}
					ORDER BY ?kabupaten"
					);
		$results = array();
		foreach ($result as $row) {
			$kab_desc = explode("#",$row->kabupaten);
			$kab_desc = $kab_desc[1];
			$kab_desc = preg_replace('/(?<!\ )[A-Z]/', ' $0', $kab_desc);
			$kab_desc = str_replace(' ', '', $kab_desc);
			$cbkab .= "<option value=\"".$kab_desc."\">".$kab_desc."</option>";
		}
		$cbkab .="</select>";

		$view = "<form name=\"FormAdd\" id=\"FormAdd\" role=\"form\" class=\"form-horizontal\" enctype=\"multipart/form-data\">
					<div class=\"row\">
						<div class=\"col-md-10 col-md-offset-1\">
							<div class=\"panel panel-default\">
								<div class=\"panel-body\">
									<ul id=\"myTab\" class=\"nav nav-tabs\" role=\"tablist\">
										<li class=\"active\"><a href=\"#tabs-1\" role=\"tab\" data-toggle=\"tab\">".TEMPAT."</a></li>
										<li><a href=\"#tabs-2\"  role=\"tab\" data-toggle=\"tab\">".KULKUL_BANJAR."</a></li>
										<li><a href=\"#tabs-3\"  role=\"tab\" data-toggle=\"tab\">".KULKUL_DESA."</a></li>
										<li><a href=\"#tabs-4\" role=\"tab\" data-toggle=\"tab\">".KULKUL_PURA_DESA."</a></li>
								        <li><a href=\"#tabs-5\" role=\"tab\" data-toggle=\"tab\">".KULKUL_PURA_PUSEH."</a></li>
								        <li><a href=\"#tabs-6\" role=\"tab\" data-toggle=\"tab\">".KULKUL_PURA_DALEM."</a></li>
										  
									</ul>
									<div class=\"tab-content\">
										<div class=\"tab-pane active\" id=\"tabs-1\"> <br />
											<div class=\"alert alert-info\" role=\"alert\" style=\"font-size:18px; font-weight:bold;\">".TEMPAT."</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KABUPATEN."</label>
												<div class=\"col-sm-9\">
													".$cbkab."
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KECAMATAN."</label>
												<div class=\"col-sm-9\">
													<div id=\"divdistrict\">
														<select name=\"Kecamatan\" id=\"Kecamatan\" class=\"form-control comboauto\" style=\"width:100%\" >
															<option value=\"\" selected=\"selected\">-</option>
														</select>
													</div>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".DESA." Adat</label>
												<div class=\"col-sm-7\">
													<input type=\"text\" id=\"village\" name=\"Desa\" class=\"form-control autocompletevillage\" onkeydown=\"autoCompleteVillage();\" onchange=\"fillPura();\"/>
												</div>
												<div class=\"col-sm-1\">
													<a href=\"javascript:void(0);\" onclick=\"viewFormMapsDesa();\" title=\"Show Map\">
														<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-map-marker\"></i> Map Desa Adat</button></a>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\"></label>
												<div class=\"col-sm-3\">
													<input type=\"text\" id=\"desa_latitude\" name=\"ds_latitude\" class=\"form-control\" placeholder=\"".LATITUDE_DESA."\"/>
												</div>
												<div class=\"col-sm-4\">
													<input type=\"text\" id=\"desa_longitude\" name=\"ds_longitude\" class=\"form-control\" placeholder=\"".LONGITUDE_DESA."\"/>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".BANJAR." Adat</label>
												<div class=\"col-sm-7\">
													<input type=\"text\" id=\"banjar\" name=\"Banjar\" class=\"form-control autocompletebanjar\" onkeydown=\"autoCompleteBanjar();\"/>
												</div>
												<div class=\"col-sm-1\">
													<a href=\"javascript:void(0);\" onclick=\"viewFormMapsBanjar();\" title=\"Show Map\">
														<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-map-marker\"></i> Map Banjar Adat</button></a>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\"></label>
												<div class=\"col-sm-3\">
													<input type=\"text\" id=\"banjar_latitude\" name=\"bnj_latitude\" class=\"form-control\" placeholder=\"".LATITUDE_BANJAR."\"/>
												</div>
												<div class=\"col-sm-4\">
													<input type=\"text\" id=\"banjar_longitude\" name=\"bnj_longitude\" class=\"form-control\" placeholder=\"".LONGITUDE_BANJAR."\"/>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".PURA_KHAYANGAN_TIGA."</label>
												<div class=\"col-sm-9\">
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-1\"></label>
												<label class=\"col-sm-2 control-label\">".PURA_DESA."</label>
												<div class=\"col-sm-9\">
													<input type=\"text\" name=\"PuraDesa\" id=\"pura_desa\" class=\"form-control\"/>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-1\"></label>
												<label class=\"col-sm-2 control-label\">".PURA_PUSEH."</label>
												<div class=\"col-sm-9\">
													<input type=\"text\" name=\"PuraPuseh\" id=\"pura_puseh\" class=\"form-control\"/>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-1\"></label>
												<label class=\"col-sm-2 control-label\">".PURA_DALEM."</label>
												<div class=\"col-sm-9\">
													<div class=\"input-group\">
														<input type=\"text\" name=\"PuraDalem[]\" id=\"pura_dalem\" class=\"form-control\"/>
														<span class=\"input-group-addon\">
															<a href=\"javascript:void(0);\" onclick=\"addPuraDalem();\" title=\"Tambah Pura Dalem\"><i class=\"fa fa-plus-circle\"></i></a>
														</span>
													</div>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-1\"></label>
												<label class=\"col-sm-2 control-label\"></label>
												<div class=\"col-sm-9\">
													<table id=\"add_pura_dalem\" width=\"100%\">
														<tr>
															<td></td>
														</tr>
													</table>
												</div>
											</div>
											<hr>
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"?page=".$page."&language=".$language."\" class=\"btn btn-default\" style=\"margin-bottom: 5px;\"><i class=\"fa fa-arrow-circle-left \"></i> ".BACK."</a> 
												    <a href=\"#tabs-2\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-2]').tab('show');\" class=\"btn btn-success\"><b>".NEXT."</b> <i class=\"fa fa-arrow-circle-right\"></i></button></a>
												</div>
                                            </div>
										</div>
										<div class=\"tab-pane\" id=\"tabs-2\"> <br />
											<div class=\"alert alert-info\" role=\"alert\" style=\"font-size:18px; font-weight:bold;\">".KULKUL_DESA_BANJAR."</div>
											<!-- kulkul banjar -->
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".JUMLAH_KULKUL."</label>
												<div class=\"col-sm-2\">
													<input type=\"number\" id=\"jumlahkulkulbanjar\" name=\"jumlahkulkulbanjar\" class=\"form-control\" value=\"1\" min=\"1\" max=\"4\" onchange=\"changeKulkulBanjar();\" />
												</div>
											</div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".PAKAIAN_KULKUL."</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"pakaiankulkulbanjar\" class=\"form-control autocompletepakaiankulkul\" onkeydown=\"autoCompletePakaianKulkul();\"/>
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" name=\"Langbanjar\" title=\"Indonesian Language\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" name=\"Langbanjar\" title=\"Balinese Language\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <div id=\"divkulkulbanjar\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                                                    <div class=\"col-sm-4\">
                                                        <input type=\"text\" name=\"rawmaterialbanjar[0]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_banjar[0]\" id=\"optionsRadios1\" value=\"@id\" >
                                                            ".ID_."
                                                          </label>
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" title=\"Balinese Language\" name=\"bb_banjar[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                            ".BAN."
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                                                    <div class=\"col-sm-4\">
                                                        ".$cbukbanjar."
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                                                    <div class=\"col-md-6\">
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" name=\"directionkulkulbanjar[0]\" value=\"TidakTau\" checked>
                                                            Tidak Tau
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".IMAGE."</label>
												<div class=\"col-sm-5\">
													<table id=\"gambar_kulkul_banjar\" width=\"100%\">
														<tr>
															<td>
																<input type=\"file\" name=\"img_kulkul_banjar[]\" />
																<input type=\"hidden\" name=\"kulkulbanjar[]\" value=\"1\"/>
															</td>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addGambarKulkulBanjar();\" title=\"Tambah Gambar Kulkul Banjar\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".SUARA_KULKUL_BANJAR."</label>
											     <button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"addSuaraKulkulBanjar()\"><i class=\"fa fa-plus-circle\"></i></button>
                                                 <input type=\"hidden\" id=\"jumlahinputkulkulbanjar\" value=\"1\">
                                            </div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SUARA." (1)</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"BanjarSound[0]\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('banjar');\" />
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suarabanjar[0]\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarabanjar[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
											<div class=\"form-group\">
                                                <input type=\"hidden\" id=\"kb_index_0\" value=\"0\">
												<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>
												<div class=\"col-sm-4\">
													<table id=\"kegiatan_kulkul_banjar_0\" width=\"100%\">
														<tr id=\"kulkulbanjar_tr_0\">
															<td>
																<div class=\"input-group\">
																	<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanbanjar[0][0]\">
																	<span class=\"input-group-addon\">
																		<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulBanjar('0');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-3\">
													<table id=\"kegiatan_kulkul_banjar1_0\" width=\"100%\">
														<tr>
															<td>
																".$cbkegiatanbanjar."
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-2\">
													<table id=\"kegiatan_kulkul_banjar2_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanbanjar[0][0]\" id=\"optionsRadios1\" value=\"@id\" >
																	".ID_."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanbanjar[0][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
																	".BAN."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
                                            <input type=\"hidden\" id=\"sb_index_0'\" value=\"0\">
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SOUND."</label>
												<div class=\"col-sm-3\">
													<table id=\"sound_kulkul_banjar_0\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"sound_kulkulbanjar[0][0]\" />
															<input type=\"hidden\" name=\"soundbanjarhidden[0][0]\" value=\"1\"/></td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-3\">
													<table id=\"sound_kulkul_banjar_jenis_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypeBanjar[0][0]\" id=\"optionsRadios1\" value=\"Actual\" >
																	".ACTUAL."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypeBanjar[0][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>
																	".SIMULATION."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-1\">
													<table id=\"action_add_kulkul_banjar_0\" width=\"100%\">
														<tr>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulBanjar(0);\" title=\"File Suara\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
                                            <hr>
                                            <div id=\"divinputsuarakulkulbanjar\"></div>
                                            
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"#tabs-1\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-1]').tab('show');\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-left\"></i> <b>".BACK."</b></button></a> 
												    <a href=\"#tabs-3\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-3]').tab('show');\" class=\"btn btn-success\"><b>".NEXT."</b> <i class=\"fa fa-arrow-circle-right\"></i></button></a>
												</div>
                                            </div>
										</div>
										<div class=\"tab-pane\" id=\"tabs-3\"> <br />
											<div class=\"alert alert-info\" role=\"alert\" style=\"font-size:18px; font-weight:bold;\">".KULKUL_DESA."</div>
											<!-- kulkul desa -->
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".JUMLAH_KULKUL."</label>
												<div class=\"col-sm-2\">
													<input type=\"number\" id=\"jumlahkulkuldesa\" name=\"jumlahkulkuldesa\" class=\"form-control\" value=\"1\" min=\"1\" max=\"4\" onchange=\"changeKulkulDesa();\"/>
												</div>
											</div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".PAKAIAN_KULKUL."</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"pakaiankulkuldesa\" class=\"form-control autocompletepakaiankulkul\" onkeydown=\"autoCompletePakaianKulkul();\"/>
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Indonesian Language\" name=\"Langdesa\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Langdesa\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <div id=\"divkulkuldesa\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                                                    <div class=\"col-sm-4\">
                                                        <input type=\"text\" name=\"rawmaterialdesa[0]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_desa[0]\" id=\"optionsRadios1\" value=\"@id\" >
                                                            ".ID_."
                                                          </label>
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" title=\"Balinese Language\" name=\"bb_desa[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                            ".BAN."
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                                                    <div class=\"col-sm-4\">
                                                        ".$cbukdesa."
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                                                    <div class=\"col-md-6\">
                                                        <div class=\"radio-inline\">
                                                          <label>
                                                            <input type=\"radio\" name=\"directionkulkuldesa[0]\" value=\"TidakTau\" checked>
                                                            Tidak Tau
                                                          </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".IMAGE."</label>
												<div class=\"col-sm-5\">
													<table id=\"gambar_kulkul_desa\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"img_kulkul_desa[]\" />
																<input type=\"hidden\" name=\"kulkuldesa[]\" value=\"1\"/>
															</td>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addGambarKulkulDesa();\" title=\"Tambah Gambar Kulkul Desa\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
                                            <div class=\"form-group\">
												<label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".SUARA_KULKUL_DESA."</label>
                                                <button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"addSuaraKulkulDesa()\"><i class=\"fa fa-plus-circle\"></i></button>
                                                <input type=\"hidden\" id=\"jumlahinputkulkuldesa\" value=\"1\">
                                            </div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SUARA." (1)</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"DesaSound[0]\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('desa');\" />
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Indonesian Language\" name=\"Lang_suaradesa[0]\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suaradesa[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <input type=\"hidden\" id=\"kd_index_0\" value=\"0\">
                                            <input type=\"hidden\" id=\"sd_index_0'\" value=\"0\">
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>
												<div class=\"col-sm-4\">
													<table id=\"kegiatan_kulkul_desa_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"input-group\">
																	<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatandesa[0][0]\">
																	<span class=\"input-group-addon\">
																		<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulDesa(0);\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-3\">
													<table id=\"kegiatan_kulkul_desa1_0\" width=\"100%\">
														<tr>
															<td>
																".$cbkegiatandesa."
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-2\">
													<table id=\"kegiatan_kulkul_desa2_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatandesa[0][0]\" id=\"optionsRadios1\" value=\"@id\" >
																	".ID_."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatandesa[0][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
																	".BAN."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SOUND."</label>
												<div class=\"col-sm-3\">
													<table id=\"sound_kulkul_desa_0\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"sound_kulkuldesa[0][0]\" />
															<input type=\"hidden\" name=\"sounddesahidden[0][0]\" value=\"1\"/></td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-3\">
													<table id=\"sound_kulkul_desa_jenis_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypeDesa[0][0]\" id=\"optionsRadios1\" value=\"Actual\" >
																	".ACTUAL."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypeDesa[0][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>
																	".SIMULATION."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-1\">
													<table id=\"action_add_kulkul_desa_0\" width=\"100%\">
														<tr>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulDesa(0);\" title=\"File Suara\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
                                            </div><hr>
                                            <div id=\"divinputsuarakulkuldesa\"></div>
											
                                            
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"#tabs-2\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-2]').tab('show');\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-left\"></i> <b>".BACK."</b></button></a> 
												    <a href=\"#tabs-4\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-4]').tab('show');\" class=\"btn btn-success\"><b>".NEXT."</b> <i class=\"fa fa-arrow-circle-right\"></i></button></a>
												</div>
                                            </div>
										</div>

                                        <div class=\"tab-pane\" id=\"tabs-4\"> <br />
                                            <!-- kulkul pura desa -->
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".KULKUL_PURA_DESA."</label>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".JUMLAH_KULKUL."</label>
                                                <div class=\"col-sm-2\">
                                                    <input type=\"number\" id=\"jumlahkulkulpuradesa\" name=\"jumlahkulkulpuradesa\" class=\"form-control\" value=\"1\" min=\"1\" max=\"4\" onchange=\"changeKulkulPuraDesa();\"/>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".PAKAIAN_KULKUL."</label>
                                                <div class=\"col-sm-4\">
                                                    <input type=\"text\" name=\"pakaiankulkulpuradesa\" class=\"form-control autocompletepakaiankulkul\" onkeydown=\"autoCompletePakaianKulkul();\"/>
                                                </div>
                                                <div class=\"col-md-2\">
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"Langpuradesa\" id=\"optionsRadios1\" value=\"@id\" >
                                                        ".ID_."
                                                    </label>
                                                    </div>
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Balinese Language\" name=\"Langpuradesa\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                        ".BAN."
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id=\"divkulkulpuradesa\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                                                    <div class=\"col-sm-4\">
                                                        <input type=\"text\" name=\"rawmaterialpuradesa[0]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradesa[0]\" id=\"optionsRadios1\" value=\"@id\" >
                                                            ".ID_."
                                                        </label>
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradesa[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                            ".BAN."
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                                                    <div class=\"col-sm-4\">
                                                        ".$cbukpuradesa."
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                                                    <div class=\"col-md-6\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" name=\"directionkulkulpuradesa[0]\" value=\"TidakTau\" checked>
                                                            Tidak Tau
                                                        </label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".IMAGE."</label>
                                                <div class=\"col-sm-5\">
                                                    <table id=\"gambar_kulkul_pura_desa\" width=\"100%\">
                                                        <tr>
                                                            <td><input type=\"file\" name=\"img_kulkul_pura_desa[]\" />
                                                                <input type=\"hidden\" name=\"kulkulpuradesa[]\" value=\"1\"/>
                                                            </td>
                                                            <td>
                                                                <a href=\"javascript:void(0);\" onclick=\"addGambarKulkulPuraDesa();\" title=\"Tambah Gambar Kulkul Pura Desa\">
                                                                <button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <br />
                                            <div class=\"form-group\">
												<label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".SUARA_KULKUL_PURA_DESA."</label>
                                                <button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"addSuaraKulkulPuraDesa()\"><i class=\"fa fa-plus-circle\"></i></button>
                                                 <input type=\"hidden\" id=\"jumlahinputkulkulpuradesa\" value=\"1\">
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SUARA." (1)</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"PuraDesaSound[0]\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('puradesa');\" />
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Indonesian Language\" name=\"Lang_suarapuradesa[0]\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapuradesa[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <input type=\"hidden\" id=\"kpd_index_0\" value=\"0\">
                                            <input type=\"hidden\" id=\"spd_index_0'\" value=\"0\">
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>
												<div class=\"col-sm-4\">
													<table id=\"kegiatan_kulkul_pura_desa_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"input-group\">
																	<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradesa[0][0]\">
																	<span class=\"input-group-addon\">
																		<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraDesa(0);\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-3\">
													<table id=\"kegiatan_kulkul_puradesa1_0\" width=\"100%\">
														<tr>
															<td>
																".$cbkegiatanpuradesa."
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-2\">
													<table id=\"kegiatan_kulkul_puradesa2_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradesa[0][0]\" id=\"optionsRadios1\" value=\"@id\" >
																	".ID_."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradesa[0][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
																	".BAN."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SOUND."</label>
												<div class=\"col-sm-3\">
													<table id=\"sound_kulkul_pura_desa_0\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"sound_kulkulpuradesa[0][0]\" /><input type=\"hidden\" name=\"soundpuradesahidden[0][0]\" value=\"1\"/></td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-3\">
													<table id=\"sound_kulkul_pura_desa_jenis_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraDesa[0][0]\" id=\"optionsRadios1\" value=\"Actual\" >
																	".ACTUAL."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraDesa[0][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>
																	".SIMULATION."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-1\">
													<table id=\"action_add_kulkul_pura_desa_0\" width=\"100%\">
														<tr>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraDesa(0);\" title=\"File Suara\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div><hr>
                                            <div id=\"divinputsuarakulkulpuradesa\"></div>
                                            
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"#tabs-3\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-3]').tab('show');\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-left\"></i> <b>".BACK."</b></button></a> 
												    <a href=\"#tabs-5\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-5]').tab('show');\" class=\"btn btn-success\"><b>".NEXT."</b> <i class=\"fa fa-arrow-circle-right\"></i></button></a>
												</div>
                                            </div>
										</div>

                                        <div class=\"tab-pane\" id=\"tabs-5\"> <br />
                                            <!-- kulkul pura puseh -->
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".KULKUL_PURA_PUSEH."</label>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".JUMLAH_KULKUL."</label>
                                                <div class=\"col-sm-2\">
                                                    <input type=\"number\" id=\"jumlahkulkulpurapuseh\" name=\"jumlahkulkulpurapuseh\" class=\"form-control\" value=\"1\" min=\"1\" max=\"4\" onchange=\"changeKulkulPuraPuseh();\"/>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".PAKAIAN_KULKUL."</label>
                                                <div class=\"col-sm-4\">
                                                    <input type=\"text\" name=\"pakaiankulkulpurapuseh\" class=\"form-control autocompletepakaiankulkul\" onkeydown=\"autoCompletePakaianKulkul();\"/>
                                                </div>
                                                <div class=\"col-md-2\">
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"Langpurapuseh\" id=\"optionsRadios1\" value=\"@id\" >
                                                        ".ID_."
                                                    </label>
                                                    </div>
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Balinese Language\" name=\"Langpurapuseh\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                        ".BAN."
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id=\"divkulkulpurapuseh\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                                                    <div class=\"col-sm-4\">
                                                        <input type=\"text\" name=\"rawmaterialpurapuseh[0]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_purapuseh[0]\" id=\"optionsRadios1\" value=\"@id\" >
                                                            ".ID_."
                                                        </label>
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Balinese Language\" name=\"bb_purapuseh[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                            ".BAN."
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                                                    <div class=\"col-sm-4\">
                                                        ".$cbukpurapuseh."
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                                                    <div class=\"col-md-6\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" name=\"directionkulkulpurapuseh[0]\" value=\"TidakTau\" checked>
                                                            Tidak Tau
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".IMAGE."</label>
                                                <div class=\"col-sm-5\">
                                                    <table id=\"gambar_kulkul_pura_puseh\" width=\"100%\">
                                                        <tr>
                                                            <td><input type=\"file\" name=\"img_kulkul_pura_puseh[]\" />
                                                                <input type=\"hidden\" name=\"kulkulpurapuseh[]\" value=\"1\"/>
                                                            </td>
                                                            <td>
                                                                <a href=\"javascript:void(0);\" onclick=\"addGambarKulkulPuraPuseh();\" title=\"Tambah Gambar Kulkul Pura Puseh\">
                                                                <button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <br />
											<div class=\"form-group\">
												<label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".SUARA_KULKUL_PURA_PUSEH."</label>
											     <button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"addSuaraKulkulPuraPuseh()\"><i class=\"fa fa-plus-circle\"></i></button>
                                                 <input type=\"hidden\" id=\"jumlahinputkulkulpurapuseh\" value=\"1\">
                                            </div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SUARA." (1)</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"PuraPusehSound[0]\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('purapuseh');\" />
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Indonesian Language\" name=\"Lang_suarapurapuseh[0]\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapurapuseh[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <input type=\"hidden\" id=\"kpp_index_0\" value=\"0\">
                                            <input type=\"hidden\" id=\"spp_index_0'\" value=\"0\">
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>
												<div class=\"col-sm-4\">
													<table id=\"kegiatan_kulkul_pura_puseh_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"input-group\">
																	<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpurapuseh[0][0]\">
																	<span class=\"input-group-addon\">
																		<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraPuseh(0);\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-3\">
													<table id=\"kegiatan_kulkul_purapuseh1_0\" width=\"100%\">
														<tr>
															<td>
																".$cbkegiatanpurapuseh."
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-2\">
													<table id=\"kegiatan_kulkul_purapuseh2_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpurapuseh[0][0]\" id=\"optionsRadios1\" value=\"@id\" >
																	".ID_."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpurapuseh[0][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
																	".BAN."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SOUND."</label>
												<div class=\"col-sm-3\">
													<table id=\"sound_kulkul_pura_puseh_0\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"sound_kulkulpurapuseh[0][0]\" /><input type=\"hidden\" name=\"soundpurapusehhidden[0][0]\" value=\"1\"/></td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-3\">
													<table id=\"sound_kulkul_pura_puseh_jenis_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraPuseh[0][0]\" id=\"optionsRadios1\" value=\"Actual\" >
																	".ACTUAL."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraPuseh[0][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>
																	".SIMULATION."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-1\">
													<table id=\"action_add_kulkul_pura_puseh_0\" width=\"100%\">
														<tr>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraPuseh(0);\" title=\"File Suara\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div><hr>
                                            <div id=\"divinputsuarakulkulpurapuseh\"></div>
                                            
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"#tabs-4\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-4]').tab('show');\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-left\"></i> <b>".BACK."</b></button></a> 
												    <a href=\"#tabs-6\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-6]').tab('show');\" class=\"btn btn-success\"><b>".NEXT."</b> <i class=\"fa fa-arrow-circle-right\"></i></button></a>
												</div>
                                            </div>
										</div>

                                        <div class=\"tab-pane\" id=\"tabs-6\"> <br />
                                            <!-- kulkul pura dalem -->
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".KULKUL_PURA_DALEM."</label>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".JUMLAH_KULKUL."</label>
                                                <div class=\"col-sm-2\">
                                                    <input type=\"number\" id=\"jumlahkulkulpuradalem\" name=\"jumlahkulkulpuradalem\" class=\"form-control\" value=\"1\" min=\"1\" max=\"4\" onchange=\"changeKulkulPuraDalem();\"/>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".PAKAIAN_KULKUL."</label>
                                                <div class=\"col-sm-4\">
                                                    <input type=\"text\" name=\"pakaiankulkulpuradalem\" class=\"form-control autocompletepakaiankulkul\" onkeydown=\"autoCompletePakaianKulkul();\"/>
                                                </div>
                                                <div class=\"col-md-2\">
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Indonesian Language\" name=\"Langpuradalem\" id=\"optionsRadios1\" value=\"@id\" >
                                                        ".ID_."
                                                    </label>
                                                    </div>
                                                    <div class=\"radio-inline\">
                                                    <label>
                                                        <input type=\"radio\" title=\"Balinese Language\" name=\"Langpuradalem\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                        ".BAN."
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id=\"divkulkulpuradalem\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".BAHAN_BAKU."</label>
                                                    <div class=\"col-sm-4\">
                                                        <input type=\"text\" name=\"rawmaterialpuradalem[0]\" class=\"form-control autocompleterawmaterial\" onkeydown=\"autoCompleteRawMaterial();\"/>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Indonesian Language\" name=\"bb_puradalem[0]\" id=\"optionsRadios1\" value=\"@id\" >
                                                            ".ID_."
                                                        </label>
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" title=\"Balinese Language\" name=\"bb_puradalem[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
                                                            ".BAN."
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".UKURAN_KULKUL."</label>
                                                    <div class=\"col-sm-4\">
                                                        ".$cbukpuradalem."
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-3 control-label\">".ARAH_KULKUL."</label>
                                                    <div class=\"col-md-6\">
                                                        <div class=\"radio-inline\">
                                                        <label>
                                                            <input type=\"radio\" name=\"directionkulkulpuradalem[0]\" value=\"TidakTau\" checked>
                                                            Tidak Tau
                                                        </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"col-sm-3 control-label\">".IMAGE."</label>
                                                <div class=\"col-sm-5\">
                                                    <table id=\"gambar_kulkul_pura_dalem\" width=\"100%\">
                                                        <tr>
                                                            <td>
                                                                <input type=\"file\" name=\"img_kulkul_pura_dalem[]\" />
                                                                <input type=\"hidden\" name=\"kulkulpuradalem[]\" value=\"1\"/>
                                                            </td>
                                                            <td>
                                                                <a href=\"javascript:void(0);\" onclick=\"addGambarKulkulPuraDalem();\" title=\"Tambah Gambar Kulkul Pura Dalem\">
                                                                <button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
											<div class=\"form-group\">
												<label class=\"col-sm-3\" style=\"font-weight:bold; margin-left:60px;\">".SUARA_KULKUL_PURA_DALEM."</label>
											     <button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"addSuaraKulkulPuraDalem()\"><i class=\"fa fa-plus-circle\"></i></button>
                                                 <input type=\"hidden\" id=\"jumlahinputkulkulpuradalem\" value=\"1\">
                                            </div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SUARA." (1)</label>
												<div class=\"col-sm-4\">
													<input type=\"text\" name=\"PuraDalemSound[0]\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('puradalem');\" />
												</div>
												<div class=\"col-md-2\">
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Indonesian Language\" name=\"Lang_suarapuradalem[0]\" id=\"optionsRadios1\" value=\"@id\" >
														".ID_."
													  </label>
													</div>
													<div class=\"radio-inline\">
													  <label>
														<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapuradalem[0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
														".BAN."
													  </label>
													</div>
												</div>
											</div>
                                            <input type=\"hidden\" id=\"kpdlm_index_0\" value=\"0\">
                                            <input type=\"hidden\" id=\"spdlm_index_0'\" value=\"0\">
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>
												<div class=\"col-sm-4\">
													<table id=\"kegiatan_kulkul_pura_dalem_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"input-group\">
																	<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradalem[0][0]\">
																	<span class=\"input-group-addon\">
																		<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraDalem(0);\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>
																	</span>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-3\">
													<table id=\"kegiatan_kulkul_puradalem1_0\" width=\"100%\">
														<tr>
															<td>
																".$cbkegiatanpuradalem."
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-2\">
													<table id=\"kegiatan_kulkul_puradalem2_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradalem[0][0]\" id=\"optionsRadios1\" value=\"@id\">
																	".ID_."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradalem[0][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>
																	".BAN."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class=\"form-group\">
												<label class=\"col-sm-3 control-label\">".SOUND."</label>
												<div class=\"col-sm-3\">
													<table id=\"sound_kulkul_pura_dalem_0\" width=\"100%\">
														<tr>
															<td><input type=\"file\" name=\"sound_kulkulpuradalem[0][0]\" /><input type=\"hidden\" name=\"soundpuradalemhidden[0][0]\" value=\"1\"/></td>
														</tr>
													</table>
												</div>
												<div class=\"col-md-3\">
													<table id=\"sound_kulkul_pura_dalem_jenis_0\" width=\"100%\">
														<tr>
															<td>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraDalem[0][0]\" id=\"optionsRadios1\" value=\"Actual\">
																	".ACTUAL."
																  </label>
																</div>
																<div class=\"radio-inline\">
																  <label>
																	<input type=\"radio\" name=\"ResourceTypePuraDalem[0][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>
																	".SIMULATION."
																  </label>
																</div>
															</td>
														</tr>
													</table>
												</div>
												<div class=\"col-sm-1\">
													<table id=\"action_add_kulkul_pura_dalem_0\" width=\"100%\">
														<tr>
															<td>
																<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraDalem(0);\" title=\"File Suara\">
																<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>
															</td>
														</tr>
													</table>
												</div>
											</div><hr>
                                            <div id=\"divinputsuarakulkulpuradalem\"></div>
                                            
								            <div class=\"row\">
												<div class=\"col-md-6 col-xs-6 col-md-offset-6 text-right\">
                                                    <a href=\"#tabs-5\" role=\"tab\" data-toggle=\"tab\"><button type=\"button\" onclick=\"$('.nav-tabs a[href=#tabs-5]').tab('show');\" class=\"btn btn-warning\"><i class=\"fa fa-arrow-circle-left\"></i> <b>".BACK."</b></button></a> 
                                                    <button type=\"button\" class=\"btn btn-primary\" onclick=\"addData();\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\"></i> ".SAVE."</button>
												</div>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<script language=\"javascript\">
					function changePage2(){
						$('#tabs-2').tab('show');
					}
				</script>
				";
        /* $view = "<form name=\"FormAdd\" id=\"FormAdd\" role=\"form\" enctype=\"multipart/form-data\">
                    <input type=\"text\" name=\"am[0][0]\">
                    <input type=\"text\" name=\"ad[]\">
                    <button type=\"button\" onclick=\"addData();\" class=\"btn btn-primary\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\"></i> ".SAVE."</button>
                </form>"; */
		return $view;
	}
	function viewFormMapsDesa($request){
		extract($request,EXTR_SKIP);

		$view = "<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
					<h4 class=\"modal-title\" id=\"myModalLabel\">".MAPS."</h4>
				</div>
				<div class=\"modal-body\">
					<iframe name=\"framemapdesa\" id=\"framemapdesa\" height=\"300px\" width=\"100%\" frameBorder=\"0\" scrolling=\"no\"
						src=\"index.php?domain=".$domain."&language=".$language."&page=".$page."&action=viewmapdesa\" allowfullscreen>
					</iframe>
				</div>
				<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-primary\" onclick=\"applyMapDesa();\" id=\"btnprocess\" data-loading-text=\"".LOADING."...\">".SAVE."</button>
					<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">".CLOSE."</button>
				</div>
				<script language=\"javascript\">


				</script>
				";
		return $view;
	}
	
	function viewFormMapsBanjar($request){
		extract($request,EXTR_SKIP);

		$view = "<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
					<h4 class=\"modal-title\" id=\"myModalLabel\">".MAPS."</h4>
				</div>
				<div class=\"modal-body\">
					<iframe name=\"framemapbanjar\" id=\"framemapbanjar\" height=\"300px\" width=\"100%\" frameBorder=\"0\" scrolling=\"no\"
						src=\"index.php?domain=".$domain."&language=".$language."&page=".$page."&action=viewmapbanjar\" allowfullscreen>
					</iframe>
				</div>
				<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-primary\" onclick=\"applyMapBanjar();\" id=\"btnprocess\" data-loading-text=\"".LOADING."...\">".SAVE."</button>
					<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">".CLOSE."</button>
				</div>
				<script language=\"javascript\">


				</script>
				";
		return $view;
	}

	//fungsi untuk insert
	function addData($request){
		extract($request,EXTR_SKIP);
		//get uid
		$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);
		$uid = $du["uname"];
        
        $error = "";
        //validasi kabupaten kecamatan dan desa
        if($Kabupaten==""){
            $error .= "Kabupaten tidak boleh kosong<br>"; 
        }
        if($Kecamatan==""){
            $error .= "Kecamatan tidak boleh kosong<br>"; 
        }
        if($Desa==""){
            $error .= "Desa tidak boleh kosong<br>"; 
        }
        
        //$error .= $soundbanjarhidden;
        //print_r($soundbanjarhidden[0]);
       
        //pengecekan ekstension file suara banjar
        $incb = 0;
        if(is_array($BanjarSound)){
            foreach($BanjarSound as $bj){
                //if(is_array($soundbanjarhidden[$incb])){
                    $i=0;
                    foreach ($_FILES["sound_kulkulbanjar"]["name"][$incb] as $sbanjar){
                        if($_FILES["sound_kulkulbanjar"]["name"][$incb][$i]!=""){
                            $extension = pathinfo($_FILES["sound_kulkulbanjar"]["name"][$incb][$i],PATHINFO_EXTENSION);
                            if(($extension!="3gpp")&&($extension!="acc")&&($extension!="amr")&&($extension!="m4a")&&($extension!="mp3")
                                &&($extension!="wav")&&($extension!="wma")&&($extension!="m4b")
                               &&($extension!="m4p")&&($extension!="m4v")&&($extension!="m4r")
                               &&($extension!="3gp")&&($extension!="mp4")&&($extension!="")){
                                $error .= "Ekstensi File Suara ke ".($incb+1).",".($i+1)." tidak diijinkan <br/>";
                            }
                        }
                        $i++;
                    }
                //}
                $incb++;
            }
        }
        
        //pengecekan ekstension file suara desa
        $incb = 0;
        if(is_array($DesaSound)){
            foreach($DesaSound as $ds){
                //if(is_array($sounddesahidden[$incb])){
                    $i=0;
                    foreach ($_FILES["sound_kulkuldesa"]["name"][$incb] as $sdesa){
                        if($_FILES["sound_kulkuldesa"]["name"][$incb][$i]!=""){
                            $extension = pathinfo($_FILES["sound_kulkuldesa"]["name"][$incb][$i],PATHINFO_EXTENSION);
                            if(($extension!="3gpp")&&($extension!="acc")&&($extension!="amr")&&($extension!="m4a")&&($extension!="mp3")
                                &&($extension!="wav")&&($extension!="wma")&&($extension!="m4b")
                               &&($extension!="m4p")&&($extension!="m4v")&&($extension!="m4r")
                               &&($extension!="3gp")&&($extension!="mp4")&&($extension!="")){
                                $error .= "Ekstensi File Suara ke ".$incb.",".$i." tidak diijinkan <br/>";
                            }
                        }
                        $i++;
                    }
                //}
                $incb++;
            }
        }
        
        //pengecekan ekstension file suara pura desa
        $incb = 0;
        if(is_array($PuraDesaSound)){
            foreach($PuraDesaSound as $pds){
                //if(is_array($soundpuradesahidden[$incb])){
                    $i=0;
                    foreach ($_FILES["sound_kulkulpuradesa"]["name"][$incb] as $spuradesa){
                        if($_FILES["sound_kulkulpuradesa"]["name"][$incb][$i]!=""){
                            $extension = pathinfo($_FILES["sound_kulkulpuradesa"]["name"][$incb][$i],PATHINFO_EXTENSION);
                            if(($extension!="3gpp")&&($extension!="acc")&&($extension!="amr")&&($extension!="m4a")&&($extension!="mp3")
                                &&($extension!="wav")&&($extension!="wma")&&($extension!="m4b")
                               &&($extension!="m4p")&&($extension!="m4v")&&($extension!="m4r")
                               &&($extension!="3gp")&&($extension!="mp4")&&($extension!="")){
                                $error .= "Ekstensi File Suara ke ".$incb.",".$i." tidak diijinkan <br/>";
                            }
                        }
                        $i++;
                    }
                //}
                $incb++;
            }
        }
        
        //pengecekan ekstension file suara pura puseh
        $incb = 0;
        if(is_array($PuraPusehSound)){
            foreach($PuraPusehSound as $pdp){
                //if(is_array($soundpurapusehhidden[$incb])){
                    $i=0;
                    foreach ($_FILES["sound_kulkulpurapuseh"]["name"][$incb] as $spurapuseh){
                        if($_FILES["sound_kulkulpurapuseh"]["name"][$incb][$i]!=""){
                            $extension = pathinfo($_FILES["sound_kulkulpurapuseh"]["name"][$incb][$i],PATHINFO_EXTENSION);
                            if(($extension!="3gpp")&&($extension!="acc")&&($extension!="amr")&&($extension!="m4a")&&($extension!="mp3")
                                &&($extension!="wav")&&($extension!="wma")&&($extension!="m4b")
                               &&($extension!="m4p")&&($extension!="m4v")&&($extension!="m4r")
                               &&($extension!="3gp")&&($extension!="mp4")&&($extension!="")){
                                $error .= "Ekstensi File Suara ke ".$incb.",".$i." tidak diijinkan <br/>";
                            }
                        }
                        $i++;
                    }
                //}
                $incb++;
            }
        }
        
        //pengecekan ekstension file suara pura dalem
        $incb = 0;
        if(is_array($PuraPusehDalem)){
            foreach($PuraPusehDalem as $pdlm){
                //if(is_array($soundpuradalemhidden[$incb])){
                    $i=0;
                    foreach ($_FILES["sound_kulkulpuradalem"]["name"][$incb] as $spuradalem){
                        if($_FILES["sound_kulkulpuradalem"]["name"][$incb][$i]!=""){
                            $extension = pathinfo($_FILES["sound_kulkulpuradalem"]["name"][$incb][$i],PATHINFO_EXTENSION);
                            if(($extension!="3gpp")&&($extension!="acc")&&($extension!="amr")&&($extension!="m4a")&&($extension!="mp3")
                                &&($extension!="wav")&&($extension!="wma")&&($extension!="m4b")
                               &&($extension!="m4p")&&($extension!="m4v")&&($extension!="m4r")
                               &&($extension!="3gp")&&($extension!="mp4")&&($extension!="")){
                                $error .= "Ekstensi File Suara ke ".$incb.",".$i." tidak diijinkan <br/>";
                            }
                        }
                        $i++;
                    }
                //}
                $incb++;
            }    
        }
		
        //convert multiple array POST
		$Kegiatanbanjar = $_POST['Kegiatanbanjar'];
		$aktivitasbanjar = $_POST['aktivitasbanjar'];
		$Langkegiatanbanjar = $_POST['Langkegiatanbanjar'];
		$ResourceTypeBanjar = $_POST['ResourceTypeBanjar'];
		
		$Kegiatandesa = $_POST['Kegiatandesa'];
		$aktivitasdesa = $_POST['aktivitasdesa'];
		$Langkegiatandesa = $_POST['Langkegiatandesa'];
		$ResourceTypeDesa = $_POST['ResourceTypeDesa'];
		
		$Kegiatanpuradesa = $_POST['Kegiatanpuradesa'];
		$aktivitaspuradesa = $_POST['aktivitaspuradesa'];
		$Langkegiatanpuradesa = $_POST['Langkegiatanpuradesa'];
		$ResourceTypePuraDesa = $_POST['ResourceTypePuraDesa'];
		
		$Kegiatanpurapuseh = $_POST['Kegiatanpurapuseh'];
		$aktivitaspurapuseh = $_POST['aktivitaspurapuseh'];
		$Langkegiatanpurapuseh = $_POST['Langkegiatanpurapuseh'];
		$ResourceTypePuraPuseh = $_POST['ResourceTypePuraPuseh'];
		
		$Kegiatanpuradalem = $_POST['Kegiatanpuradalem'];
		$aktivitaspuradalem = $_POST['aktivitaspuradalem'];
		$Langkegiatanpuradalem = $_POST['Langkegiatanpuradalem'];
		$ResourceTypePuraDalem = $_POST['ResourceTypePuraDalem'];
		
       
        /* //$error .=$am." array multi";
        print_r($_POST["am"])."<br>";
		$mahasiswa = array(array(23));
		print_r($mahasiswa); */
        ///print_r($ad);
        if($error==""){
            include ("thk_update.php");
            
            //validasi spasi
            $Kabupaten = str_replace(' ', '', $Kabupaten);
            $Kecamatan = str_replace(' ', '', $Kecamatan);
            $Desa = str_replace(' ', '', $Desa);
            $Banjar = str_replace(' ', '', $Banjar);
            
            //set variabel pura
            $PuraDesa = "PuraDesa".$Desa;
            $PuraPuseh = "PuraPuseh".$Desa;

            //validasi tanpa spasi
            $BanjarSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $Banjar));
            $DesaSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $Desa));
            $PuraDesaSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $PuraDesa));
            $PuraPusehSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $PuraPuseh));


            //query insert location
            $qbanjar = "";
            if($Banjar!=""){
                $qbanjar = "thk:$Banjar a thk:Banjar .
                            thk:$Banjar thk:isPartOf thk:$Desa ;
                            rdfs:label '$BanjarSpasi'.
                            thk:$Banjar thk:hasLatitute '$bnj_latitude';
                            thk:hasLongitude '$bnj_longitude'.
                            ";
            }
            $qpuradalem = "";
            if(is_array($PuraDalem)){
                $i=0;
                foreach($PuraDalem as $pd){
                    if($pd!=""){
                        $pd = str_replace(' ', '', $pd);
                        $pdSpasi = preg_replace('/(?<!\ )[A-Z]/', ' $0', $pd);
                        $qpuradalem .= "thk:$pd a thk:PuraDalem;
                                        thk:isPartOf thk:$Desa;
                                    rdfs:label '$pdSpasi'.
                                        thk:$Desa thk:hasTemple thk:$pd .
                                        ";
                    }
                    $i++;
                }
            }
            $thk_update->update(
            "INSERT DATA
            {
                thk:$Desa a thk:Desa .
                thk:$Desa thk:isPartOf thk:$Kabupaten .
                thk:$Desa thk:isPartOf thk:$Kecamatan ;
                rdfs:label '$DesaSpasi' .
                thk:$Desa thk:hasLatitute '$ds_latitude';
                thk:hasLongitude '$ds_longitude'.
                $qbanjar
                thk:$PuraDesa a thk:PuraDesa;
                thk:isPartOf thk:$Desa ;
                rdfs:label '$PuraDesaSpasi' .
                thk:$Desa thk:hasTemple thk:$PuraDesa .
                thk:$PuraPuseh a thk:PuraPuseh;
                rdfs:label '$PuraPusehSpasi';
                thk:isPartOf thk:$Desa .
                thk:$Desa thk:hasTemple thk:$PuraPuseh .
                $qpuradalem

            } " );
            //end

            //* Excecute this code to update/insert in THK ontology whenever the submit button is clicked Populate more detail of Kulkul banjar
            $Kulkul = "Kulkul";
            $dateuploaded = date("Y-m-d H:i:s");

            if(($jumlahkulkulbanjar != "") && (is_array($rawmaterialbanjar)) && (is_array($kulkuldimensionbanjar))
                && ($pakaiankulkulbanjar != "") && ($Banjar!="")){

                $qimagekulkulbanjar = "";
                $qkulkulbanjaruid = $Kulkul.$Banjar."-".$uid;
                $qkulkulbanjar = $Kulkul.$Banjar;
                $qkulkulbanjarSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $qkulkulbanjar));

                //upload image to server
                if(is_array($kulkulbanjar)){
                    $i=0;
                    foreach ($kulkulbanjar as $klb){
                        if($_FILES["img_kulkul_banjar"]["name"][$i]!=""){
                            $dir = "files/kulkul/kulkulbanjar/images/";
                            //$fileName = pathinfo($_FILES["img_kulkul_banjar"]["name"][$i],PATHINFO_FILENAME);
                            $fileName = $qkulkulbanjaruid."-".$i;
                            $fileType = pathinfo($_FILES["img_kulkul_banjar"]["name"][$i],PATHINFO_EXTENSION);
                            $fileName = str_replace(' ', '', $fileName);
                            $imageUrl = $dir.$fileName.".".$fileType;
                            $imageFile = $fileName.".".$fileType;
                            //cek apa ada nama file upload yg sama
                            /* $fn = 1;
                            while(file_exists($imageUrl)){
                                $imageUrl = $dir.$fileName."-".$fn.".".$fileType;
                                $imageFile = $fileName."-".$fn.".".$fileType;
                                $fn++;
                            } */
                            if(!file_exists($imageUrl)){
                                if(move_uploaded_file($_FILES["img_kulkul_banjar"]["tmp_name"][$i],$imageUrl)){
                                    ganerateThumb($imageUrl,150);
                                    ganerateThumb($imageUrl,50);
                                    $image = $imageUrl;

                                    $qimagekulkulbanjar .="thk:$imageFile a thk:Image ;
                                                                thk:hasUrl '$imageUrl' ;
                                                                thk:addDate '$dateuploaded' ;
                                                                thk:updatedBy thk:$uid .
                                                                thk:$uid a thk:uid .
                                                            thk:$qkulkulbanjaruid thk:hasImageFile thk:$imageFile .
                                                            ";
                                }
                            }
                        }
                        $i++;
                    }
                }
                 //validasi spasi
                $pakaiankulkulbanjar = str_replace(' ', '', $pakaiankulkulbanjar);
                
                $sparql_rmb = "";
                if(is_array($rawmaterialbanjar)){
                    $i=0;
                    foreach ($rawmaterialbanjar as $rmb){
                        //validasi spasi
                        $rmb = str_replace(' ', '', $rmb);
                        $sparql_rmb .= "thk:$rmb a thk:BahanBakuKulkul .
                                        thk:$qkulkulbanjaruid thk:hasRawMaterial thk:$rmb . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_kdb = "";
                if(is_array($kulkuldimensionbanjar)){
                    $i=0;
                    foreach ($kulkuldimensionbanjar as $kdb){
                        $sparql_kdb .= "thk:$qkulkulbanjaruid thk:hasDimension thk:$kdb . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_drb = "";
                if(is_array($directionkulkulbanjar)){
                    $i=0;
                    foreach ($directionkulkulbanjar as $drb){
                        $sparql_drb .= "thk:$qkulkulbanjaruid thk:hasDirection thk:$drb .";
                        $i++;
                    }
                }
                
                
                $pakaiankulkulbanjarlang = "'".$pakaiankulkulbanjar."'".$Langbanjar;
                $thk_update->update(
                    "INSERT DATA
                    {
                        thk:$qkulkulbanjaruid a thk:KulkulBanjar ;
                        rdfs:label '$qkulkulbanjarSpasi' .
                        thk:$Banjar thk:hasKulkul thk:$qkulkulbanjaruid .

                        thk:$qkulkulbanjaruid
                            thk:numberKulkul $jumlahkulkulbanjar .
                        
                        ".$sparql_rmb."

                        ".$sparql_kdb."

                        $qimagekulkulbanjar
                        ".$sparql_drb."

                        thk:$pakaiankulkulbanjar a thk:PakaianKulkul ;
                        rdfs:label $pakaiankulkulbanjarlang .
                        thk:$qkulkulbanjaruid thk:hasPengangge thk:$pakaiankulkulbanjar .
                        thk:$uid a thk:uid .
                    } " );
            }
            //end

            //* Excecute this code to update/insert in THK ontology whenever the submit button is clicked Populate more detail of Kulkul desa
            if(($jumlahkulkuldesa != "") && (is_array($rawmaterialdesa)) && (is_array($kulkuldimensiondesa)) && ($pakaiankulkuldesa != "") && ($Desa != "")){
                //validasi spasi
                $pakaiankulkuldesa = str_replace(' ', '', $pakaiankulkuldesa);

                $qimagekulkuldesa = "";
                $qkulkuldesauid = $Kulkul.$Desa."-".$uid;
                $qkulkuldesa = $Kulkul.$Desa;
                $qkulkuldesaSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $qkulkuldesa));

                //upload image to server
                if(is_array($kulkuldesa)){
                    $i=0;
                    foreach ($kulkuldesa as $kld){
                        if($_FILES["img_kulkul_desa"]["name"][$i]!=""){
                            $dir = "files/kulkul/kulkuldesa/images/";
                            //$fileName = pathinfo($_FILES["img_kulkul_desa"]["name"][$i],PATHINFO_FILENAME);
                            $fileName = $qkulkuldesauid."-".$i;
                            $fileType = pathinfo($_FILES["img_kulkul_desa"]["name"][$i],PATHINFO_EXTENSION);
                            $fileName = str_replace(' ', '', $fileName);
                            $imageUrl = $dir.$fileName.".".$fileType;
                            $imageFile = $fileName.".".$fileType;
                            //cek apa ada nama file upload yg sama
                            /* $fn = 1;
                            while(file_exists($imageUrl)){
                                $imageUrl = $dir.$fileName."-".$fn.".".$fileType;
                                $imageFile = $fileName."-".$fn.".".$fileType;
                                $fn++;
                            } */
                            if(!file_exists($imageUrl)){
                                if(move_uploaded_file($_FILES["img_kulkul_desa"]["tmp_name"][$i],$imageUrl)){
                                    ganerateThumb($imageUrl,150);
                                    ganerateThumb($imageUrl,50);
                                    $image = $imageUrl;

                                    $qimagekulkuldesa .="thk:$imageFile a thk:Image ;
                                                        thk:hasUrl '$imageUrl' ;
                                                        thk:addDate '$dateuploaded' ;
                                                        thk:updatedBy thk:$uid .
                                                        thk:$uid a thk:uid .
                                                    thk:$qkulkuldesauid thk:hasImageFile thk:$imageFile .
                                                    ";
                                }
                            }
                        }
                        $i++;
                    }
                }
                
                $sparql_rmd = "";
                if(is_array($rawmaterialdesa)){
                    $i=0;
                    foreach ($rawmaterialdesa as $rmd){
                        //validasi spasi
                        $rmd = str_replace(' ', '', $rmd);
                        $sparql_rmd .= "thk:$rmd a thk:BahanBakuKulkul .
                                        thk:$qkulkuldesauid thk:hasRawMaterial thk:$rmd . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_kdd = "";
                if(is_array($kulkuldimensiondesa)){
                    $i=0;
                    foreach ($kulkuldimensiondesa as $kdd){
                        $sparql_kdd .= "thk:$qkulkuldesauid thk:hasDimension thk:$kdd . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_drd = "";
                if(is_array($directionkulkuldesa)){
                    $i=0;
                    foreach ($directionkulkuldesa as $drd){
                        $sparql_drd .= "thk:$qkulkuldesauid thk:hasDirection thk:$drd .";
                        $i++;
                    }
                }
                
                $pakaiankulkuldesalang = "'".$pakaiankulkuldesa."'".$Langdesa;
                $thk_update->update(
                    "INSERT DATA
                    {
                        thk:$qkulkuldesauid a thk:KulkulDesa ;
                        rdfs:label '$qkulkuldesaSpasi' .
                        thk:$Desa thk:hasKulkul thk:$qkulkuldesauid .

                        thk:$qkulkuldesauid
                            thk:numberKulkul $jumlahkulkuldesa .
                        
                        ".$sparql_rmd."

                        ".$sparql_kdd."

                        $qimagekulkuldesa
                        ".$sparql_drd."

                        thk:$pakaiankulkuldesa a thk:PakaianKulkul ;
                        rdfs:label $pakaiankulkuldesalang .
                        thk:$qkulkuldesauid thk:hasPengangge thk:$pakaiankulkuldesa .
                        thk:$uid a thk:uid .
                    } " );
            }

            //* Excecute this code to update/insert in THK ontology whenever the submit button is clicked Populate more detail of Kulkul Pura Desa
            $Kulkul = "KulkulPuraDesa" ;
            if(($jumlahkulkulpuradesa != "") && (is_array($rawmaterialpuradesa)) && (is_array($kulkuldimensionpuradesa)) && ($pakaiankulkulpuradesa != "") && ($Desa!="")){
                //validasi spasi
                $pakaiankulkulpuradesa = str_replace(' ', '', $pakaiankulkulpuradesa);

                $qimagekulkulpuradesa = "";
                $qkulkulpuradesauid = $Kulkul.$Desa."-".$uid;
                $qkulkulpuradesa = $Kulkul.$Desa;
                $qkulkulpuradesaSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $qkulkulpuradesa));
                $PuraDesa = "PuraDesa".$Desa;
                //upload image to server
                if(is_array($kulkulpuradesa)){
                    $i=0;
                    foreach ($kulkulpuradesa as $klpd){
                        if($_FILES["img_kulkul_pura_desa"]["name"][$i]!=""){
                            $dir = "files/kulkul/kulkulpuradesa/images/";
                            //$fileName = pathinfo($_FILES["img_kulkul_pura_desa"]["name"][$i],PATHINFO_FILENAME);
                            $fileName = $qkulkulpuradesauid."-".$i;
                            $fileType = pathinfo($_FILES["img_kulkul_pura_desa"]["name"][$i],PATHINFO_EXTENSION);
                            $fileName = str_replace(' ', '', $fileName);
                            $imageUrl = $dir.$fileName.".".$fileType;
                            $imageFile = $fileName.".".$fileType;
                            //cek apa ada nama file upload yg sama
                            /* $fn = 1;
                            while(file_exists($imageUrl)){
                                $imageUrl = $dir.$fileName."-".$fn.".".$fileType;
                                $imageFile = $fileName."-".$fn.".".$fileType;
                                $fn++;
                            } */

                            if(!file_exists($imageUrl)){
                                if(move_uploaded_file($_FILES["img_kulkul_pura_desa"]["tmp_name"][$i],$imageUrl)){
                                    ganerateThumb($imageUrl,150);
                                    ganerateThumb($imageUrl,50);
                                    $image = $imageUrl;

                                    $qimagekulkulpuradesa .="thk:$imageFile a thk:Image ;
                                                        thk:hasUrl '$imageUrl' ;
                                                        thk:addDate '$dateuploaded' ;
                                                        thk:updatedBy thk:$uid .
                                                        thk:$uid a thk:uid .
                                                    thk:$qkulkulpuradesauid thk:hasImageFile thk:$imageFile .
                                                    ";
                                }
                            }
                        }
                        $i++;
                    }
                }
                $pakaiankulkulpuradesalang = "'".$pakaiankulkulpuradesa."'".$Langpuradesa;
                
                $sparql_rmpd = "";
                if(is_array($rawmaterialpuradesa)){
                    $i=0;
                    foreach ($rawmaterialpuradesa as $rmpd){
                        //validasi spasi
                        $rmpd = str_replace(' ', '', $rmpd);
                        $sparql_rmpd .= "thk:$rmpd a thk:BahanBakuKulkul .
                                        thk:$qkulkulpuradesauid thk:hasRawMaterial thk:$rmpd . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_kdpd = "";
                if(is_array($kulkuldimensionpuradesa)){
                    $i=0;
                    foreach ($kulkuldimensionpuradesa as $kdpd){
                        $sparql_kdpd .= "thk:$qkulkulpuradesauid thk:hasDimension thk:$kdpd . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_drpd = "";
                if(is_array($directionkulkulpuradesa)){
                    $i=0;
                    foreach ($directionkulkulpuradesa as $drpd){
                        $sparql_drpd .= "thk:$qkulkulpuradesauid thk:hasDirection thk:$drpd .";
                        $i++;
                    }
                }
                
                $thk_update->update(
                    "INSERT DATA
                    {
                        thk:$qkulkulpuradesauid a thk:$Kulkul ;
                                rdfs:label '$qkulkulpuradesaSpasi' .
                        thk:$PuraDesa thk:hasKulkul thk:$qkulkulpuradesauid .
                        thk:$PuraDesa thk:isPartOf thk:$Desa .

                        thk:$qkulkulpuradesauid
                            thk:numberKulkul $jumlahkulkulpuradesa .
                        
                        ".$sparql_rmpd."
                        ".$sparql_kdpd."
                        
                        $qimagekulkulpuradesa

                        ".$sparql_drpd."
                        
                        thk:$pakaiankulkulpuradesa a thk:PakaianKulkul ;
                        rdfs:label $pakaiankulkulpuradesalang .
                        thk:$qkulkulpuradesauid thk:hasPengangge thk:$pakaiankulkulpuradesa .
                        thk:$uid a thk:uid .
                    } " );
            }

            //* Excecute this code to update/insert in THK ontology whenever the submit button is clicked Populate more detail of Kulkul Pura Puseh
            $Kulkul = "KulkulPuraPuseh" ;
            if(($jumlahkulkulpurapuseh != "") && (is_array($rawmaterialpurapuseh)) && (is_array($kulkuldimensionpurapuseh)) && ($pakaiankulkulpurapuseh != "") && ($Desa!="")){
                //validasi spasi
                $pakaiankulkulpurapuseh = str_replace(' ', '', $pakaiankulkulpurapuseh);

                $qimagekulkulpurapuseh = "";
                $qkulkulpurapusehuid = $Kulkul.$Desa."-".$uid;
                $qkulkulpurapuseh = $Kulkul.$Desa;
                $qkulkulpurapusehSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $qkulkulpurapuseh));
                $PuraPuseh = "PuraPuseh".$Desa;
                //upload image to server
                if(is_array($kulkulpurapuseh)){
                    $i=0;
                    foreach ($kulkulpurapuseh as $klpp){
                        if($_FILES["img_kulkul_pura_puseh"]["name"][$i]!=""){
                            $dir = "files/kulkul/kulkulpurapuseh/images/";
                            //$fileName = pathinfo($_FILES["img_kulkul_pura_puseh"]["name"][$i],PATHINFO_FILENAME);
                            $fileName = $qkulkulpurapusehuid."-".$i;
                            $fileType = pathinfo($_FILES["img_kulkul_pura_puseh"]["name"][$i],PATHINFO_EXTENSION);
                            $fileName = str_replace(' ', '', $fileName);
                            $imageUrl = $dir.$fileName.".".$fileType;
                            $imageFile = $fileName.".".$fileType;
                            //cek apa ada nama file upload yg sama
                            /* $fn = 1;
                            while(file_exists($imageUrl)){
                                $imageUrl = $dir.$fileName."-".$fn.".".$fileType;
                                $imageFile = $fileName."-".$fn.".".$fileType;
                                $fn++;
                            } */

                            if(!file_exists($imageUrl)){
                                if(move_uploaded_file($_FILES["img_kulkul_pura_puseh"]["tmp_name"][$i],$imageUrl)){
                                    ganerateThumb($imageUrl,150);
                                    ganerateThumb($imageUrl,50);
                                    $image = $imageUrl;

                                    $qimagekulkulpurapuseh .="thk:$imageFile a thk:Image ;
                                                        thk:hasUrl '$imageUrl' ;
                                                        thk:addDate '$dateuploaded' ;
                                                        thk:updatedBy thk:$uid .
                                                    thk:$qkulkulpurapusehuid thk:hasImageFile thk:$imageFile .
                                                    ";
                                }
                            }
                        }
                        $i++;
                    }
                }
                $pakaiankulkulpurapusehlang = "'".$pakaiankulkulpurapuseh."'".$Langpurapuseh;
                
                $sparql_rmpp = "";
                if(is_array($rawmaterialpurapuseh)){
                    $i=0;
                    foreach ($rawmaterialpurapuseh as $rmpp){
                        //validasi spasi
                        $rmpp = str_replace(' ', '', $rmpp);
                        $sparql_rmpp .= "thk:$rmpp a thk:BahanBakuKulkul .
                                        thk:$qkulkulpurapusehuid thk:hasRawMaterial thk:$rmpp . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_kdpp = "";
                if(is_array($kulkuldimensionpurapuseh)){
                    $i=0;
                    foreach ($kulkuldimensionpurapuseh as $kdpp){
                        $sparql_kdpp .= "thk:$qkulkulpurapusehuid thk:hasDimension thk:$kdpp . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_drpp = "";
                if(is_array($directionkulkulpurapuseh)){
                    $i=0;
                    foreach ($directionkulkulpurapuseh as $drpp){
                        $sparql_drpp .= "thk:$qkulkulpurapusehuid thk:hasDirection thk:$drpp .";
                        $i++;
                    }
                }
                
                $thk_update->update(
                    "INSERT DATA
                    {
                        thk:$qkulkulpurapusehuid a thk:$Kulkul ;
                        rdfs:label '$qkulkulpurapusehSpasi' .
                        thk:$PuraPuseh thk:hasKulkul thk:$qkulkulpurapusehuid .
                        thk:$PuraPuseh thk:isPartOf thk:$Desa .

                        thk:$qkulkulpurapusehuid
                            thk:numberKulkul $jumlahkulkulpurapuseh .
                        ".$sparql_rmpp."
                        
                        ".$sparql_kdpp."
                        
                        $qimagekulkulpurapuseh

                        ".$sparql_drpp."

                        thk:$pakaiankulkulpurapuseh a thk:PakaianKulkul ;
                        rdfs:label $pakaiankulkulpurapusehlang .
                        thk:$qkulkulpurapusehuid thk:hasPengangge thk:$pakaiankulkulpurapuseh .
                        thk:$uid a thk:uid .
                    } " );
            }

            //* Excecute this code to update/insert in THK ontology whenever the submit button is clicked Populate more detail of Kulkul Pura Dalem
            $Kulkul = "KulkulPuraDalem" ;
            if(($jumlahkulkulpuradalem != "") && (is_array($rawmaterialpuradalem)) && (is_array($kulkuldimensionpuradalem)) && ($pakaiankulkulpuradalem != "") && ($Desa!="")){
                //validasi spasi
                $pakaiankulkulpuradalem = str_replace(' ', '', $pakaiankulkulpuradalem);

                $qimagekulkulpuradalem = "";
                $qkulkulpuradalemuid = $Kulkul.$Desa."-".$uid;
                $qkulkulpuradalem = $Kulkul.$Desa;
                $qkulkulpuradalemSpasi = trim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $qkulkulpuradalem));
                $PuraDalem = "PuraDalem".$Desa;
                //upload image to server
                if(is_array($kulkulpuradalem)){
                    $i=0;
                    foreach ($kulkulpuradalem as $klpdlm){
                        if($_FILES["img_kulkul_pura_dalem"]["name"][$i]!=""){
                            $dir = "files/kulkul/kulkulpuradalem/images/";
                            //$fileName = pathinfo($_FILES["img_kulkul_pura_dalem"]["name"][$i],PATHINFO_FILENAME);
                            $fileName = $qkulkulpuradalemuid."-".$i;
                            $fileType = pathinfo($_FILES["img_kulkul_pura_dalem"]["name"][$i],PATHINFO_EXTENSION);
                            $fileName = str_replace(' ', '', $fileName);
                            $imageUrl = $dir.$fileName.".".$fileType;
                            $imageFile = $fileName.".".$fileType;
                            //cek apa ada nama file upload yg sama
                            /* $fn = 1;
                            while(file_exists($imageUrl)){
                                $imageUrl = $dir.$fileName."-".$fn.".".$fileType;
                                $imageFile = $fileName."-".$fn.".".$fileType;
                                $fn++;
                            } */

                            if(!file_exists($imageUrl)){
                                if(move_uploaded_file($_FILES["img_kulkul_pura_dalem"]["tmp_name"][$i],$imageUrl)){
                                    ganerateThumb($imageUrl,150);
                                    ganerateThumb($imageUrl,50);
                                    $image = $imageUrl;

                                    $qimagekulkulpuradalem .="thk:$imageFile a thk:Image ;
                                                        thk:hasUrl '$imageUrl' ;
                                                        thk:addDate '$dateuploaded' ;
                                                        thk:updatedBy thk:$uid .
                                                        thk:$uid a thk:uid .
                                                    thk:$qkulkulpuradalemuid thk:hasImageFile thk:$imageFile .
                                                    ";
                                }
                            }
                        }
                        $i++;
                    }
                }
                $pakaiankulkulpuradalemlang = "'".$pakaiankulkulpuradalem."'".$Langpuradalem;
                
                $sparql_rmpdlm = "";
                if(is_array($rawmaterialpuradalem)){
                    $i=0;
                    foreach ($rawmaterialpuradalem as $rmpdlm){
                        //validasi spasi
                        $rmpdlm = str_replace(' ', '', $rmpdlm);
                        $sparql_rmpdlm .= "thk:$rmpdlm a thk:BahanBakuKulkul .
                                        thk:$qkulkulpuradalemuid thk:hasRawMaterial thk:$rmpdlm . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_kdpdlm = "";
                if(is_array($kulkuldimensionpuradalem)){
                    $i=0;
                    foreach ($kulkuldimensionpuradalem as $kdpdlm){
                        $sparql_kdpdlm .= "thk:$qkulkulpuradalemuid thk:hasDimension thk:$kdpdlm . 
                                        ";
                        $i++;
                    }
                }
                
                $sparql_drpdlm = "";
                if(is_array($directionkulkulpuradalem)){
                    $i=0;
                    foreach ($directionkulkulpuradalem as $drpdlm){
                        $sparql_drpdlm .= "thk:$qkulkulpuradalemuid thk:hasDirection thk:$drpdlm .";
                        $i++;
                    }
                }
                
                $thk_update->update(
                    "INSERT DATA
                    {
                        thk:$qkulkulpuradalemuid a thk:$Kulkul ;
                        rdfs:label '$qkulkulpuradalemSpasi' .
                        thk:$PuraDalem thk:hasKulkul thk:$qkulkulpuradalemuid .
                        thk:$PuraDalem thk:isPartOf thk:$Desa .

                        thk:$qkulkulpuradalemuid
                            thk:numberKulkul $jumlahkulkulpuradalem .
                        
                        ".$sparql_rmpdlm."
                        
                        ".$sparql_kdpdlm."
                        
                        $qimagekulkulpuradalem

                        ".$sparql_drpdlm."
                        
                        thk:$pakaiankulkulpuradalem a thk:PakaianKulkul ;
                        rdfs:label $pakaiankulkulpuradalemlang .
                        thk:$qkulkulpuradalemuid thk:hasPengangge thk:$pakaiankulkulpuradalem .
                        thk:$uid a thk:uid .
                    } " );
            }

            /* Excecute this code to update/insert in THK ontology whenever the submit button is clicked
            Populate more detail of Sound Kulkul Banjar
            */
            
            $Kulkul = "Kulkul" ;
            $incb = 0;
            if(is_array($BanjarSound)){
                foreach($BanjarSound as $bj){
					if($bj!=""){
						$BanjarSoundSpasi = $bj;
						$bj = str_replace(' ', '', $bj);
						$BanjarSoundid = $bj."-".$Banjar;


						$qsoundkegiatanbanjar = "";
						$banjarsoundlang = "";
						$kulkulbanjaruid = $Kulkul.$Banjar."-".$uid;
						if(is_array($Kegiatanbanjar[$incb])){
							$i=0;
							$banjarsoundlang = "'".$BanjarSoundSpasi."'".$Lang_suarabanjar[$incb];
							foreach ($Kegiatanbanjar[$incb] as $kbanjar){
								if($kbanjar!=""){
									$kbanjar = str_replace(' ', '', $kbanjar);

									$kegiatanlang = "'".$kbanjar."'".$Langkegiatanbanjar[$incb][$i];

									$qsoundkegiatanbanjar .= "thk:$BanjarSoundid a thk:SuaraKulkul ;
																rdfs:label $banjarsoundlang ;
																thk:isSoundFor thk:$kbanjar.

																thk:$kbanjar a thk:".$aktivitasbanjar[$incb][$i]." ;
																		thk:isUsing thk:$BanjarSoundid ;
																		rdfs:label $kegiatanlang .

																thk:$Banjar thk:hasActivity thk:$kbanjar .
																thk:$kulkulbanjaruid thk:isUsedFor thk:$kbanjar;
																thk:hasSound thk:$BanjarSoundid .
														";
									$i++;
								}
							}
						}

						$qsoundbanjar = "";
						//if(is_array($soundbanjarhidden[$incb])){
							$i=0;
							foreach ($_FILES["sound_kulkulbanjar"]["name"][$incb] as $sbanjar){
								if($_FILES["sound_kulkulbanjar"]["name"][$incb][$i]!=""){
									$dir = "files/kulkul/kulkulbanjar/sounds/";
									//$fileName = pathinfo($_FILES["sound_kulkulbanjar"]["name"][$i],PATHINFO_FILENAME);
									$fileName = $kulkulbanjaruid."-".$incb.$i;
									$fileType = pathinfo($_FILES["sound_kulkulbanjar"]["name"][$incb][$i],PATHINFO_EXTENSION);
									$fileName = str_replace(' ', '', $fileName);
									$SoundUrl = $dir.$fileName.".".$fileType;
									$SoundFile = $fileName.".".$fileType;
									/* //cek apa ada nama file upload yg sama
									$fn = 1;
									while(file_exists($SoundUrl)){
										$SoundUrl = $dir.$fileName."-".$fn.".".$fileType;
										$SoundFile = $fileName."-".$fn.".".$fileType;
										$fn++;
									} */

									if(!file_exists($SoundUrl)){
										move_uploaded_file($_FILES["sound_kulkulbanjar"]["tmp_name"][$incb][$i],$SoundUrl);

										$qsoundbanjar .="thk:$SoundFile a thk:Audio ;
																thk:hasUrl '$SoundUrl' ;
																thk:addDate '$dateuploaded' ;
																thk:hasResourceType thk:".$ResourceTypeBanjar[$incb][$i].";
																thk:updatedBy thk:$uid .
																thk:$uid a thk:uid .
														thk:$BanjarSoundid thk:hasSoundFile thk:$SoundFile .
														thk:$kulkulbanjaruid thk:hasSoundFile thk:$SoundFile .
															";
									}
								}
								$i++;
							}
						//}
						$thk_update->update(
						"INSERT DATA
						{
							$qsoundkegiatanbanjar
							$qsoundbanjar
						} " );
						$incb++;
					}
                }
            }

            /* Excecute this code to update/insert in THK ontology whenever the submit button is clicked
            Populate more detail of Sound Kulkul Desa
            */
            $incd=0;
            if(is_array($DesaSound)){
                foreach($DesaSound as $ds){
					if($ds!=""){
						$DesaSoundSpasi = $ds;
						$ds = str_replace(' ', '', $ds);
						$DesaSoundid = $ds."-".$Desa;

						$qsoundkegiatandesa = "";
						$desasoundlang = "";
						$kulkuldesauid = $Kulkul.$Desa."-".$uid;
						if(is_array($Kegiatandesa[$incd])){
							$i=0;
							$desasoundlang = "'".$DesaSoundSpasi."'".$Lang_suaradesa[$incd];
							foreach ($Kegiatandesa[$incd] as $kdesa){
								if($kdesa!=""){
									$kdesa = str_replace(' ', '', $kdesa);

									$kegiatanlang = "'".$kdesa."'".$Langkegiatandesa[$incd][$i];

									$qsoundkegiatandesa .= "thk:$DesaSoundid a thk:SuaraKulkul ;
																rdfs:label $desasoundlang ;
																thk:isSoundFor thk:$kdesa.

																thk:$kdesa a thk:".$aktivitasdesa[$incd][$i]." ;
																		thk:isUsing thk:$DesaSoundid ;
																		rdfs:label $kegiatanlang .

																thk:$Desa thk:hasActivity thk:$kdesa .
																thk:$kulkuldesauid thk:isUsedFor thk:$kdesa;
																thk:hasSound thk:$DesaSoundid .
														";
									$i++;
								}
							}
						}

						$qsounddesa = "";
						//if(is_array($sounddesahidden[$incd])){
							$i=0;
							foreach ($_FILES["sound_kulkuldesa"]["name"][$incd] as $sdesa){
								if($_FILES["sound_kulkuldesa"]["name"][$incd][$i]!=""){
									$dir = "files/kulkul/kulkuldesa/sounds/";
									//$fileName = pathinfo($_FILES["sound_kulkuldesa"]["name"][$i],PATHINFO_FILENAME);
									$fileName = $kulkuldesauid."-".$incd.$i;
									$fileType = pathinfo($_FILES["sound_kulkuldesa"]["name"][$incd][$i],PATHINFO_EXTENSION);
									$fileName = str_replace(' ', '', $fileName);
									$SoundUrl = $dir.$fileName.".".$fileType;
									$SoundFile = $fileName.".".$fileType;
									//cek apa ada nama file upload yg sama
									/* $fn = 1;
									while(file_exists($SoundUrl)){
										$SoundUrl = $dir.$fileName."-".$fn.".".$fileType;
										$SoundFile = $fileName."-".$fn.".".$fileType;
										$fn++;
									} */
									if(!file_exists($SoundUrl)){
										move_uploaded_file($_FILES["sound_kulkuldesa"]["tmp_name"][$incd][$i],$SoundUrl);

										$qsounddesa .="thk:$SoundFile a thk:Audio ;
																thk:hasUrl '$SoundUrl' ;
																thk:addDate '$dateuploaded' ;
																thk:hasResourceType thk:".$ResourceTypeDesa[$incd][$i].";
																thk:updatedBy thk:$uid .
																thk:$uid a thk:uid .
														thk:$DesaSoundid thk:hasSoundFile thk:$SoundFile .
														thk:$kulkuldesauid thk:hasSoundFile thk:$SoundFile .
															";
									}
								}
								$i++;
							}
						//}
						$thk_update->update(
						"INSERT DATA
						{
							$qsoundkegiatandesa
							$qsounddesa
						} " );
						$incd++;
					}
                }
            }

            /* Excecute this code to update/insert in THK ontology whenever the submit button is clicked
            Populate more detail of Sound Kulkul Pura Desa
            */
            $incpd = 0;
            $PuraDesa = "PuraDesa".$Desa;
            if(is_array($PuraDesaSound)){
                foreach($PuraDesaSound as $pds){
					if($pds!=""){
						$PuraDesaSoundSpasi = $pds;
						$pds = str_replace(' ', '', $pds);
						$PuraDesaSoundid = $pds."-".$PuraDesa;

						$qsoundkegiatanpuradesa = "";
						$puradesasoundlang = "";
						$kulkulpuradesauid = $Kulkul.$PuraDesa."-".$uid;
						if(is_array($Kegiatanpuradesa[$incpd])){
							$i=0;
							$puradesasoundlang = "'".$PuraDesaSoundSpasi."'".$Lang_suarapuradesa[$incpd];
							foreach ($Kegiatanpuradesa[$incpd] as $kpuradesa){
								if($kpuradesa){
									$kpuradesa = str_replace(' ', '', $kpuradesa);

									$kegiatanlang = "'".$kpuradesa."'".$Langkegiatanpuradesa[$incpd][$i];

									$qsoundkegiatanpuradesa .= "thk:$PuraDesaSoundid a thk:SuaraKulkul ;
																rdfs:label $puradesasoundlang ;
																thk:isSoundFor thk:$kpuradesa.

																thk:$kpuradesa a thk:".$aktivitaspuradesa[$incpd][$i]." ;
																		thk:isUsing thk:$PuraDesaSoundid ;
																		rdfs:label $kegiatanlang .

																thk:$PuraDesa thk:hasActivity thk:$kpuradesa .
																thk:$kulkulpuradesauid thk:isUsedFor thk:$kpuradesa;
																thk:hasSound thk:$PuraDesaSoundid .
														";
									$i++;
								}
							}
						}

						$qsoundpuradesa = "";
						//if(is_array($soundpuradesahidden[$incpd])){
							$i=0;
							foreach ($_FILES["sound_kulkulpuradesa"]["name"][$incpd] as $spuradesa){
								if($_FILES["sound_kulkulpuradesa"]["name"][$incpd][$i]!=""){
									$dir = "files/kulkul/kulkulpuradesa/sounds/";
									//$fileName = pathinfo($_FILES["sound_kulkulpuradesa"]["name"][$i],PATHINFO_FILENAME);
									$fileName = $kulkulpuradesauid."-".$incpd.$i;
									$fileType = pathinfo($_FILES["sound_kulkulpuradesa"]["name"][$incpd][$i],PATHINFO_EXTENSION);
									$fileName = str_replace(' ', '', $fileName);
									$SoundUrl = $dir.$fileName.".".$fileType;
									$SoundFile = $fileName.".".$fileType;
									//cek apa ada nama file upload yg sama
									/* $fn = 1;
									while(file_exists($SoundUrl)){
										$SoundUrl = $dir.$fileName."-".$fn.".".$fileType;
										$SoundFile = $fileName."-".$fn.".".$fileType;
										$fn++;
									} */

									if(!file_exists($SoundUrl)){
										move_uploaded_file($_FILES["sound_kulkulpuradesa"]["tmp_name"][$incpd][$i],$SoundUrl);

										$qsoundpuradesa .="thk:$SoundFile a thk:Audio ;
																thk:hasUrl '$SoundUrl' ;
																thk:addDate '$dateuploaded' ;
																thk:hasResourceType thk:".$ResourceTypePuraDesa[$incpd][$i].";
																thk:updatedBy thk:$uid .
																thk:$uid a thk:uid .
														thk:$PuraDesaSoundid thk:hasSoundFile thk:$SoundFile .
														thk:$kulkulpuradesauid thk:hasSoundFile thk:$SoundFile .
															";
									}
								}
								$i++;
							}
						//}
						$thk_update->update(
						"INSERT DATA
						{
							$qsoundkegiatanpuradesa
							$qsoundpuradesa
						} " );
						$incpd ++;
					}
                }
            }

            /* Excecute this code to update/insert in THK ontology whenever the submit button is clicked
            Populate more detail of Sound Kulkul Pura Pura
            */
            $PuraPuseh = "PuraPuseh".$Desa;
            $incpp = 0;
            if(is_array($PuraPusehSound)){
                foreach($PuraPusehSound as $pps){
					if($pps!=""){
						$PuraPusehSoundSpasi = $pps;
						$pps = str_replace(' ', '', $pps);
						$PuraPusehSoundid = $pps."-".$PuraPuseh;

						$qsoundkegiatanpurapuseh = "";
						$purapusehsoundlang = "";
						$kulkulpurapusehuid = $Kulkul.$PuraPuseh."-".$uid;
						if(is_array($Kegiatanpurapuseh[$incpp])){
							$i=0;
							$purapusehsoundlang = "'".$PuraPusehSoundSpasi."'".$Lang_suarapurapuseh[$incpp];
							foreach ($Kegiatanpurapuseh[$incpp] as $kpurapuseh){
								if($kpurapuseh!=""){
									$kpurapuseh = str_replace(' ', '', $kpurapuseh);

									$kegiatanlang = "'".$kpurapuseh."'".$Langkegiatanpurapuseh[$incpp][$i];

									$qsoundkegiatanpurapuseh .= "thk:$PuraPusehSoundid a thk:SuaraKulkul ;
																rdfs:label $purapusehsoundlang ;
																thk:isSoundFor thk:$kpurapuseh.

																thk:$kpurapuseh a thk:".$aktivitaspurapuseh[$incpp][$i]." ;
																		thk:isUsing thk:$PuraPusehSoundid ;
																		rdfs:label $kegiatanlang .

																thk:$PuraPuseh thk:hasActivity thk:$kpurapuseh .
																thk:$kulkulpurapusehuid thk:isUsedFor thk:$kpurapuseh;
																thk:hasSound thk:$PuraPusehSoundid .
														";
									$i++;
								}
							}
						}

						$qsoundpurapuseh = "";
						//if(is_array($soundpurapusehhidden[$incpp])){
							$i=0;
							foreach ($_FILES["sound_kulkulpurapuseh"]["name"][$incpp] as $spurapuseh){
								if($_FILES["sound_kulkulpurapuseh"]["name"][$incpp][$i]!=""){
									$dir = "files/kulkul/kulkulpurapuseh/sounds/";
									//$fileName = pathinfo($_FILES["sound_kulkulpurapuseh"]["name"][$i],PATHINFO_FILENAME);
									$fileName = $kulkulpurapusehuid."-".$incpp.$i;
									$fileType = pathinfo($_FILES["sound_kulkulpurapuseh"]["name"][$incpp][$i],PATHINFO_EXTENSION);
									$fileName = str_replace(' ', '', $fileName);
									$SoundUrl = $dir.$fileName.".".$fileType;
									$SoundFile = $fileName.".".$fileType;
									//cek apa ada nama file upload yg sama
									/* $fn = 1;
									while(file_exists($SoundUrl)){
										$SoundUrl = $dir.$fileName."-".$fn.".".$fileType;
										$SoundFile = $fileName."-".$fn.".".$fileType;
										$fn++;
									} */
									if(!file_exists($SoundUrl)){
										move_uploaded_file($_FILES["sound_kulkulpurapuseh"]["tmp_name"][$incpp][$i],$SoundUrl);

										$qsoundpurapuseh .="thk:$SoundFile a thk:Audio ;
																thk:hasUrl '$SoundUrl' ;
																thk:addDate '$dateuploaded' ;
																thk:hasResourceType thk:".$ResourceTypePuraPuseh[$incpp][$i].";
																thk:updatedBy thk:$uid .
																thk:$uid a thk:uid .
														thk:$PuraPusehSoundid thk:hasSoundFile thk:$SoundFile .
														thk:$kulkulpurapusehuid thk:hasSoundFile thk:$SoundFile .
															";
									}
								}
								$i++;
							}
						//}
						$thk_update->update(
						"INSERT DATA
						{
							$qsoundkegiatanpurapuseh
							$qsoundpurapuseh
						} " );
						$incpp++;
					}
                }
            }

            /* Excecute this code to update/insert in THK ontology whenever the submit button is clicked
            Populate more detail of Sound Kulkul Pura Dalem
            */
            $PuraDalem = "PuraDalem".$Desa;
            $incpdlm = 0;
            if(is_array($PuraDalemSound)){
                foreach ($PuraDalemSound as $pdlms){
					if($pdlms!=""){
						$PuraDalemSoundSpasi = $pdlms;
						$pdlms = str_replace(' ', '', $pdlms);
						$PuraDalemSoundid = $pdlms."-".$PuraDalem;

						$qsoundkegiatanpuradalem = "";
						$puradalemsoundlang = "";
						$kulkulpuradalemuid = $Kulkul.$PuraDalem."-".$uid;
						if(is_array($Kegiatanpuradalem[$incpdlm])){
							$i=0;
							$puradalemsoundlang = "'".$PuraDalemSoundSpasi."'".$Lang_suarapuradalem[$incpdlm];
							foreach ($Kegiatanpuradalem[$incpdlm] as $kpuradalem){
								if($kpuradalem!=""){
									$kpuradalem = str_replace(' ', '', $kpuradalem);

									$kegiatanlang = "'".$kpuradalem."'".$Langkegiatanpuradalem[$incpdlm][$i];

									$qsoundkegiatanpuradalem .= "thk:$PuraDalemSoundid a thk:SuaraKulkul ;
																rdfs:label $puradalemsoundlang ;
																thk:isSoundFor thk:$kpuradalem.

																thk:$kpuradalem a thk:".$aktivitaspuradalem[$incpdlm][$i]." ;
																		thk:isUsing thk:$PuraDalemSoundid ;
																		rdfs:label $kegiatanlang .

																thk:$PuraDalem thk:hasActivity thk:$kpuradalem .
																thk:$kulkulpuradalemuid thk:isUsedFor thk:$kpuradalem;
																thk:hasSound thk:$PuraDalemSoundid .
														";
									$i++;
								}
							}
						}

						$qsoundpuradalem = "";
						//if(is_array($soundpuradalemhidden[$incpdlm])){
							$i=0;
							foreach ($_FILES["sound_kulkulpuradalem"]["name"][$incpdlm] as $spuradalem){
								if($_FILES["sound_kulkulpuradalem"]["name"][$incpdlm][$i]!=""){
									$dir = "files/kulkul/kulkulpuradalem/sounds/";
									//$fileName = pathinfo($_FILES["sound_kulkulpuradalem"]["name"][$i],PATHINFO_FILENAME);
									$fileName = $kulkulpuradalemuid."-".$incpdlm.$i;
									$fileType = pathinfo($_FILES["sound_kulkulpuradalem"]["name"][$incpdlm][$i],PATHINFO_EXTENSION);
									$fileName = str_replace(' ', '', $fileName);
									$SoundUrl = $dir.$fileName.".".$fileType;
									$SoundFile = $fileName.".".$fileType;
									//cek apa ada nama file upload yg sama
									/* $fn = 1;
									while(file_exists($SoundUrl)){
										$SoundUrl = $dir.$fileName."-".$fn.".".$fileType;
										$SoundFile = $fileName."-".$fn.".".$fileType;
										$fn++;
									} */

									if(!file_exists($SoundUrl)){
										move_uploaded_file($_FILES["sound_kulkulpuradalem"]["tmp_name"][$incpdlm][$i],$SoundUrl);

										$qsoundpuradalem .="thk:$SoundFile a thk:Audio ;
																thk:hasUrl '$SoundUrl' ;
																thk:addDate '$dateuploaded' ;
																thk:hasResourceType thk:".$ResourceTypePuraDalem[$incpdlm][$i].";
																thk:updatedBy thk:$uid .
																thk:$uid a thk:uid .
														thk:$PuraDalemSoundid thk:hasSoundFile thk:$SoundFile .
														thk:$kulkulpuradalemuid thk:hasSoundFile thk:$SoundFile .
															";
									}
								}
								$i++;
							}
						//}
						$thk_update->update(
						"INSERT DATA
						{
							$qsoundkegiatanpuradalem
							$qsoundpuradalem
						} " );
						$incpdlm ++;
					}
                }
            } 
            return "success";
        }else{
            return $error;
        }
		
	}
	function viewFormOnlineConsent($request){
		extract($request,EXTR_SKIP);
		$view = "<form name=\"FormAddOnlineConsent\" id=\"FormAddOnlineConsent\" role=\"form\" class=\"form-horizontal\" enctype=\"multipart/form-data\">
					<div class=\"row\">
						<div class=\"col-md-10 col-md-offset-1\">
							<div class=\"panel panel-default\">
								<div class=\"panel-body\">
									<div class=\"row\">
										<div class=\"col-md-10 col-md-offset-1\">
											<h4 class=\"text-center\">FORM PERSETUJUAN PESERTA</h4>
											<p>Saya setuju untuk ambil bagian dalam penelitian ini.</p>
											<p>Dalam memberikan persetujuan saya, saya menyatakan bahwa:<p>
											<ul style=\"list-style-type:disc\">
												<li>Saya memahami tujuan penelitian, apa yang akan diminta kepada saya untuk dilakukan, dan setiap risiko/manfaat yang terjadi.</li>
												<li>Saya telah membaca Pernyataan Informasi Peserta dan telah mampu mendiskusikan keterlibatan saya dalam penelitian ini dengan peneliti jika saya bersedia melakukannya.</li>
												<li>Para peneliti telah menjawab pertanyaan yang saya ajukan tentang penelitian dan saya puas dengan jawaban yang diberikan.</li>
												<li>Saya mengerti bahwa keikutsertaan dalam penelitian ini merupakan sukarela dan saya tidak harus ambil bagian. Keputusan saya apakah akan ikut dalam program itu tidak akan mempengaruhi hubungan saya dengan para peneliti atau orang lain di University of Sydney pada saat sekarang atau di masa depan.</li>
												<li>Saya memahami bahwa saya bisa menarik diri dari penelitian ini setiap saat.</li>
												<li>Saya memahami bahwa respon kuesioner saya dan data multimedia (teks, gambar, dan suara) kulkul yang telah disampaikan tidak dapat ditarik kembali, karena data yang disampaikan adalah bersifat anonym, dan oleh karena itu para peneliti tidak akan dapat membedakan yang mana merupakan miliki saya.</li>
												<li>Saya memahami bahwa hasil penelitian ini dapat dipublikasikan, dan publikasi yang dilakukan tidak akan berisi nama saya atau informasi identitas apapun tentang diri saya.</li>

											</ul>
										</div>
										<br />
										<div class=\"col-sm-7 col-md-offset-1\">
											Saya menyetuji
										</div>
										<div class=\"col-sm-3 col-md-offset-1\">
										</div>
										<div class=\"col-sm-7 col-md-offset-1\">
											Rekaman data kulkul
										</div>
										<div class=\"col-sm-3\">
											<div class=\"radio-inline\">
												<label>
													<input type=\"radio\" name=\"oc_rekaman_data_kulkul\" id=\"optionsRadios1\" value=\"y\">
													".YES."
												</label>
											</div>
											<div class=\"radio-inline\">
											    <label>
													<input type=\"radio\" name=\"oc_rekaman_data_kulkul\" id=\"optionsRadios2\" value=\"n\">
													".NO."
												</label>
											</div>
										</div>
										<div class=\"col-sm-7 col-md-offset-1\">
											Respon kuesioner
										</div>
										<div class=\"col-sm-3\">
											<div class=\"radio-inline\">
												<label>
													<input type=\"radio\" name=\"oc_respon_kuisioner\" id=\"optionsRadios1\" value=\"y\">
													".YES."
												</label>
											</div>
											<div class=\"radio-inline\">
											    <label>
													<input type=\"radio\" name=\"oc_respon_kuisioner\" id=\"optionsRadios2\" value=\"n\">
													".NO."
												</label>
											</div>
										</div>
										<div class=\"col-sm-7 col-md-offset-1\">
											Menerima umpan balik tentang keseluruhan hasil dari penelitian ini
										</div>
										<div class=\"col-sm-3\">
											<div class=\"radio-inline\">
												<label>
													<input type=\"radio\" name=\"oc_feedback\" id=\"optionsRadios1\" value=\"y\">
													".YES."
												</label>
											</div>
											<div class=\"radio-inline\">
											    <label>
													<input type=\"radio\" name=\"oc_feedback\" id=\"optionsRadios2\" value=\"n\">
													".NO."
												</label>
											</div>
										</div>
										<div class=\"col-sm-7 col-md-offset-1\">
											Apakah Anda ingin menerima umpan balik tentang hasil keseluruhan penelitian ini melalui email?
										</div>
										<div class=\"col-sm-3\">
											<div class=\"radio-inline\">
												<label>
													<input type=\"radio\" name=\"oc_feedback_email\" id=\"optionsRadios1\" value=\"y\">
													".YES."
												</label>
											</div>
											<div class=\"radio-inline\">
											    <label>
													<input type=\"radio\" name=\"oc_feedback_email\" id=\"optionsRadios2\" value=\"n\">
													".NO."
												</label>
											</div>
										</div>
										<div class=\"col-md-10 text-right\"><br />
											<a href=\"".getInformation("dom_url",$language,$domain)."/index.php?domain=".$domain."&user=logout&language=".$language."\">
												<input type=\"button\" name=\"btnSave\" value=\"".NOT_AGREE."\" class=\"btn btn-default\"/>
											</a>
											<input type=\"button\" name=\"btnCancel\" value=\"".AGREE."\" class=\"btn btn-primary\" onclick=\"addOnlineConsent();\"/></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>";
		return $view;
	}
	function addOnlineConsent($request){
		extract($request,EXTR_SKIP);
		$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);

		$error = "";
		if($error==""){
			$query=mysql_query("START TRANSACTION;");
			$q = array();

			$q[] = mysql_query("INSERT INTO z_online_consent
							    (uname,oc_respon_kuisioner,oc_rekaman_data_kulkul,
								oc_feedback, oc_feedback_email)
								VALUES
								('".$du["uname"]."','".$oc_respon_kuisioner."','".$oc_rekaman_data_kulkul."',
								'".$oc_feedback."','".$oc_feedback_email."')") or die(mysql_error());

			if (!is_int(array_search(false,$q))){
				$query=mysql_query("COMMIT;");
				if ($query){
					$view = "success";
				}else{
					$view .= PROCESS_FAILED;
				}
			}else{
				$query=mysql_query("ROLLBACK;");
				$view .= PROCESS_FAILED;
			}
		}else{
			$view .= $error;
		}
		return $view;
	}
	function viewDemographicSurvey($request){
		extract($request,EXTR_SKIP);
		//combo box agama
		$qc = mysql_query("SELECT * FROM z_agama ORDER BY agm_id;");
		$cbagm = "<select name=\"agm_id\" id=\"agm_id\" class=\"form-control\">
					<option value=\"\" selected=\"selected\">-</option>";
		while($dc = mysql_fetch_array($qc)){
			if($agm_id==$dc["agm_id"]){
				$cbagm .= "<option value=\"".$dc["agm_id"]."\" selected=\"selected\">".$dc["agm_name"]."</option>";
			}else{
				$cbagm .= "<option value=\"".$dc["agm_id"]."\">".$dc["agm_name"]."</option>";
			}
		}
		$cbagm .="</select>";

		$array_lmk = array("tidak_pernah_menggunakan","kura_dari_6_bulan","6_sampai_12_bulan","1tahun_atau_lebih");
		$array_nlmk = array(TIDAK_PERNAH_MENGGUNAKAN,KURANG_DARI_6_BULAN,ENAM_SAMPAI_12_BULAN,SATU_TAHUN_ATAU_LEBIH);
		$cblmk = "<select name=\"usr_lama_menggunakan_komputer\" id=\"usr_lama_menggunakan_komputer\" class=\"form-control\">";
		$i = 0;
		foreach($array_lmk as $lmk){
			$cblmk .= "<option value=\"".$lmk."\">".$array_nlmk[$i]."</option>";
			$i++;
		}
		$cblmk .="</select>";

		$array_akl = array("banjar","stt","sekehegong","tidak_ada","lainnya");
		$array_nakl = array(BANJAR,SEKEHE_TERUNA_TERUNI,SEKEHE_GONG,TIDAK_ADA,LAINNYA);
		$cbakl = "<select name=\"usr_anggota_komunitas_lokal\" id=\"usr_anggota_komunitas_lokal\" class=\"form-control\">";
		$i = 0;
		foreach($array_akl as $akl){
			$cbakl .= "<option value=\"".$akl."\">".$array_nakl[$i]."</option>";
			$i++;
		}
		$cbakl .="</select>";
		
		$array_pnd = array("SD","SMP","SMA","Diploma","Universitas");
		$cbpnd = "<select name=\"usr_tingkat_pendidikan\" id=\"usr_tingkat_pendidikan\" class=\"form-control\">";
		$i = 0;
		foreach($array_pnd as $pnd){
			$cbpnd .= "<option value=\"".$pnd."\">".$pnd."</option>";
			$i++;
		}
		$cbpnd .="</select>";
 
		$autonumber = getAutoNumberID("User",date("U"));
		$view = "<div class=\"row\">
					<div class=\"col-md-10 col-md-offset-1\">
						<div class=\"panel panel-primary\">
							<div class=\"panel-heading\">".DEMOGRAPHIC_SURVEY."</div>
								<div class=\"panel-body\">
									<form name=\"formRegistrasi\" id=\"formRegistrasi\" role=\"form\" class=\"form-horizontal\">
										<div class=\"row\">
											<div class=\"col-md-9 col-md-offset-1\">
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".ID."</label>
													<div class=\"col-sm-9\">
														<input type=\"text\" name=\"usr_id\" size=\"50\" class=\"form-control\" value=\"".$autonumber["NumberID"]."\" readonly/>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".NAME."</label>
													<div class=\"col-sm-9\">
														<input type=\"text\" name=\"usr_name\" size=\"50\" class=\"form-control\" value=\"".$usr_name."\" required/>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".ADDRESS."</label>
													<div class=\"col-sm-9\">
														<textarea name=\"usr_address\" rows=\"3\" class=\"form-control\" required/>".$usr_address."</textarea>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".EMAIL_ADDRESS."</label>
													<div class=\"col-sm-9\">
														<input type=\"email\" name=\"usr_email\" size=\"50\" class=\"form-control\" value=\"".$usr_email."\"/>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".HP_TELEPHON."</label>
													<div class=\"col-sm-9\">
														<input type=\"text\" name=\"usr_hp\" size=\"50\" class=\"form-control\" value=\"".$usr_hp."\"/>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".TANGGAL_LAHIR."</label>
													<div class=\"col-sm-9\">
														<input type=\"text\" name=\"usr_tgl_lahir\" id=\"usr_tgl_lahir\" class=\"form-control\" value=\"".date("d/m/Y")."\"/>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".GENDER."</label>
													<div class=\"col-sm-9\">
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_jk\" id=\"optionsRadios1\" value=\"l\" checked>
															".LAKI_LAKI."
														  </label>
														</div>
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_jk\" id=\"optionsRadios2\" value=\"p\">
															".PEREMPUAN."
														  </label>
														</div>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".AGAMA."</label>
													<div class=\"col-sm-9\">
														".$cbagm."
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".STATUS_PERKAWINAN."</label>
													<div class=\"col-sm-9\">
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_status_perkawinan\" id=\"optionsRadios1\" value=\"belum_kawin\" checked>
															".BELUM_KAWIN."
														  </label>
														</div>
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_status_perkawinan\" id=\"optionsRadios2\" value=\"kawin\">
															".KAWIN."
														  </label>
														</div>
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_status_perkawinan\" id=\"optionsRadios2\" value=\"cerai\">
															".CERAI."
														  </label>
														</div>
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_status_perkawinan\" id=\"optionsRadios2\" value=\"duda_janda\">
															".DUDA_JANDA."
														  </label>
														</div>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".WILAYAH_TEMPAT_TINGGAL."</label>
													<div class=\"col-sm-9\">
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_wilayah_tmpt_tinggal\" id=\"optionsRadios1\" value=\"perkotaan\" checked>
															".PERKOTAAN."
														  </label>
														</div>
														<div class=\"radio-inline\">
														  <label>
															<input type=\"radio\" name=\"usr_wilayah_tmpt_tinggal\" id=\"optionsRadios2\" value=\"pedesaan\">
															".PEDESAAN."
														  </label>
														</div>
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".BERAPA_LAMA_ANDA_TELAH_MENGGUNAKAN__KOMPUTER_INTERNET."</label>
													<div class=\"col-sm-9\">
														".$cblmk."
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".ANGGOTA_KOMINTAS_LOKAL."</label>
													<div class=\"col-sm-9\">
														".$cbakl."
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".TINGKAT_PENDIDIKAN."</label>
													<div class=\"col-sm-9\">
														".$cbpnd."
													</div>
												</div>
												<div class=\"form-group\">
													<label class=\"col-sm-3 control-label\">".PEKERJAAN."</label>
													<div class=\"col-sm-9\">
														<input type=\"text\" name=\"usr_pekerjaan\" size=\"50\" class=\"form-control\" value=\"".$usr_pekerjaan."\"/>
													</div>
												</div>
											</div>
										</div>
										<div class=\"col-md-10 text-right\">
											<a href=\"".getInformation("dom_url",$language,$domain)."/index.php?domain=".$domain."&user=logout&language=".$language."\">
												<input type=\"button\" name=\"btnSave\" value=\"".CANCEL."\" class=\"btn btn-default\"/>
											</a>
											<botton type=\"botton\" class=\"btn btn-primary\" onclick=\"register();\">".SAVE."</botton>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>";
		return $view;
	}
	function register($request){
		extract($request,EXTR_SKIP);
		$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);

		$error = "";

		if($usr_name==""){
			$error .= NAME_IS_EMPTY."<br />";
		}
		if($usr_address==""){
			$error .= ADDRESS_IS_EMPTY."<br />";
		}

		if($du["pkey"]!="")
			$error .= PENGGUNA_SUDAH_TEREGISTER."<br />";

		if($error==""){
			$query=mysql_query("START TRANSACTION;");
			$q = array();

			$autonumber = getAutoNumberID("User",date("U"));

			$temp = explode("/",$usr_tgl_lahir);
			$tempdate = date($temp[2]."-".$temp[1]."-".$temp[0]);
			$usr_tgl_lahir = $tempdate;

			$q[] = mysql_query("INSERT INTO z_user
							    (usr_id,usr_nama,usr_alamat,usr_email,
								usr_tlpn, usr_tgl_lahir, usr_jk, agm_id,
								usr_status_perkawinan, usr_wilayah_tinggal,
								usr_lama_menggunakan_komputer, usr_komunitas_lokal,
								usr_tingkat_pendidikan,usr_pekerjaan,
								usr_nourut)
								VALUES
								('".$autonumber["NumberID"]."','".$usr_name."','".$usr_address."','".$usr_email."',
								'".$usr_hp."','".$usr_tgl_lahir."','".$usr_jk."','".$agm_id."',
								'".$usr_status_perkawinan."','".$usr_wilayah_tmpt_tinggal."',
								'".$usr_lama_menggunakan_komputer."','".$usr_anggota_komunitas_lokal."',
								'".$usr_tingkat_pendidikan."','".$usr_pekerjaan."',
								'".$autonumber["LastNumber"]."')	") or die(mysql_error());

			$q[] = mysql_query("UPDATE user
								SET name='".$usr_name."',
									email='".$usr_email."',
									pkey='".$autonumber["NumberID"]."'
								WHERE uname='".$du["uname"]."' ");

			if (!is_int(array_search(false,$q))){
				$query=mysql_query("COMMIT;");
				if ($query){
					$view = "success";
				}else{
					$view .= PROCESS_FAILED;
				}
			}else{
				$query=mysql_query("ROLLBACK;");
				$view .= PROCESS_FAILED;
			}
		}else{
			$view .= $error;
		}
		return $view;
	}
	function viewContent($request){
		extract($request,EXTR_SKIP);
		$qu = mysql_query("SELECT u.*, ug.table_relation,ug.pkey_relation FROM user u
							INNER JOIN user_group ug ON ug.id=u.usergroup
							INNER JOIN user_login l ON l.uname=u.uname
							WHERE l.cookie='".$tiket."' AND l.status='1';");
		$du = mysql_fetch_array($qu);

		//cek online consent
		$qcekconsent = mysql_query("SELECT uname FROM z_online_consent WHERE uname='".$du["uname"]."' ");
		if(($onlineconsent = mysql_num_rows($qcekconsent))==0){
			$view .= "<div class=\"row-offcanvas row-offcanvas-left skin-blue\">
						<!-- Content Header (Page header) -->
							<section class=\"content-header\">
								<h3 class=\"text-center\">
									Pelestarian Warisan Budaya Secara Digital
								</h3>
								<ol class=\"breadcrumb\">

								</ol>
							</section>

							<!-- Main content -->
							<section class=\"content\">
								".viewFormOnlineConsent($request)."
								".getLayout($request,"LayoutAdministrator","Bottom")."
							</section>
					</div>
			";
		}else if($du["pkey"]==""){
			$view .= "<div class=\"row-offcanvas row-offcanvas-left skin-blue\">
						<!-- Content Header (Page header) -->
							<section class=\"content-header\">
								<h3 class=\"text-center\">
									Pelestarian Warisan Budaya Secara Digital
								</h3>
								<ol class=\"breadcrumb\">

								</ol>
							</section>

							<!-- Main content -->
							<section class=\"content\">
								".viewDemographicSurvey($request)."
								".getLayout($request,"LayoutAdministrator","Bottom")."
							</section>
					</div>
			";
		}else{
			$v = "";
			if($action=="viewformadd"){
				$v = viewFormAdd($request);
			}elseif($action=="adddata"){
				$v = addDta($request).viewFormAdd($request);
			}else{
				$v = viewFormAdd($request);
			}
			$view .= getLayout($request,"LayoutAdministratorLTE","Top")."
					<div class=\"row-offcanvas row-offcanvas-left skin-blue\">
						<aside class=\"right-side\">
							<!-- Content Header (Page header) -->
							<section class=\"content-header\">
								<h1>
									".getTitleContent($page,$language,$domain)."
								</h1>
								<ol class=\"breadcrumb\">

								</ol>
							</section>

							<!-- Main content -->
							<section class=\"content\">
								".$v."
								".getLayout($request,"LayoutAdministrator","Bottom")."
							</section>
						</aside>
					</div>
			";
		}

		return $view;
	}

   function createHeader($request){
		extract($request,EXTR_SKIP);

		$array_kegiatan = array("Bencana","Bencana Alam","Bencana Non Alam","Bencana Sosial","Kegiatan Sosial","Upacara","Bhuta Yadnya","Dewa Yadnya","Manusa Yadnya","Pitra Yadnya","Rsi Yadnya");
		$arrayvalue_kegiatan = array("Bencana","BencanaAlam","BencanaNonAlam","BencanaSosial","KegiatanSosial","Upacara","BhutaYadnya","DewaYadnya","ManusaYadnya","PitraYadnya","RsiYadnya");
		$cbkegiatanbanjar = "<select name=\"aktivitasbanjar[][]\" id=\"aktivitasbanjar\" class=\"form-control\"><option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatanbanjar .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanbanjar .="</select>";

		$cbkegiatandesa = "<select name=\"aktivitasdesa[][]\" id=\"cbkegiatandesa\" class=\"form-control\"><option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatandesa .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatandesa .="</select>";

		$cbkegiatanpuradesa = "<select name=\"aktivitaspuradesa[][]\" id=\"cbkegiatanpuradesa\" class=\"form-control\"><option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpuradesa .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanpuradesa .="</select>";

		$cbkegiatanpurapuseh = "<select name=\"aktivitaspurapuseh[][]\" id=\"cbkegiatanpurapuseh\" class=\"form-control\"><option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpurapuseh .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanpurapuseh .="</select>";

		$cbkegiatanpuradalem = "<select name=\"aktivitaspuradalem[][]\" id=\"cbkegiatanpuradalem\" class=\"form-control\"><option value=\"\" selected=\"selected\">-</option>";
		$j = 0;
		foreach($array_kegiatan as $kgt){
			$cbkegiatanpuradalem .= "<option value=\"".$arrayvalue_kegiatan[$j]."\">".$kgt."</option>";
			$j++;
		}
		$cbkegiatanpuradalem .="</select>";
		//tambahkan script, link, css, dan lain-lain yang belum ada pada head utama (optional)
		return "<script type=\"text/javascript\" src=\"scripts/jquery/jquery-1.11.0.min.js\"></script>
				<script src=\"scripts/bootstrap/js/bootstrap.min.js\"></script>
				<script src=\"scripts/bootbox/bootbox.min.js\"></script>
				<script type=\"text/javascript\" src=\"modules/ajax.js\"></script>

				<link rel=\"stylesheet\" href=\"scripts/grid/themes/standard/style.css\" type=\"text/css\" />
				<script type=\"text/javascript\" src=\"scripts/jquery.tablesorter/jquery.tablesorter.js\"></script>
				<script type=\"text/javascript\" src=\"scripts/grid/djm.grid.js\"></script>

				<link href=\"scripts/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css\" rel=\"stylesheet\"/>
				<script src=\"scripts/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js\"></script>

				<!-- font Awesome -->
				<link href=\"scripts/AdminLTE/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />

				<!-- Theme style -->
				<link href=\"scripts/AdminLTE/css/AdminLTE.css\" rel=\"stylesheet\" type=\"text/css\" />

				<!-- AdminLTE App -->
				<script src=\"scripts/AdminLTE/js/AdminLTE/app.js\" type=\"text/javascript\"></script>
				<script src=\"scripts/AdminLTE/js/plugins/ckeditor/ckeditor.js\" type=\"text/javascript\"></script>

				<script type=\"text/javascript\" src=\"scripts/autoNumeric/autoNumeric.js\"></script>

				<script type=\"text/javascript\" src=\"scripts/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js\"></script>


				<!-- Dependencies: JQuery and GMaps API should be loaded first
				<script src=\"//maps.googleapis.com/maps/api/js?key=AIzaSyBTdW5bVp9meFgbX5skRF5HfrQA3mODMts\" async=\"\" defer=\"defer\" type=\"text/javascript\"></script>
				<link rel=\"stylesheet\" type=\"text/css\" href=\"scripts/jquery-latitude-longitude-picker-gmaps-master/css/jquery-gmaps-latlon-picker.css\"/>
				<script src=\"scripts/jquery-latitude-longitude-picker-gmaps-master/js/jquery-gmaps-latlon-picker.js\"></script>-->

				<script type=\"text/javascript\" src=\"scripts/jquery.form/jquery.form.min.js\"></script>
				<link href=\"scripts/select2/dist/css/select2.css\" rel=\"stylesheet\" />
				<script src=\"scripts/select2/dist/js/select2.js\"></script>
				
				<script languange=\"javascript\">
					$(document).ready(function() {
						$('.comboauto').select2();
						$('#usr_tgl_lahir').datetimepicker({
							format: 'dd/mm/yyyy',
							autoclose: true,
							minView:2
						});

					});
                    function addSuaraKulkulBanjar(){
                        var i = 0;
                        var length = $('#jumlahinputkulkulbanjar').val();
                        var index_arr = $('#indexbanjar').val();
                        index_arr = parseInt(index_arr);
                        index_arr++;
                        
                        length = parseInt(length);
                        var text = '';
                        var index = 1;
                        for (i = 0; i < length; i++) {
                            var ns = i + 2;
                            text += '<div class=\"form-group\">'+
												'<label class=\"col-sm-3 control-label\">".SUARA." ('+ns+')</label>'+
												'<div class=\"col-sm-4\">'+
												'	<input type=\"text\" name=\"BanjarSound['+index+']\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('+'banjar'+');\" />'+
												'</div>'+
												'<div class=\"col-md-2\">'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suarabanjar['+index+']\" id=\"optionsRadios1\" value=\"@id\" >'+
												'		".ID_."'+
												'	  </label>'+
												'	</div>'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarabanjar['+index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
												'		".BAN."'+
												'	  </label>'+
												'	</div>'+
												'</div>'+
											'</div>'+
											'<div class=\"form-group\">'+
                                            '<input type=\"hidden\" id=\"kb_index_'+index+'\" value=\"0\">'+
											'	<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>'+
											'	<div class=\"col-sm-4\">'+
											'		<table id=\"kegiatan_kulkul_banjar_'+index+'\" width=\"100%\">'+
											'			<tr id=\"kulkulbanjar_tr_0\">'+
											'				<td>'+
											'					<div class=\"input-group\">'+
											'						<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanbanjar['+index+'][0]\">'+
											'						<span class=\"input-group-addon\">'+
											'							<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulBanjar('+index+');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>'+
											'						</span>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"kegiatan_kulkul_banjar1_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<select name=\"aktivitasbanjar['+index+'][0]\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-2\">'+
											'		<table id=\"kegiatan_kulkul_banjar2_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanbanjar['+index+'][0]\" id=\"optionsRadios1\" value=\"@id\" >'+
											'						".ID_."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanbanjar['+index+'][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
											'						".BAN."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div>'+
                                            '<input type=\"hidden\" id=\"sb_index_'+index+'\" value=\"0\">'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".SOUND."</label>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"sound_kulkul_banjar_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td><input type=\"file\" name=\"sound_kulkulbanjar['+index+'][0]\" />'+
											'				<input type=\"hidden\" name=\"soundbanjarhidden['+index+'][0]\" value=\"1\"/></td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-3\">'+
											'		<table id=\"sound_kulkul_banjar_jenis_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypeBanjar['+index+'][0]\" id=\"optionsRadios1\" value=\"Actual\" >'+
											'						".ACTUAL."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypeBanjar['+index+'][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>'+
											'						".SIMULATION."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-1\">'+ 
											'		<table id=\"action_add_kulkul_banjar_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulBanjar('+index+');\" title=\"File Suara\">'+
											'					<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div><hr>';
                            index = index + 1;
                        }
                        length = length+1;
                        $('#divinputsuarakulkulbanjar').html(text);
                        $('#jumlahinputkulkulbanjar').val(length);
                        
                    }
                    
                    function addSuaraKulkulDesa(){
                        var i = 0;
                        var length = $('#jumlahinputkulkuldesa').val();
                        length = parseInt(length);
                        var text = '';
                        var index = 1;
                        for (i = 0; i < length; i++) {
                            var ns = i + 2;
                            text += '<div class=\"form-group\">'+
												'<label class=\"col-sm-3 control-label\">".SUARA." ('+ns+')</label>'+
												'<div class=\"col-sm-4\">'+
												'	<input type=\"text\" name=\"DesaSound['+index+']\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('+'desa'+');\" />'+
												'</div>'+
												'<div class=\"col-md-2\">'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suaradesa['+index+']\" id=\"optionsRadios1\" value=\"@id\" >'+
												'		".ID_."'+
												'	  </label>'+
												'	</div>'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suaradesa['+index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
												'		".BAN."'+
												'	  </label>'+
												'	</div>'+
												'</div>'+
											'</div>'+
                                            '<input type=\"hidden\" id=\"kd_index_'+index+'\" value=\"0\">'+
                                            '<input type=\"hidden\" id=\"sd_index_'+index+'\" value=\"0\">'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>'+
											'	<div class=\"col-sm-4\">'+
											'		<table id=\"kegiatan_kulkul_desa_'+index+'\" width=\"100%\">'+
											'			<tr id=\"kulkuldesa_tr_0\">'+
											'				<td>'+
											'					<div class=\"input-group\">'+  
											'						<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatandesa[][0]\">'+
											'						<span class=\"input-group-addon\">'+
											'							<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulDesa('+index+');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>'+
											'						</span>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"kegiatan_kulkul_desa1_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<select name=\"aktivitasdesa['+index+'][0]\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-2\">'+
											'		<table id=\"kegiatan_kulkul_desa2_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatandesa['+index+'][0]\" id=\"optionsRadios1\" value=\"@id\" >'+
											'						".ID_."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatandesa['+index+'][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
											'						".BAN."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div>'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".SOUND."</label>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"sound_kulkul_desa_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td><input type=\"file\" name=\"sound_kulkuldesa['+index+'][0]\" />'+
											'				<input type=\"hidden\" name=\"sounddesahidden['+index+'][0]\" value=\"1\"/></td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-3\">'+
											'		<table id=\"sound_kulkul_desa_jenis_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypeDesa['+index+'][0]\" id=\"optionsRadios1\" value=\"Actual\" >'+
											'						".ACTUAL."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypeDesa['+index+'][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>'+
											'						".SIMULATION."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+ 
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-1\">'+ 
											'		<table id=\"action_add_kulkul_desa_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulDesa('+index+');\" title=\"File Suara\">'+
											'					<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div><hr>';
                            index = index + 1;
                        }
                        length = length+1;
                        $('#divinputsuarakulkuldesa').html(text);
                        $('#jumlahinputkulkuldesa').val(length);
                        
                    }
                    
                    function addSuaraKulkulPuraDesa(){
                        var i = 0;
                        var length = $('#jumlahinputkulkulpuradesa').val();
                        length = parseInt(length);
                        var text = '';
                        var index = 1;
                        for (i = 0; i < length; i++) {
                            var ns = i + 2;
                            text += '<div class=\"form-group\">'+
												'<label class=\"col-sm-3 control-label\">".SUARA." ('+ns+')</label>'+
												'<div class=\"col-sm-4\">'+
												'	<input type=\"text\" name=\"PuraDesaSound['+index+']\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('+'puradesa'+');\" />'+
												'</div>'+
												'<div class=\"col-md-2\">'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suarapuradesa['+index+']\" id=\"optionsRadios1\" value=\"@id\" >'+
												'		".ID_."'+
												'	  </label>'+
												'	</div>'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapuradesa['+index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
												'		".BAN."'+
												'	  </label>'+
												'	</div>'+
												'</div>'+
											'</div>'+
                                            '<input type=\"hidden\" id=\"kpd_index_'+index+'\" value=\"0\">'+
                                            '<input type=\"hidden\" id=\"spd_index_'+index+'\" value=\"0\">'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>'+
											'	<div class=\"col-sm-4\">'+
											'		<table id=\"kegiatan_kulkul_pura_desa_'+index+'\" width=\"100%\">'+
											'			<tr id=\"kulkulpuradesa_tr_0\">'+
											'				<td>'+
											'					<div class=\"input-group\">'+
											'						<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradesa['+index+'][0]\">'+
											'						<span class=\"input-group-addon\">'+
											'							<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraDesa('+index+');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>'+
											'						</span>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"kegiatan_kulkul_puradesa1_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<select name=\"aktivitaspuradesa['+index+'][0]\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-2\">'+
											'		<table id=\"kegiatan_kulkul_puradesa2_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradesa['+index+'][0]\" id=\"optionsRadios1\" value=\"@id\" >'+
											'						".ID_."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradesa['+index+'][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
											'						".BAN."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div>'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".SOUND."</label>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"sound_kulkul_pura_desa_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td><input type=\"file\" name=\"sound_kulkulpuradesa['+index+'][0]\" />'+
											'				<input type=\"hidden\" name=\"soundpuradesahidden['+index+'][0]\" value=\"1\"/></td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-3\">'+
											'		<table id=\"sound_kulkul_pura_desa_jenis_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraDesa['+index+'][0]\" id=\"optionsRadios1\" value=\"Actual\" >'+
											'						".ACTUAL."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraDesa['+index+'][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>'+
											'						".SIMULATION."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-1\">'+ 
											'		<table id=\"action_add_kulkul_pura_desa_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraDesa('+index+');\" title=\"File Suara\">'+
											'					<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div><hr>';
                            index = index + 1;
                        }
                        length = length+1;
                        $('#divinputsuarakulkulpuradesa').html(text);
                        $('#jumlahinputkulkulpuradesa').val(length);
                        
                    }
                    
                    function addSuaraKulkulPuraPuseh(){
                        var i = 0;
                        var length = $('#jumlahinputkulkulpurapuseh').val();
                        length = parseInt(length);
                        var text = '';
                        var index = 1;
                        for (i = 0; i < length; i++) {
                            var ns = i + 2;
                            text += '<div class=\"form-group\">'+
												'<label class=\"col-sm-3 control-label\">".SUARA." ('+ns+')</label>'+
												'<div class=\"col-sm-4\">'+
												'	<input type=\"text\" name=\"PuraPusehSound['+index+']\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('+'purapuseh'+');\" />'+
												'</div>'+
												'<div class=\"col-md-2\">'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suarapurapuseh['+index+']\" id=\"optionsRadios1\" value=\"@id\" >'+
												'		".ID_."'+
												'	  </label>'+
												'	</div>'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapurapuseh['+index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
												'		".BAN."'+
												'	  </label>'+
												'	</div>'+
												'</div>'+
											'</div>'+
                                            '<input type=\"hidden\" id=\"kpp_index_'+index+'\" value=\"0\">'+
                                            '<input type=\"hidden\" id=\"spp_index_'+index+'\" value=\"0\">'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>'+
											'	<div class=\"col-sm-4\">'+
											'		<table id=\"kegiatan_kulkul_pura_puseh_'+index+'\" width=\"100%\">'+
											'			<tr id=\"kulkulpurapuseh_tr_0\">'+
											'				<td>'+
											'					<div class=\"input-group\">'+
											'						<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpurapuseh['+index+'][0]\">'+
											'						<span class=\"input-group-addon\">'+
											'							<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraPuseh('+index+');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>'+
											'						</span>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"kegiatan_kulkul_purapuseh1_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<select name=\"aktivitaspurapuseh['+index+'][0]\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-2\">'+
											'		<table id=\"kegiatan_kulkul_purapuseh2_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpurapuseh['+index+'][0]\" id=\"optionsRadios1\" value=\"@id\" >'+
											'						".ID_."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpurapuseh['+index+'][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
											'						".BAN."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div>'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".SOUND."</label>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"sound_kulkul_pura_puseh_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td><input type=\"file\" name=\"sound_kulkulpurapuseh['+index+'][0]\" />'+
											'				<input type=\"hidden\" name=\"soundpurapusehhidden['+index+'][0]\" value=\"1\"/></td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-3\">'+
											'		<table id=\"sound_kulkul_pura_puseh_jenis_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraPuseh['+index+'][0]\" id=\"optionsRadios1\" value=\"Actual\" >'+
											'						".ACTUAL."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraPuseh['+index+'][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>'+
											'						".SIMULATION."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-1\">'+ 
											'		<table id=\"action_add_kulkul_pura_puseh_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraPuseh('+index+');\" title=\"File Suara\">'+
											'					<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div><hr>';
                            index = index + 1;
                        }
                        length = length+1;
                        $('#divinputsuarakulkulpurapuseh').html(text);
                        $('#jumlahinputkulkulpurapuseh').val(length);
                        
                    }
                    
                    function addSuaraKulkulPuraDalem(){
                        var i = 0;
                        var length = $('#jumlahinputkulkulpuradalem').val();
                        length = parseInt(length);
                        var text = '';
                        var index = 1;
                        for (i = 0; i < length; i++) {
                            var ns = i + 2;
                            text += '<div class=\"form-group\">'+
												'<label class=\"col-sm-3 control-label\">".SUARA." ('+ns+')</label>'+
												'<div class=\"col-sm-4\">'+
												'	<input type=\"text\" name=\"PuraDalemSound['+index+']\" class=\"form-control autocompletesound\" onkeydown=\"autoCompleteSound('+'puradalem'+');\" />'+
												'</div>'+
												'<div class=\"col-md-2\">'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\"  title=\"Indonesian Language\" name=\"Lang_suarapuradalem['+index+']\" id=\"optionsRadios1\" value=\"@id\" >'+
												'		".ID_."'+
												'	  </label>'+
												'	</div>'+
												'	<div class=\"radio-inline\">'+
												'	  <label>'+
												'		<input type=\"radio\" title=\"Balinese Language\" name=\"Lang_suarapuradalem['+index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
												'		".BAN."'+
												'	  </label>'+
												'	</div>'+
												'</div>'+
											'</div>'+
                                            '<input type=\"hidden\" id=\"kpdlm_index_'+index+'\" value=\"0\">'+
                                            '<input type=\"hidden\" id=\"spdlm_index_'+index+'\" value=\"0\">'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".KEGIATAN."</label>'+
											'	<div class=\"col-sm-4\">'+
											'		<table id=\"kegiatan_kulkul_pura_dalem_'+index+'\" width=\"100%\">'+
											'			<tr id=\"kulkulpuradalem_tr_0\">'+
											'				<td>'+
											'					<div class=\"input-group\">'+
											'						<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradalem['+index+'][0]\">'+
											'						<span class=\"input-group-addon\">'+
											'							<a href=\"javascript:void(0);\" onclick=\"addKegiatanKulkulPuraDalem('+index+');\" title=\"Tambah Kegiatan\"><i class=\"fa fa-plus-circle \"></i></a>'+
											'						</span>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"kegiatan_kulkul_puradalem1_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<select name=\"aktivitaspuradalem['+index+'][0]\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-2\">'+
											'		<table id=\"kegiatan_kulkul_puradalem2_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradalem['+index+'][0]\" id=\"optionsRadios1\" value=\"@id\" >'+
											'						".ID_."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradalem['+index+'][0]\" id=\"optionsRadios2\" value=\"@ban\" checked>'+
											'						".BAN."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div>'+
											'<div class=\"form-group\">'+
											'	<label class=\"col-sm-3 control-label\">".SOUND."</label>'+
											'	<div class=\"col-sm-3\">'+
											'		<table id=\"sound_kulkul_pura_dalem_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td><input type=\"file\" name=\"sound_kulkulpuradalem['+index+'][0]\" />'+
											'				<input type=\"hidden\" name=\"soundpuradalemhidden['+index+'][0]\" value=\"1\"/></td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-md-3\">'+
											'		<table id=\"sound_kulkul_pura_dalem_jenis_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraDalem['+index+'][0]\" id=\"optionsRadios1\" value=\"Actual\" >'+
											'						".ACTUAL."'+
											'					  </label>'+
											'					</div>'+
											'					<div class=\"radio-inline\">'+
											'					  <label>'+
											'						<input type=\"radio\" name=\"ResourceTypePuraDalem['+index+'][0]\" id=\"optionsRadios2\" value=\"Simulation\" checked>'+
											'						".SIMULATION."'+
											'					  </label>'+
											'					</div>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'	<div class=\"col-sm-1\">'+ 
											'		<table id=\"action_add_kulkul_pura_dalem_'+index+'\" width=\"100%\">'+
											'			<tr>'+
											'				<td>'+
											'					<a href=\"javascript:void(0);\" onclick=\"addSoundKulkulPuraDalem('+index+');\" title=\"File Suara\">'+
											'					<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus-circle\"></i></button></a>'+
											'				</td>'+
											'			</tr>'+
											'		</table>'+
											'	</div>'+
											'</div><hr>';
                            index = index + 1;
                        }
                        length = length+1;
                        $('#divinputsuarakulkulpuradalem').html(text);
                        $('#jumlahinputkulkulpuradalem').val(length);
                        
                    }
                    
					function changeComboDistrict(kab_desc,kode){
						showLoading();
						if (kab_desc==''){
							kab_desc = $('#Kabupaten').val();
						}
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changecombodistrict&kab_desc='+kab_desc+'&kode='+kode;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divdistrict').html(response);
									hideLoading();
								}
							});
					}
					function autoCompleteRegency(){
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompleteregency&keyword='+$('.autocompleteregency').val(), function(data){
							$('.autocompleteregency').typeahead({ source:data });
						},'json');
					}
					function autoCompleteDistricts(){
						var kab_desc = $('#regency').val();
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompletedistricts&kab_desc='+kab_desc+'&keyword='+$('.autocompletedistricts').val(), function(data){
							$('.autocompletedistricts').typeahead({ source:data });
						},'json');
					}
					function autoCompleteVillage(){
						var kec_desc = $('#Kecamatan').val();
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompletevillage&kec_desc='+kec_desc+'&keyword='+$('.autocompletevillage').val(), function(data){
							$('.autocompletevillage').typeahead({ source:data });
							$('#pura_desa').typeahead({ source:data });
							$('#pura_puseh').typeahead({ source:data });
							$('#pura_dalem').typeahead({ source:data });
						},'json');
					}
					function autoCompleteBanjar(){
						var desa_desc = $('#village').val();
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompletebanjar&desa_desc='+desa_desc+'&keyword='+$('.autocompletebanjar').val(), function(data){
							$('.autocompletebanjar').typeahead({ source:data });
						},'json');
					}
					function autoCompleteSound(tempat){
						if(tempat=='banjar'){
							var nama_tempat = $('#banjar').val();
						}else if(tempat=='desa'){
							var nama_tempat = $('#village').val();
						}else if(tempat=='puradesa'){
							var nama_tempat = $('#pura_desa').val();
						}else if(tempat=='purapuseh'){
							var nama_tempat = $('#pura_puseh').val();
						}else if(tempat=='puradalem'){
							var nama_tempat = $('#pura_dalem').val();
						}

						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompletesound&nama_tempat='+nama_tempat+'&keyword='+$('.autocompletesound').val(), function(data){
							$('.autocompletesound').typeahead({ source:data });
						},'json');
					}
					function autoCompleteActivity(){
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompleteactivity&keyword='+$('.autocompleteactivity').val(), function(data){
							$('.autocompleteactivity').typeahead({ source:data });
						},'json');
					}
					function autoCompleteRawMaterial(){
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompleterawmaterial&keyword='+$('.autocompleterawmaterial').val(), function(data){
							$('.autocompleterawmaterial').typeahead({ source:data });
						},'json');
					}
					function autoCompletePakaianKulkul(){
						$.get('index.php?domain=".$domain."&page=".$page."&language=".$language."&action=autocompletepakaiankulkul&keyword='+$('.autocompletepakaiankulkul').val(), function(data){
							$('.autocompletepakaiankulkul').typeahead({ source:data });
						},'json');
					}
					function addPuraDalem(){
						$('#add_pura_dalem tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"text\" class=\"form-control\" name=\"PuraDalem[]\"> '+
								'</td>'+
							'</tr>');
					}
					function addGambarKulkulBanjar(){
						$('#gambar_kulkul_banjar tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"file\" name=\"img_kulkul_banjar[]\" /> <input type=\"hidden\" name=\"kulkulbanjar[]\" value=\"1\"/>'+
								'</td>'+
								'<td>'+
									'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
									'onclick=\"$(this).parent().parent().remove();\"><i class=\"fa fa-times fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
					}
					function addGambarKulkulDesa(){
						$('#gambar_kulkul_desa tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"file\" name=\"img_kulkul_desa[]\" /> <input type=\"hidden\" name=\"kulkuldesa[]\" value=\"1\"/>'+
								'</td>'+
								'<td>'+
									'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
									'onclick=\"$(this).parent().parent().remove();\"><i class=\"fa fa-times fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
					}
					function addGambarKulkulPuraDesa(){
						$('#gambar_kulkul_pura_desa tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"file\" name=\"img_kulkul_pura_desa[]\" /> <input type=\"hidden\" name=\"kulkulpuradesa[]\" value=\"1\"/>'+
								'</td>'+
								'<td>'+
									'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
									'onclick=\"$(this).parent().parent().remove();\"><i class=\"fa fa-times fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
					}
					function addGambarKulkulPuraPuseh(){
						$('#gambar_kulkul_pura_puseh tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"file\" name=\"img_kulkul_pura_puseh[]\" /> <input type=\"hidden\" name=\"kulkulpurapuseh[]\" value=\"1\"/>'+
								'</td>'+
								'<td>'+
									'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
									'onclick=\"$(this).parent().parent().remove();\"><i class=\"fa fa-times fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
					}
					function addGambarKulkulPuraDalem(){
						$('#gambar_kulkul_pura_dalem tbody').append('<tr>'+
								'<td>'+
									'<br /><input type=\"file\" name=\"img_kulkul_pura_dalem[]\" /> <input type=\"hidden\" name=\"kulkulpuradalem[]\" value=\"1\"/>'+
								'</td>'+
								'<td>'+
									'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
									'onclick=\"$(this).parent().parent().remove();\"><i class=\"fa fa-times fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
					}
					function deleteRowSoundBanjar(i){
						$('#soundkulkulbanjar_tr_'+i).remove();
						$('#soundkulkulbanjar1_tr_'+i).remove();
						$('#soundkulkulbanjar2_tr_'+i).remove();
					}
					function deleteRowSoundDesa(i){
						$('#soundkulkuldesa_tr_'+i).remove();
						$('#soundkulkuldesa1_tr_'+i).remove();
						$('#soundkulkuldesa2_tr_'+i).remove();
					}
					function deleteRowSoundPuraDesa(i){
						$('#soundkulkulpuradesa_tr_'+i).remove();
						$('#soundkulkulpuradesa1_tr_'+i).remove();
						$('#soundkulkulpuradesa2_tr_'+i).remove();
					}
					function deleteRowSoundPuraPuseh(i){
						$('#soundkulkulpurapuseh_tr_'+i).remove();
						$('#soundkulkulpurapuseh1_tr_'+i).remove();
						$('#soundkulkulpurapuseh2_tr_'+i).remove();
					}
					function deleteRowSoundPuraDalem(i){
						$('#soundkulkulpuradalem_tr_'+i).remove();
						$('#soundkulkulpuradalem1_tr_'+i).remove();
						$('#soundkulkulpuradalem2_tr_'+i).remove();
					}
					var i = 0;
					function addSoundKulkulBanjar(index){
						i++;
                        var sb_index = $('#sb_index_'+index).val();
                        sb_index = parseInt(sb_index);
                        sb_index++;
						$('#sound_kulkul_banjar_'+index+' tbody').append('<tr id=\"soundkulkulbanjar_tr_'+i+'\">'+
								'<td>'+
									'<br /><input type=\"file\" name=\"sound_kulkulbanjar['+index+']['+sb_index+']\" /><input type=\"hidden\" name=\"soundbanjarhidden['+index+']['+sb_index+']\" value=\"1\"/> '+
								'</td>'+
							'</tr>');
						$('#sound_kulkul_banjar_jenis_'+index+' tbody').append('<tr id=\"soundkulkulbanjar1_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypeBanjar['+index+']['+sb_index+']\" id=\"optionsRadios1\" value=\"Actual\" checked>".ACTUAL."'+
											'</label>'+
											'</div>'+
											'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypeBanjar['+index+']['+sb_index+']\" id=\"optionsRadios2\" value=\"Simulation\">".SIMULATION."'+
											'</label>'+
											'</div> '+
								'</td>'+
							'</tr>');
						$('#action_add_kulkul_banjar_'+index+' tbody').append('<tr id=\"soundkulkulbanjar2_tr_'+i+'\">'+
								'<td>'+
									'<br /><a href=\"javascript:void(0);\" onclick=\"deleteRowSoundBanjar('+i+');\" title=\"".DELETE_ROW."\">'+
									'<i class=\"fa fa-times-circle fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
                        $('#sb_index_'+index).val(sb_index);

					}
					var i = 0;
					function addSoundKulkulDesa(index){
						i++;
                        var sd_index = $('#sd_index_'+index).val();
                        sd_index = parseInt(sd_index);
                        sd_index++;
						$('#sound_kulkul_desa_'+index+' tbody').append('<tr id=\"soundkulkuldesa_tr_'+i+'\">'+
								'<td>'+
									'<br /><input type=\"file\" name=\"sound_kulkuldesa['+index+']['+sd_index+']\" /> <input type=\"hidden\" name=\"sounddesahidden['+index+']['+sd_index+']\" value=\"1\"/>'+
								'</td>'+
							'</tr>');
						$('#sound_kulkul_desa_jenis_'+index+' tbody').append('<tr id=\"soundkulkuldesa1_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypeDesa['+index+']['+sd_index+']\" id=\"optionsRadios1\" value=\"Actual\" >".ACTUAL."'+
											'</label>'+
											'</div>'+
											'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypeDesa['+index+']['+sd_index+']\" id=\"optionsRadios2\" value=\"Simulation\"checked>".SIMULATION."'+
											'</label>'+
											'</div> '+
								'</td>'+
							'</tr>');
						$('#action_add_kulkul_desa_'+index+' tbody').append('<tr id=\"soundkulkuldesa2_tr_'+i+'\">'+
								'<td>'+
									'<br /><a href=\"javascript:void(0);\" onclick=\"deleteRowSoundDesa('+i+');\" title=\"".DELETE_ROW."\">'+
									'<i class=\"fa fa-times-circle fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
                        $('#sd_index_'+index).val(sd_index);
					}
					var i = 0;
					function addSoundKulkulPuraDesa(index){
						i++;
                        var spd_index = $('#spd_index_'+index).val();
                        spd_index = parseInt(spd_index);
                        spd_index++;
						$('#sound_kulkul_pura_desa_'+index+' tbody').append('<tr id=\"soundkulkulpuradesa_tr_'+i+'\">'+
								'<td>'+
									'<br /><input type=\"file\" name=\"sound_kulkulpuradesa['+index+']['+spd_index+']\" /> <input type=\"hidden\" name=\"soundpuradesahidden['+index+']['+spd_index+']\" value=\"1\"/>'+
								'</td>'+
							'</tr>');

						$('#sound_kulkul_pura_desa_jenis_'+index+' tbody').append('<tr id=\"soundkulkulpuradesa1_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraDesa['+index+']['+spd_index+']\" id=\"optionsRadios1\" value=\"Actual\" >".ACTUAL."'+
											'</label>'+
											'</div>'+
											'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraDesa['+index+']['+spd_index+']\" id=\"optionsRadios2\" value=\"Simulation\" checked>".SIMULATION."'+
											'</label>'+
											'</div> '+
								'</td>'+
							'</tr>');

						$('#action_add_kulkul_pura_desa_'+index+' tbody').append('<tr id=\"soundkulkulpuradesa2_tr_'+i+'\">'+
								'<td>'+
									'<br /><a href=\"javascript:void(0);\" onclick=\"deleteRowSoundPuraDesa('+i+');\" title=\"".DELETE_ROW."\">'+
									'<i class=\"fa fa-times-circle fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
                        $('#spd_index_'+index).val(spd_index);
					}
					var i = 0;
					function addSoundKulkulPuraPuseh(index){
						i++;
                        var spp_index = $('#spp_index_'+index).val();
                        spp_index = parseInt(spp_index);
                        spp_index++;
						$('#sound_kulkul_pura_puseh_'+index+' tbody').append('<tr id=\"soundkulkulpurapuseh_tr_'+i+'\">'+
								'<td>'+
									'<br /><input type=\"file\" name=\"sound_kulkulpurapuseh['+index+']['+spp_index+']\" /> <input type=\"hidden\" name=\"soundpurapusehhidden['+index+']['+spp_index+']\" value=\"1\"/>'+
								'</td>'+
							'</tr>');

						$('#sound_kulkul_pura_puseh_jenis_'+index+' tbody').append('<tr id=\"soundkulkulpurapuseh1_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraPuseh['+index+']['+spp_index+']\" id=\"optionsRadios1\" value=\"Actual\" >".ACTUAL."'+
											'</label>'+
											'</div>'+
											'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraPuseh['+index+']['+spp_index+']\" id=\"optionsRadios2\" value=\"Simulation\" checked>".SIMULATION."'+
											'</label>'+
											'</div> '+
								'</td>'+
							'</tr>');

						$('#action_add_kulkul_pura_puseh tbody').append('<tr id=\"soundkulkulpurapuseh2_tr_'+i+'\">'+
								'<td>'+
									'<br /><a href=\"javascript:void(0);\" onclick=\"deleteRowSoundPuraPuseh('+i+');\" title=\"".DELETE_ROW."\">'+
									'<i class=\"fa fa-times-circle fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
                        $('#spp_index_'+index).val(spp_index);
					}
					var i = 0;
					function addSoundKulkulPuraDalem(index){
						i++;
                        var spdlm_index = $('#spdlm_index_'+index).val();
                        spdlm_index = parseInt(spdlm_index);
                        spdlm_index++;
						$('#sound_kulkul_pura_dalem_'+index+' tbody').append('<tr id=\"soundkulkulpuradalem_tr_'+i+'\">'+
								'<td>'+
									'<br /><input type=\"file\" name=\"sound_kulkulpuradalem['+index+']['+spdlm_index+']\" /> <input type=\"hidden\" name=\"soundpuradalemhidden['+index+']['+spdlm_index+']\" value=\"1\"/> '+
								'</td>'+
							'</tr>');

						$('#sound_kulkul_pura_dalem_jenis_'+index+' tbody').append('<tr id=\"soundkulkulpuradalem1_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraDalem['+index+']['+spdlm_index+']\" id=\"optionsRadios1\" value=\"Actual\" >".ACTUAL."'+
											'</label>'+
											'</div>'+
											'<div class=\"radio-inline\">'+
											'<label>'+
												'<input type=\"radio\" name=\"ResourceTypePuraDalem['+index+']['+spdlm_index+']\" id=\"optionsRadios2\" value=\"Simulation\" checked>".SIMULATION."'+
											'</label>'+
											'</div> '+
								'</td>'+
							'</tr>');

						$('#action_add_kulkul_pura_dalem tbody').append('<tr id=\"soundkulkulpuradalem2_tr_'+i+'\">'+
								'<td>'+
									'<br /><a href=\"javascript:void(0);\" onclick=\"deleteRowSoundPuraDalem('+i+');\" title=\"".DELETE_ROW."\">'+
									'<i class=\"fa fa-times-circle fa-lg\"></i></a>'+
								'</td>'+
							'</tr>');
                        $('#spdlm_index_'+index).val(spdlm_index);
					}
					function deleteRowKegiatanBanjar(i){
						$('#kulkulbanjar_tr_'+i).remove();
						$('#kulkulbanjar1_tr_'+i).remove();
						$('#kulkulbanjar2_tr_'+i).remove();
					}
					function deleteRowKegiatanDesa(i){
						$('#kulkuldesa_tr_'+i).remove();
						$('#kulkuldesa1_tr_'+i).remove();
						$('#kulkuldesa2_tr_'+i).remove();
					}
					function deleteRowKegiatanPuraDesa(i){
						$('#kulkulpuradesa_tr_'+i).remove();
						$('#kulkulpuradesa1_tr_'+i).remove();
						$('#kulkulpuradesa2_tr_'+i).remove();
					}
					function deleteRowKegiatanPuraPuseh(i){
						$('#kulkulpurapuseh_tr_'+i).remove();
						$('#kulkulpurapuseh1_tr_'+i).remove();
						$('#kulkulpurapuseh2_tr_'+i).remove();
					}
					function deleteRowKegiatanPuraDalem(i){
						$('#kulkulpuradalem_tr_'+i).remove();
						$('#kulkulpuradalem1_tr_'+i).remove();
						$('#kulkulpuradalem2_tr_'+i).remove();
					}
					var banjar_i = 0;
					function addKegiatanKulkulBanjar(index){
						banjar_i++;
                        var kb_index = $('#kb_index_'+index).val();
                        kb_index = parseInt(kb_index);
                        kb_index++;
						$('#kegiatan_kulkul_banjar_'+index+' tbody').append('<tr id=\"kulkulbanjar_tr_'+banjar_i+'\">'+
								'<td>'+
									'<div class=\"input-group\">'+
										'<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanbanjar['+index+']['+kb_index+']\">'+
										'<span class=\"input-group-addon\">'+
											'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
											'onclick=\"deleteRowKegiatanBanjar('+banjar_i+')\"><i class=\"fa fa-times-circle\"></i></a>'+
										'</span>'+
									'</div>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_banjar1_'+index+' tbody').append('<tr id=\"kulkulbanjar1_tr_'+banjar_i+'\">'+
								'<td><select name=\"aktivitasbanjar['+index+']['+kb_index+']\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_banjar2_'+index+' tbody').append('<tr id=\"kulkulbanjar2_tr_'+banjar_i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanbanjar['+index+']['+kb_index+']\" id=\"optionsRadios1\" value=\"@id\" >".ID_."'+
										'</label>'+
									'</div>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanbanjar['+index+']['+kb_index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>".BAN."'+
										'</label>'+
									'</div>'+
								'</td>'+
							'</tr>');
                         $('#kb_index_'+index).val(kb_index);
					}
					var i = 0;
					function addKegiatanKulkulDesa(index){
						i++;
                        var kd_index = $('#kd_index_'+index).val();
                        kd_index = parseInt(kd_index);
                        kd_index++;
						$('#kegiatan_kulkul_desa_'+index+' tbody').append('<tr id=\"kulkuldesa_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"input-group\">'+
										'<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatandesa['+index+']['+kd_index+']\">'+
								        '<span class=\"input-group-addon\">'+
                                            '<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
											'onclick=\"deleteRowKegiatanDesa('+i+')\"><i class=\"fa fa-times-circle\"></i></a>'+
										'</span>'+
									'</div>'+
								'</td>'+
							'</tr>');

						$('#kegiatan_kulkul_desa1_'+index+' tbody').append('<tr id=\"kulkuldesa1_tr_'+i+'\">'+
								'<td><select name=\"aktivitasdesa['+index+']['+kd_index+']\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_desa2_'+index+' tbody').append('<tr id=\"kulkuldesa2_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatandesa['+index+']['+kd_index+']\" id=\"optionsRadios1\" value=\"@id\" >".ID_."'+
										'</label>'+
									'</div>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatandesa['+index+']['+kd_index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>".BAN."'+
										'</label>'+
									'</div>'+
								'</td>'+
							'</tr>');
                        $('#kd_index_'+index).val(kd_index);
					}
					var i = 0;
					function addKegiatanKulkulPuraDesa(index){
						i++;
                        var kpd_index = $('#kpd_index_'+index).val();
                        kpd_index = parseInt(kpd_index);
                        kpd_index++;
						$('#kegiatan_kulkul_pura_desa_'+index+' tbody').append('<tr id=\"kulkulpuradesa_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"input-group\">'+
										'<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradesa['+index+']['+kpd_index+']\">'+
										'<span class=\"input-group-addon\">'+
											'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
											'onclick=\"deleteRowKegiatanPuraDesa('+i+')\"><i class=\"fa fa-times-circle\"></i></a>'+
										'</span>'+
									'</div>'+
								'</td>'+
							'</tr>');

						$('#kegiatan_kulkul_puradesa1_'+index+' tbody').append('<tr id=\"kulkulpuradesa1_tr_'+i+'\">'+
								'<td><select name=\"aktivitaspuradesa['+index+']['+kpd_index+']\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_puradesa2_'+index+' tbody').append('<tr id=\"kulkulpuradesa2_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradesa['+index+']['+kpd_index+']\" id=\"optionsRadios1\" value=\"@id\" >".ID_."'+
										'</label>'+
									'</div>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradesa['+index+']['+kpd_index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>".BAN."'+
										'</label>'+
									'</div>'+
								'</td>'+
							'</tr>');
                        $('#kpd_index_'+index).val(kpd_index);
					}
					var i = 0;
					function addKegiatanKulkulPuraPuseh(index){
						i++;
                        var kpp_index = $('#kpp_index_'+index).val();
                        kpp_index = parseInt(kpp_index);
                        kpp_index++;
						$('#kegiatan_kulkul_pura_puseh_'+index+' tbody').append('<tr id=\"kulkulpurapuseh_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"input-group\">'+
										'<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpurapuseh['+index+']['+kpp_index+']\">'+
										'<span class=\"input-group-addon\">'+
											'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
											'onclick=\"deleteRowKegiatanPuraPuseh('+i+')\"><i class=\"fa fa-times-circle\"></i></a>'+
										'</span>'+
									'</div>'+
								'</td>'+
							'</tr>');

						$('#kegiatan_kulkul_purapuseh1_'+index+' tbody').append('<tr id=\"kulkulpurapuseh1_tr_'+i+'\">'+
								'<td><select name=\"aktivitaspurapuseh['+index+']['+kpp_index+']\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_purapuseh2_'+index+' tbody').append('<tr id=\"kulkulpurapuseh2_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpurapuseh['+index+']['+kpp_index+']\" id=\"optionsRadios1\" value=\"@id\" >".ID_."'+
										'</label>'+
									'</div>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpurapuseh['+index+']['+kpp_index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>".BAN."'+
										'</label>'+
									'</div>'+
								'</td>'+
							'</tr>');
                        $('#kpp_index_'+index).val(kpp_index);
					}
					var i = 0;
					function addKegiatanKulkulPuraDalem(index){
						i++;
                        var kpdlm_index = $('#kpdlm_index_'+index).val();
                        kpdlm_index = parseInt(kpdlm_index);
                        kpdlm_index++;
						$('#kegiatan_kulkul_pura_dalem_'+index+' tbody').append('<tr id=\"kulkulpuradalem_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"input-group\">'+
										'<input type=\"text\" class=\"form-control autocompleteactivity\" onkeydown=\"autoCompleteActivity();\" name=\"Kegiatanpuradalem['+index+']['+kpdlm_index+']\">'+
										'<span class=\"input-group-addon\">'+
											'<a href=\"javascript:void(0);\" title=\"".DELETE_ROW."\" '+
											'onclick=\"deleteRowKegiatanPuraDalem('+i+')\"><i class=\"fa fa-times-circle\"></i></a>'+
										'</span>'+
									'</div>'+
								'</td>'+
							'</tr>');

						$('#kegiatan_kulkul_puradalem1_'+index+' tbody').append('<tr id=\"kulkulpuradalem1_tr_'+i+'\">'+
								'<td><select name=\"aktivitaspuradalem['+index+']['+kpdlm_index+']\" id=\"aktivitas\" class=\"form-control\">'+
					                                               '<option value=\"\" selected=\"selected\">-</option>'+
                                                                   '<option value=\"Bencana\">Bencana</option>'+
                                                                   '<option value=\"BencanaAlam\">Bencana Alam</option>'+
                                                                   '<option value=\"BencanaNonAlam\">Bencana Non Alam</option>'+
                                                                   '<option value=\"BencanaSosial\">Bencana Sosial</option>'+
                                                                   '<option value=\"KegiatanSosial\">Kegiatan Sosial</option>'+
                                                                   '<option value=\"Upacara\">Upacara</option>'+
                                                                   '<option value=\"BhutaYadnya\">Bhuta Yadnya</option>'+
                                                                   '<option value=\"DewaYadnya\">Dewa Yadnya</option>'+
                                                                   '<option value=\"ManusaYadnya\">Manusa Yadnya</option>'+
                                                                   '<option value=\"PitraYadnya\">Pitra Yadnya</option>'+
                                                                   '<option value=\"RsiYadnya\">Rsi Yadnya</option></select>'+
								'</td>'+
							'</tr>');
						$('#kegiatan_kulkul_puradalem2_'+index+' tbody').append('<tr id=\"kulkulpuradalem2_tr_'+i+'\">'+
								'<td>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Indonesian Language\" name=\"Langkegiatanpuradalem['+index+']['+kpdlm_index+']\" id=\"optionsRadios1\" value=\"@id\" >".ID_."'+
										'</label>'+
									'</div>'+
									'<div class=\"radio-inline\">'+
										'<label>'+
											'<input type=\"radio\" title=\"Balinese Language\" name=\"Langkegiatanpuradalem['+index+']['+kpdlm_index+']\" id=\"optionsRadios2\" value=\"@ban\" checked>".BAN."'+
										'</label>'+
									'</div>'+
								'</td>'+
							'</tr>');
                        $('#kpdlm_index_'+index).val(kpdlm_index);
					}
					function fillPura(){
						var desa = $('#village').val();
						var pura_desa = 'PuraDesa'+desa;
						var pura_dalem = 'PuraDalem'+desa;
						var pura_puseh = 'PuraPuseh'+desa;
						$('#pura_desa').val(pura_desa);
						$('#pura_puseh').val(pura_puseh);
						$('#pura_dalem').val(pura_dalem);
					}

					function addData(){
                        
                        showLoading();
                        var ds_latitude = $('iframe[name=framemapdesa]').contents().find('#ds_latitude').val();						
						var ds_longitude = $('iframe[name=framemapdesa]').contents().find('#ds_longitude').val();
						
						var bnj_latitude = $('iframe[name=framemapbanjar]').contents().find('#bnj_latitude').val();						
						var bnj_longitude = $('iframe[name=framemapbanjar]').contents().find('#bnj_longitude').val();
						
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=adddata&ds_latitude='+ds_latitude+'&ds_longitude='+ds_longitude+'&bnj_latitude='+bnj_latitude+'&bnj_longitude='+bnj_longitude;
                        var query = $('#FormAdd').serialize();
						
                        //event.preventDefault();
						var formData = new FormData($('#FormAdd')[0]);
						$.ajax({
								type: 'POST',
								url: urltarget,
								data: formData,
								async: false,
								cache: false,
								contentType: false,
								processData: false,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									if(response=='success'){
										bootbox.alert('".PROCESS_SUCCESS."');
										location.href='?page=".$page."&language=".$language."&domain=".$domain."';
									}else{
										bootbox.alert(response);
									}
									hideLoading();
								}
							}); 
					}
					function addOnlineConsent(){
						showLoading();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=addonlineconsent';

						$('#FormAddOnlineConsent').ajaxSubmit({
							type: 'POST',
							url: urltarget,
							success: function(response){
								hideLoading();
								response = response.replace(/^\s+|\s+$/g,'');
								if(response=='success'){
									bootbox.alert('".PROCESS_SUCCESS."');
									location.href='".getInformation("URLRoot",$language)."/index.php';
								}else{
									bootbox.alert(response);
								}
							}
						});
					}
					function register(){
						showLoading();
						var urltarget = '?page=".$page."&language=".$language."&domain=".$domain."&action=register';
						var query = $('#formRegistrasi').serialize();
						$.ajax({
								type: 'POST',
								url: urltarget,
								data: query,
								success: function(response){
									hideLoading();
									response = response.replace(/^\s+|\s+$/g,'');
									if(response=='success'){
										bootbox.alert('".PROCESS_SUCCESS."');
										location.href='".getInformation("URLRoot",$language)."/index.php';
									}else{
										bootbox.alert(response);
									}

								}
							});
					}
					function viewFormMapsDesa(){
						showLoading();
						var urltarget = '?page=".$page."';
						var query = 'action=viewformmapsdesa';
						$.ajax({
							type: 'GET',
							url:urltarget,
							data:query,
							success:function(response){
								$('#TargetContentLarge').html(response);
								$('#ModalFormLarge').modal('show');
								hideLoading();
							}
						})
					}
					function applyMapDesa(){
						$('#ModalFormLarge').modal('hide');
						var ds_latitude = $('iframe[name=framemapdesa]').contents().find('#ds_latitude').val();						
						var ds_longitude = $('iframe[name=framemapdesa]').contents().find('#ds_longitude').val();
						$('#desa_latitude').val(ds_latitude);
						$('#desa_longitude').val(ds_longitude);
					}
					function viewFormMapsBanjar(){
						showLoading();
						var urltarget = '?page=".$page."';
						var query = 'action=viewformmapsbanjar';
						$.ajax({
							type: 'GET',
							url:urltarget,
							data:query,
							success:function(response){
								$('#TargetContentLarge').html(response);
								$('#ModalFormLarge').modal('show');
								hideLoading();
							}
						})
					}
					function applyMapBanjar(){
						$('#ModalFormLarge').modal('hide');
						var bnj_latitude = $('iframe[name=framemapbanjar]').contents().find('#bnj_latitude').val();						
						var bnj_longitude = $('iframe[name=framemapbanjar]').contents().find('#bnj_longitude').val();
						$('#banjar_latitude').val(bnj_latitude);
						$('#banjar_longitude').val(bnj_longitude);
					}
                    function changeKulkulBanjar(){
						showLoading();
						var jumlah = $('#jumlahkulkulbanjar').val();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changekulkulbanjar&jumlah='+jumlah;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divkulkulbanjar').html(response);
									hideLoading();
								}
							});
					}
                    function changeKulkulDesa(){
						showLoading();
						var jumlah = $('#jumlahkulkuldesa').val();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changekulkuldesa&jumlah='+jumlah;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divkulkuldesa').html(response);
									hideLoading();
								}
							});
					}
                    function changeKulkulPuraDesa(){
						showLoading();
						var jumlah = $('#jumlahkulkulpuradesa').val();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changekulkulpuradesa&jumlah='+jumlah;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divkulkulpuradesa').html(response);
									hideLoading();
								}
							});
					}
                    function changeKulkulPuraPuseh(){
						showLoading();
						var jumlah = $('#jumlahkulkulpurapuseh').val();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changekulkulpurapuseh&jumlah='+jumlah;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divkulkulpurapuseh').html(response);
									hideLoading();
								}
							});
					}
                    function changeKulkulPuraDalem(){
						showLoading();
						var jumlah = $('#jumlahkulkulpuradalem').val();
						var urltarget = '?page=".$page."&domain=".$domain."&language=".$language."&action=changekulkulpuradalem&jumlah='+jumlah;
						var query = '';
						$.ajax({
								type: 'GET',
								url: urltarget,
								data: query,
								success: function(response){
									response = response.replace(/^\s+|\s+$/g,'');
									$('#divkulkulpuradalem').html(response);
									hideLoading();
								}
							});
					}
				</script>
			";
	}

	if (!stripos($_SERVER["PHP_SELF"],"modules")){
		$action==$_GET["action"];
		if(($action=="") ||($action=="viewformadd")){
			echo headerHTML(createHeader($_REQUEST),$_REQUEST);
			echo viewContent($_REQUEST);
			echo footerHTML($_REQUEST);
		}else{
			if ($action=="changecombokecamatan"){
				echo changeComboKecamatan($_REQUEST);
			}elseif ($action=="changecombokelurahan"){
				echo changeComboKelurahan($_REQUEST);
			}elseif ($action=="autocompleteregency"){
				echo autoCompleteRegency($_REQUEST);
			}elseif ($action=="autocompletedistricts"){
				echo autoCompleteDistricts($_REQUEST);
			}elseif ($action=="autocompletevillage"){
				echo autoCompleteVillage($_REQUEST);
			}elseif ($action=="autocompletebanjar"){
				echo autoCompleteBanjar($_REQUEST);
			}elseif ($action=="autocompletesound"){
				echo autoCompleteSound($_REQUEST);
			}elseif ($action=="autocompleteactivity"){
				echo autoCompleteActivity($_REQUEST);
			}elseif ($action=="autocompleterawmaterial"){
				echo autoCompleteRawMaterial($_REQUEST);
			}elseif ($action=="autocompletepakaiankulkul"){
				echo autoCompletePakaianKulkul($_REQUEST);
			}elseif ($action=="adddata"){
				echo addData($_REQUEST);
			}elseif ($action=="viewformmapsdesa"){
				echo viewFormMapsDesa($_REQUEST);
			}elseif ($action=="viewformmapsbanjar"){
				echo viewFormMapsBanjar($_REQUEST);
			}elseif ($action=="addonlineconsent"){
				echo addOnlineConsent($_REQUEST);
			}elseif ($action=="register"){
				echo register($_REQUEST);
			}elseif ($action=="changecombodistrict"){
				echo changeComboDistrict($_REQUEST);
			}elseif($action=="viewmapdesa"){
				echo viewMapDesa($_REQUEST);
			}elseif($action=="viewmapbanjar"){
				echo viewMapBanjar($_REQUEST);
			}elseif($action=="changekulkulbanjar"){
				echo changeKulkulBanjar($_REQUEST);
			}elseif($action=="changekulkuldesa"){
				echo changeKulkulDesa($_REQUEST);
			}elseif($action=="changekulkulpuradesa"){
				echo changeKulkulPuraDesa($_REQUEST);
			}elseif($action=="changekulkulpurapuseh"){
				echo changeKulkulPuraPuseh($_REQUEST);
			}elseif($action=="changekulkulpuradalem"){
				echo changeKulkulPuraDalem($_REQUEST);
			}else{
				echo viewData($_REQUEST);
			}
		}

	}else{
		echo "<script type=\"text/javascript\">location.href = '../index.php';</script>";
	}


?>
