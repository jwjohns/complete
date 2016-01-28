//When the Window finishes loading...
!function() {
    var markerConfig = {
        zoom: 4,
        elementId: 'map',
        markers: []
    };
    var map;
    $(document).ready(function () {
        $('#contactForm').on('submit', function (e) {
            $('#gif').css('visibility', 'visible');
            e.preventDefault();
            var data = new FormData(this);
            //Carry out an Ajax request.
            $.ajax({
                url: 'upload.php',
                method: 'POST',
                contentType: false,
                processData: false,
                data: data,
                success:function(response){
                    response = JSON.parse(response);
                    markerConfig.centerPoint = {
                        lat: response[0].lat,
                        lng: response[0].lon
                    };

                    //Loop through each location.
                    $.each(response, function(index, row){
                        markerConfig.markers.push({
                            image : row.img,
                            title : 'Marker ' + index,
                            latLng : {
                                lat: row.lat,
                                lng: row.lon
                            },
                            size: {} // required to be here, data is optional
                        });
                    });
                    map = new MapMarker(markerConfig);
                }
            });
        });
    });
}();