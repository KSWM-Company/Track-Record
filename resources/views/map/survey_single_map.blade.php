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
                <select name="user_id" id="user_id" class="form-control" style="width: 200px; display:inline;">
                    <option value="">Select User Name</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
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
                    <h5 class="modal-title" id="locationModalLabel">Coordinates</h5>
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
                zoom: 6,
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

            // Filter change event
            document.getElementById('filterForm').addEventListener('change', function() {
                loadMarkers();
            });

            // Disable default right-click menu
            document.addEventListener('contextmenu', function(event) {
                event.preventDefault();
            });
        }

        function loadMarkers() {
            var user_id = document.getElementById('user_id').value;

            $.ajax({
                url: '/api/mapFilter',
                type: 'GET',
                data: {
                    user_id: user_id
                },
                success: function(response) {
                    clearMarkers();
                    response.forEach(function(location) {
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(location.location_latitude), lng: parseFloat(location.location_longitude)},
                            map: map,
                            title: location.created_by,
                            icon: {
                                url: '/images/companys/logo_map_wbs.png',
                                scaledSize: new google.maps.Size(35, 50)
                            }
                        });

                        var infowindow = new google.maps.InfoWindow({
                            content: "<b>" + location.created_by + "</br> Name: Hang </br> Amount: $300 </br> Status: Paid </br> Phone: 077 24 44 08 </b><br><img src='images/fetch_photo/001-avatar.png' alt='Image' style='width:100px;height:100px;'>"
                        });

                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
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
