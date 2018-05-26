<!DOCTYPE html>
<!-- https://developers.google.com/maps/documentation/javascript/adding-a-google-map -->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery.min.js"></script>
        
        <script>
        function addLugar(latitud, longitud, titulo, info){
            $.ajax({
                type: 'POST',
                url: 'http://localhost/test_google_maps/controller/addLugarController.php',
                data: {
                    lat : latitud,
                    lon : longitud,
                    tit : titulo,
                    inf : info
                }
            }).done(function (res) {
//                $("#res").html(res);
            });
        }
        
        </script>
        
        <script>
            /* PRUEBA PARA SEGUIR UN OBJETO EN EL MAPA*/
//            function sleep(ms) {
//                return new Promise(resolve => setTimeout(resolve, ms));
//            }
//
//            async function test_seudo_hilo() {
//                var latitude = -34.1824;
//                
//                while (true) {
//                    var location = {
//                        lat: latitude,
//                        lng: -70.762726
//                    };
//                    markers[0].setPosition(location);
//                    await sleep(1000);
//                    
//                    latitude += 0.00001;
//                }
//            }

            /* PRUEBA PARA SEGUIR UN OBJETO EN EL MAPA*/

            var markers = [];
            var map;

            /*Función para agregar un marcador al mapa*/
            function addMarker(location) {
                var titulo = prompt("Título: ");
                var info = prompt("Info adicional:");
                
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    title: titulo
                });
                
                
                
                
                /*Acá añado la ubicación a la base de datos*/
                addLugar(location.lat(),location.lng(), titulo, info);
                /*Acá añado la ubicación a la base de datos*/
                
                
                
                
                /*INFO WINDOW*/
                var infowindow = new google.maps.InfoWindow({
                    content: "<h2>Información adicional</h2>"+info
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
                /*INFO WINDOW*/
                
                
                
                /*Listado de posibles atributos de un marcador*/
                /*Los atributos se pueden usar se esa forma, o con setX
                 * donde x es el atributo. Por ejemplo, marker.setIcon("path")*/
                /*
                 * draggable: true
                 * icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 10, //tamaño
                    strokeColor: '#f00', //color del borde
                    strokeWeight: 5, //grosor del borde
                    fillColor: '#00f', //color de relleno
                    fillOpacity:1// opacidad del relleno
                    }
                 */
                /*Listado de posibles atributos de un marcador*/
                
                markers.push(marker);
            }

            function initMap() {
                // -34.182354, -70.762726
                var suegra = {
                    lat: -34.1824,
                    lng: -70.762726
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: suegra
                });
                
                

                /*Listener para añadir un marker con un click en el mapa*/
                map.addListener('click', function (event) {
                    addMarker(event.latLng);
                });
                /*Listener para añadir un marker con un click en el mapa*/



                //contenido = "<h1>Mi Suegra</h1>" +
                        //"Acá es donde mi <b>alimentan</b> :D";

                //addMarker(suegra, contenido);
            }

        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfoOjQyKt_nlYBaDusHQjE8v-ijmr62Fc&callback=initMap">
        </script>

        <style>
            #map {
                height: 600px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <div id="res"></div>
    </body>
</html>
