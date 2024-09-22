@extends('layouts.admin')

@section('style')
    <!-- Only include Google Maps, as Leaflet is not used -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endsection

@section('content')
    @include('loading.loading')

    <!-- Filter Form -->
    <div class="row">
        <div class="col-xl-12">
            <form id="filterForm">
                <div class='row  align-items-center' style="padding-bottom: 10px;">
                    <div class='col-md-1' >
                        <label for="user_id"> User Create:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="user_id" id="user_id" class="form-control" style="width: 200px; display:inline;">
                            <option value="">Select User Name</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-1' style="text-align: right;">
                        <label for="start_date"> Start Date:</label>
                    </div>
                    <div class='col-md-3'>
                        <input type="date" name="start_date" id="start_date" class='form-control'/>
                    </div>
                    <div class='col-md-1' style="text-align: right;">
                        <label for="end_date">End Date:</label>
                    </div>
                    <div class='col-md-3'>
                        <input type="date" name="end_date" id="end_date" class='form-control'/>
                    </div>
                    <div class='col-md-1'>
                        <button type="button" id="search" class="btn btn-info">Serach</button>
                    </div>
                </div>

                <div class='row  align-items-center' style="padding-bottom: 10px;">
                    <div class='col-md-1' style="text-align: right;">
                        <label for="block"> Block:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="block" id="block" class="form-control" style="width: 200px; display:inline;">
                            <option value="">-- All --</option>
                            @foreach($blocks as $block)
                                <option value="{{ $block->id }}">{{ $block->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-1' style="text-align: right;">
                        <label for="sector"> Sector:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="sector" id="sector" class="form-control" style="width: 200px; display:inline;">
                            <option value="">-- All --</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-1' style="text-align: right;">
                        <label for="street">Street:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="street" id="street" class="form-control" style="width: 200px; display:inline;">
                            <option value="">-- All --</option>
                            @foreach($streets as $street)
                                <option value="{{ $street->id }}">{{ $street->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-1' style="text-align: right;">
                        <label for="side_of_street"> Side of Street:</label>
                    </div>
                    <div class="col-md-2">
                        <select name="side_of_street" id="side_of_street" class="form-control" style="width: 200px; display:inline;">
                            <option value="">-- All --</option>
                            @foreach($side_of_streets as $side_of_street)
                                <option value="{{ $side_of_street->id }}">{{ $side_of_street->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <!-- Google Map Container -->
            <div id="map" style="width: 100%; height: 700px;"></div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLabel">Google Map Pre Survey</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Latitude: <span id="latitude"></span></p>
                    <p>Longitude: <span id="longitude"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var map;
        var markers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 12.5657, lng: 104.9910}
            });

            // Right-click listener for the map to get latitude and longitude
            google.maps.event.addListener(map, 'rightclick', function(event) {
                document.getElementById('latitude').innerText = event.latLng.lat();
                document.getElementById('longitude').innerText = event.latLng.lng();
                $('#locationModal').modal('show');
            });

            // Initial load of markers
            loadMarkers();

            // Filter change event working when all fil in form has change
            // document.getElementById('filterForm').addEventListener('change', function() {
            //     loadMarkers();
            // });

            $('#search').on('click',function(){
                loadMarkers();
            });

            // Disable default right-click menu
            document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
            });
        }

        function loadMarkers() {
            var block = document.getElementById('block').value;
            var sector = document.getElementById('sector').value;
            var street = document.getElementById('street').value;
            var side_of_street = document.getElementById('side_of_street').value;
            var user_id = document.getElementById('user_id').value;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;

            $.ajax({
                url: '/admins/map/filter/per_survey',
                type: 'POST',
                data: {
                    block: block,
                    sector: sector,
                    street: street,
                    side_of_street: side_of_street,
                    user_id: user_id,
                    start_date: start_date,
                    end_date: end_date,
                    _token: '{{ csrf_token() }}' // CSRF token
                },
                success: function(response) {

                    clearMarkers();
                    response.forEach(function(location) {
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(location.location_latitude), lng: parseFloat(location.location_longitude)},
                            map: map,
                            title: `${location.id}`,
                            icon: {
                                url: '/images/companys/logo_map_wbs.png',
                                scaledSize: new google.maps.Size(35, 50)
                            }
                        });

                        var infowindow = new google.maps.InfoWindow();

                        marker.addListener('click', function() {
                            // Make AJAX request to get the images
                            $.ajax({
                                url: '/admins/map/view_image/pre_survey/' + location.id,
                                type: 'GET',
                                success: function(data) {
                                    // Assuming `data` contains image paths, you can display them in the info window.
                                    let html_img = '';
                                    data.forEach(function(element) {
                                        html_img += `<img src='${element.full_path}' alt='Image' style='width:100px;height:100px;margin:5px;'>`;
                                    });

                                    // Set the InfoWindow content
                                    infowindow.setContent(
                                        "<b>ID: " + location.id + "</br>" +
                                        "User: " + location.user_name + "</br>" +
                                        "Location Code: " + location.block_name + location.sector_name + location.street_name + location.side_of_street_name + "</br></b>" +
                                        html_img
                                    );
                                    // Open the InfoWindow
                                    infowindow.open(map, marker);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching images: ', error);
                                }
                            });
                        });

                        markers.push(marker);
                    });
                }
            });
        }

        function clearMarkers() {
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
        }


    </script>

    <!-- Include Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN_25RjPIkJMQFc-_ufn8v0R9H702yW80&callback=initMap" async defer></script>

@endsection
