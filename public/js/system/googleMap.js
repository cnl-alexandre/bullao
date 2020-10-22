var LANG = 'fr';

function afficherMap(idMap, lat, lng)
{
    var latLng = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: 6, // Zoom par défaut
        center: latLng, // Coordonnées de départ de la carte de type latLng 
        mapTypeId: google.maps.MapTypeId.ROADMAP, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            position: google.maps.ControlPosition.TOP_LEFT,
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain']
        },
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        },
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT
        },
    };

    var map = new google.maps.Map(document.getElementById(idMap), myOptions);
    
    return map;
}

function afficherMapItineraire(adresseDepart, adresseArrivee, mode, idMap, idPanelItineraire, iconStart, iconEnd, lat, lng)
{
    var map = afficherMap(idMap, lat, lng);
    
    //var adresseDepart = document.getElementById('adrDepart').value; // Le point départ
    //var adresseArrivee = document.getElementById('adrArrivee').value; // Le point d'arrivé
    var travelMode;
    
    if(mode == "BICYCLING")
    {
        travelMode = google.maps.DirectionsTravelMode.BICYCLING;
    }
    else if(mode == "WALKING")
    {
        travelMode = google.maps.DirectionsTravelMode.WALKING;
    }
    else
    {
        travelMode = google.maps.DirectionsTravelMode.DRIVING;
    }

    if(adresseDepart && adresseArrivee)
    {
        var request = {
            origin: adresseDepart,
            destination: adresseArrivee,
            travelMode: travelMode // Mode de conduite
        }
        
        var directionsService   = new google.maps.DirectionsService();          // Service de calcul d'itinéraire
        var itineraire          = document.getElementById(idPanelItineraire);
        
        directionsService.route(request, function(response, status)
        {
            // Envoie de la requête pour calculer le parcours
            if (status == google.maps.DirectionsStatus.OK)
            {
                var directionsDisplay = new google.maps.DirectionsRenderer();
                
                directionsDisplay.setDirections(response);                      // Trace l'itinéraire sur la carte et les différentes étapes du parcours
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(itineraire);
                directionsDisplay.setOptions({ suppressMarkers: true });        // Suppression des markers par défaut
                
                var data = response.routes[0].legs[0];                          // 1st itinéraire retourné
                var debPoint = data.start_location;                             // format LatLng
                var endPoint = data.end_location;                               // format LatLng
                var iconeStart = new google.maps.MarkerImage(
                            iconStart,
                            null,
                            null,
                            null,
                            new google.maps.Size(35, 40)
                        );
                var iconeEnd = new google.maps.MarkerImage(
                            iconEnd,
                            null,
                            null,
                            null,
                            new google.maps.Size(35, 40)
                        );
                var marker = new google.maps.Marker({
                    position: debPoint,
                    map: map,
                    icon: iconeStart
                });

                var marker = new google.maps.Marker({
                    position: endPoint,
                    map: map,
                    icon: iconeEnd
                });
            }
        });
    }
    
    return map;
}

function afficherDistanceDuration(adresseDepart, adresseArrivee, mode, idDistance, idDuration)
{
    var travelMode;
    var infos = new Array();
    
    if(mode == "BICYCLING")
    {
        travelMode = google.maps.DirectionsTravelMode.BICYCLING;
    }
    else if(mode == "WALKING")
    {
        travelMode = google.maps.DirectionsTravelMode.WALKING;
    }
    else
    {
        travelMode = google.maps.DirectionsTravelMode.DRIVING;
    }
    
    var geocoder = new google.maps.Geocoder;
    var service = new google.maps.DistanceMatrixService;
    //var destinationIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|FFFFFF';
    //var originIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=O|FFFF00|FFFFFF';
    var bounds = new google.maps.LatLngBounds;

    service.getDistanceMatrix({
        origins: [adresseDepart],
        destinations: [adresseArrivee],
        travelMode: travelMode,
        unitSystem: google.maps.UnitSystem.METRIC,
        durationInTraffic: true,
        avoidHighways: false,
        avoidTolls: false
    }, function(response, status) {
        if(status !== 'OK')
        {
            alert('Error was: ' + status);
        }
        else
        {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            //deleteMarkers(markersArray);

            for(var i = 0; i < originList.length; i++)
            {
                var results = response.rows[i].elements;
                geocoder.geocode({
                        'address': originList[i]
                    });
                for(var j = 0; j < results.length; j++)
                {
                    geocoder.geocode({'address': destinationList[j]});
                }
            }
            
            $('#'+idDistance).html(results[0].distance.text);
            $('#'+idDuration).html(results[0].duration.text);
            
            infos.push(results[0].duration.value);
            infos.push(results[0].distance.value);
            
            return infos;
        }
        return infos;
    });
    
    return infos;
}

