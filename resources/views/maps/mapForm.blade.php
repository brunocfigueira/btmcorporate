<!DOCTYPE html>
<html>
<head>
    <title>Teste BTM Corporate</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/googlemaps.css" type="text/css">
</head>
<body>
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-6">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="2">Dados de Origem</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Endereço</td>
                    <td><input id="ori_address" class="form-control" disabled="" type="text" value=""/></td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td><input id="ori_lat" disabled="" class="form-control" type="text" value=""/></td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td><input id="ori_lng" disabled="" class="form-control" type="text" value=""/></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="2">Dados de Destino</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Endereço</td>
                    <td><input id="dest_address" class="form-control" disabled="" type="text" value=""/></td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td><input id="dest_lat" disabled="" class="form-control" type="text" value=""/></td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td><input id="dest_lng" disabled="" class="form-control" type="text" value=""/></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div style="clear: both"></div>
<div>
    <input id="origin-input" class="controls" type="text"
           placeholder="Digite um local de origem">

    <input id="destination-input" class="controls" type="text"
           placeholder="Digite um local de destino">

    <div id="mode-selector" class="controls">
        <input type="radio" name="type" id="changemode-driving" checked="checked">
        <label for="changemode-driving">Dirigindo</label>

        <input type="radio" name="type" id="changemode-transit">
        <label for="changemode-transit">Transito</label>

        <input type="radio" name="type" id="changemode-walking">
        <label for="changemode-walking">Caminhando</label>
    </div>
</div>
<div id="map"></div>


<script>

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: true,
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });

        new AutocompleteDirectionsHandler(map);
    }

    /**
     * @constructor
     */
    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: false});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: false});


        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    AutocompleteDirectionsHandler.prototype.setupClickListener = function (id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function () {
            me.travelMode = mode;
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            console.log(place.formatted_address)
            if (!place.place_id) {
                window.alert("Selecione uma opção na lista suspensa.");
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
                $('#ori_lat').val(place.geometry.location.lat());
                $('#ori_lng').val(place.geometry.location.lng());
                $('#ori_address').val(place.formatted_address);
            } else {
                me.destinationPlaceId = place.place_id;
                $('#dest_lat').val(place.geometry.location.lat());
                $('#dest_lng').val(place.geometry.location.lng());
                $('#dest_address').val(place.formatted_address);
            }
            me.route();
        });

    };

    AutocompleteDirectionsHandler.prototype.route = function () {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route({
            origin: {'placeId': this.originPlaceId},
            destination: {'placeId': this.destinationPlaceId},
            travelMode: this.travelMode
        }, function (response, status) {
            if (status === 'OK') {

                console.log(response);
                me.directionsDisplay.setDirections(response);
            } else {
                window.alert('A solicitação de instruções falhou devido a ' + status);
            }
        });
    };

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjEeFvTtOcjfzCbOOTkFVwKL8UutGpXJg&libraries=places&callback=initMap"
        async defer></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</body>
</html>