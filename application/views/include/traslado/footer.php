        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous""></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <!-- SnackbarJS plugin -->
        
        <script src="https://cdn.rawgit.com/FezVrasta/snackbarjs/1.1.0/dist/snackbar.min.js"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
        <script>
          $('body').bootstrapMaterialDesign();
        </script>
        <script>
          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              mapTypeControl: false,
              center: {lat: 6.244338, lng: -75.573553},
              zoom: 13,
              zoomControl: false,
              disableDoubleClickZoom: true,
              mapTypeControl: false,
              fullscreenControl: false,
              streetViewControl: false,
              scaleControl: false,
              rotateControl: false,
              mouseWheelScrollEnabled: false,
              scrollwheel: false,
              navigationControl: false,
              draggable: false
            });

            new AutocompleteDirectionsHandler(map);
          }

          function get_my_location() {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };
                var ubicacion = reverse(pos);
                $("#origin-input").val(ubicacion);
                $("#origin-input").html(ubicacion);
              })
            }
          }

          /**
           * @constructor
           */
          function AutocompleteDirectionsHandler(map) {
            this.map = map;
            this.originPlaceId = null;
            this.destinationPlaceId = null;
            this.travelMode = 'WALKING';
            this.directionsService = new google.maps.DirectionsService;
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            this.directionsDisplay.setMap(map);

            var originInput = document.getElementById('origin-input');
            var destinationInput = document.getElementById('destination-input');
            var modeSelector = document.getElementById('mode-selector');

            var originAutocomplete = new google.maps.places.Autocomplete(originInput);
            // Specify just the place data fields that you need.
            originAutocomplete.setFields(['place_id']);

            var destinationAutocomplete =
              new google.maps.places.Autocomplete(destinationInput);
            // Specify just the place data fields that you need.
            destinationAutocomplete.setFields(['place_id']);

            this.setupClickListener('changemode-walking', 'WALKING');
            this.setupClickListener('changemode-transit', 'TRANSIT');
            this.setupClickListener('changemode-driving', 'DRIVING');

            this.setupPlaceChangedListener(originAutocomplete, 'ORIG',);
            this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

            var div_distance = document.getElementById('distance');
            var div_destination = document.getElementById('duration');

            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(div_distance);
            this.map.controls[google.maps.ControlPosition.TOP_RIGHT].push(
              div_destination);
          }

          // Sets a listener on a radio button to change the filter type on Places
          // Autocomplete.
          AutocompleteDirectionsHandler.prototype.setupClickListener = function (
            id, mode) {
            var radioButton = document.getElementById(id);
            var me = this;

            radioButton.addEventListener('click', function () {
              me.travelMode = mode;
              me.route();
            });
          };

          AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
            autocomplete, mode) {
            var me = this;
            autocomplete.bindTo('bounds', this.map);

            autocomplete.addListener('place_changed', function () {
              var place = autocomplete.getPlace();

              if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
              }
              if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
              } else {
                me.destinationPlaceId = place.place_id;
              }
              me.route();
            });
          };

          AutocompleteDirectionsHandler.prototype.route = function () {
            if (!this.originPlaceId || !this.destinationPlaceId) {
              return;
            }
            var me = this;

            this.directionsService.route(
              {
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: 'DRIVING'
              },
              function (response, status) {
                if (status === 'OK') {
                  me.directionsDisplay.setDirections(response);

                  // Display the distance:
                  var metro = response.routes[0].legs[0].distance.value;

                  var dist = (metro / 1000);
                  var sin_dist_decimal = dist.toFixed(1);

                  //obtener precio
                  var tarifa_x_km = 1.264969632;
                  var constante = 8.505103208;

                  var precio_base = tarifa_x_km * sin_dist_decimal + parseFloat(constante);

                  var precio_basesndeci = Math.ceil(precio_base);

                  var segundo = response.routes[0].legs[0].duration.value;

                  var hour = Math.floor(segundo / 3600);
                  hour = (hour < 10) ? '0' + hour : hour;

                  var minute = Math.floor((segundo / 60) % 60);
                  minute = (minute < 10) ? '0' + minute : minute;
                  var second = segundo % 60;
                  second = (second < 10) ? '0' + second : second;

                  $("#distance").html("<span  class='badge badge-success'  style='font-size: 14px'>Distancia:</span>&nbsp;<strong style='font-size: 14px;background: white'>" + sin_dist_decimal + "Km</strong>");
                  $("#duration").html("<span class='badge badge-success' style='font-size: 14px'>Duracion: </span>&nbsp;<strong style='font-size: 14px;background: white''>" + hour + ":" + minute + ":" + second + "</strong>");

                  $("#fecha_origen").prop("disabled", false);
                  $("#hora_origen").prop("disabled", false);
                  $("#precio_distancia").val(precio_basesndeci);
                  $("#precio_distancia").html(precio_basesndeci);
                  $("#customSwitch1").prop("disabled", false);


                } else {
                  window.alert('Directions request failed due to ' + status);
                }
              });
          };
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAghedJRj9DKs5opiOp1gBJjZn6qhIKsIM&libraries=places&callback=initMap"
          async defer></script>
        <!--fin Google Apis -->
        <script src="<?php echo base_url("js/traslado/traslado.js")?>"></script>
    </body>
</html>