function autoCompleteManyFields(idAdresse, idVille, idCp, idPays)
{
    var googleComponents = [
        { googleComponent: 'adress', id: idAdresse },
        { googleComponent: 'locality', id: idVille },
        { googleComponent: 'postal_code', id: idCp },
        { googleComponent: 'country', id: idPays },
    ];
    
    var adresse = document.getElementById(idAdresse);
    
    var options = {
      componentRestrictions: {country: LANG}                                    //Limiter résultat à la France
    };

    var autocomplete = new google.maps.places.Autocomplete(adresse, options);

    google.maps.event.clearInstanceListeners(adresse);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        adresse.value = place.name;
        for (var component in googleComponents) {
            var addressComponents = place.address_components;
            addressComponents.forEach(addressComponent => populateFormElements(addressComponent, googleComponents[component]));
        }
    });
}

function autoCompleteOneField(idAdresse)
{
    var adresse = document.getElementById(idAdresse);
    
    var options = {
      componentRestrictions: {country: LANG}                                    //Limiter résultat à la France
    };

    var autocomplete = new google.maps.places.Autocomplete(adresse, options);
}

function afficherPositionActuelle(map)
{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(position)
        {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            
            var pos = {lat: parseFloat(lat), lng: parseFloat(lng)};
            
            var text = "Vous êtes ici !";
            var icon = "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|e74c3c";
            createMarker(map, lat, lng, text, icon);
            //map.setCenter(pos);
            //infowindow.open(map, marker);
            
        }, null, {enableHighAccuracy : true, timeout:30000, maximumAge:300000});
    }
    else
    {
        alert("Votre navigateur ne prend pas en compte la géolocalisation !");
    }
}

function positionActuelle()
{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(position)
        {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            
            return {lat: parseFloat(lat), lng: parseFloat(lng)};
            //console.log(pos);
        },
        function(error)
        {
            console.log(error);
        }, {enableHighAccuracy : true, timeout:30000, maximumAge:300000});
    }
    else
    {
        alert("Votre navigateur ne prend pas en compte la géolocalisation !");
    }
}

function adressePosition(latlng)
{
    // Récupération de l'adresse par rapport à la géolocalisation
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({'location': latlng}, function(results, status)
    {
        if(status === google.maps.GeocoderStatus.OK)
        {
            if(results)
            {
                var adresse = results[0].formatted_address;

                return adresse;
            }
        }
    }, null, {enableHighAccuracy : true, timeout:30000, maximumAge:300000});
    //------------------------------------------------------------------
}

function createMarker(map, lat, lng, text, icon)
{
    var latlng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
    };
    
    //var latlng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));

    // Création du marker de géolocalisation
    var marker = new google.maps.Marker({
        map : map,
        position : latlng,
        icon : icon,
        visible : true
    });

    // Création de la bulle du marker
    var infowindow = new google.maps.InfoWindow({
        content: text
    });

    // Ajout d'une interaction d'un click sur le marker
    google.maps.event.addListener(marker, 'click', function()
    {
        infowindow.open(map, marker);
    });
    
    return marker;
}

function populateFormElements(addressComponent, adr)
{
    var addressType = addressComponent.types[0];
    
    if (adr.googleComponent === addressType)
    {
        var formValue = addressComponent.long_name;
        document.getElementById(adr.id).value = formValue;
    }
}

function deleteMarkers(markers)
{
    for(var i = 0; i < markers.length; i++)
    {
        markers[i].setMap(null);
    }
    markers = [];
}

function deleteDistanceDuration(idDistance, idDuration)
{
    $('#'+idDistance).html("0km");
    $('#'+idDuration).html("0min");
}

function randomGeo(lat, lng, radius)
{
    var y0 = lat;
    var x0 = lng;
    var rd = radius / 111300;

    var u = Math.random();
    var v = Math.random();

    var w = rd * Math.sqrt(u);
    var t = 2 * Math.PI * v;
    var x = w * Math.cos(t);
    var y = w * Math.sin(t);

    return {
        'lat': y + y0,
        'lng': x + x0
    };
}