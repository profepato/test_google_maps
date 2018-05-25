<!DOCTYPE html>
<!-- https://developers.google.com/maps/documentation/javascript/adding-a-google-map -->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
        function initMap() {
            // -34.182354, -70.762726
            var suegra = {
                lat: -34.182354, 
                lng: -70.762726
            };
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: suegra
            });
            
            var marcadorSuegra = new google.maps.Marker({
                position: suegra,
                map: map,
                /*draggable: true,*/
                animation: google.maps.Animation.DROP,
                title: "Mi suegra"/*,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 10, //tamaño
                    strokeColor: '#f00', //color del borde
                    strokeWeight: 5, //grosor del borde
                    fillColor: '#00f', //color de relleno
                    fillOpacity:1// opacidad del relleno
                }*/
            });
            
          marcadorSuegra.setIcon('images/home.png');


            /* INFO WINDOW */
            contenido = "<h1>Mi Suegra</h1>"+
                      "Acá es donde mi <b>alimentan</b> :D";	 

            var infowindow = new google.maps.InfoWindow({
               content: contenido
            });
            
            google.maps.event.addListener(marcadorSuegra, 'click', function(){
		infowindow.open(map,marcadorSuegra);
            });
            /* INFO WINDOW */
        }
        
        </script>
      
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfoOjQyKt_nlYBaDusHQjE8v-ijmr62Fc&callback=initMap">
        </script>
        
        <style>
        #map {
            height: 400px;
            width: 100%;
        }
        </style>
    </head>
    <body>
        <div id="map"></div>
    </body>
</html>
