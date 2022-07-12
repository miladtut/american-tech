function deleteMarkers() {
    clearMarkers();
    marker = [];
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}
var markers=[];
function clearMarkers() {
    setMapOnAll(null);
}

function updateMap(lat ,long) {

    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];


        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 21.2854067;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 39.23755069999993;




        const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: lat, lng: long},
            zoom: 13
        });

        const marker = new google.maps.Marker({
            map: map,
            draggable: false,
            position: {lat: latitude, lng: longitude},
        });

        marker.setVisible(isEdit);

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;

        autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    }





}

function placeMarker(map, location) {

    deleteMarkers();
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });

    markers.push(marker);

    setLongLatmyFunction(location);


    var infowindow = new google.maps.InfoWindow({
        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
    });
    infowindow.open(map,marker);




}

marker=[];

function initialize() {

    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];


        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 21.2854067;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) ||39.23755069999993;
        setLongLatmyFunctionLatLong(latitude ,longitude);
        map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 13
        });



         marker = new google.maps.Marker({
            map: map,
            draggable: false,
            position: {lat: latitude, lng: longitude},
        });
        markers.push(marker);

        map.addListener('click', function(event) {

            placeMarker(map, event.latLng);

        });

        marker.setVisible(isEdit);

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;

        autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    }



    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;
        const map = autocompletes[i].map;
        const marker = autocompletes[i].marker;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();


            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {

                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();

                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });


            if (!place.geometry) {

                window.alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }


            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

        });
    }
}

function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");

    latitudeField.value = lat;
    longitudeField.value = lng;

}
