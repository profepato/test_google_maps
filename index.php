<!DOCTYPE html>
<!-- https://developers.google.com/maps/documentation/javascript/adding-a-google-map -->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
        function initMap() {
            if( navigator.geolocation ){
                navigator.geolocation.getCurrentPosition(success, fail);
            }else{
                alert("Navegador no soporta geolocalización.");
            }
            
            
        }
        
        function success(position){
            console.log(position.coords.longitude);
            console.log(position.coords.latitude);
            
            var actual = {
                lat: position.coords.longitude, 
                lng: position.coords.latitude
            };
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: actual
            });
            
            var marker = new google.maps.Marker({
                position: actual,
                map: map
            });
            
            marker.setIcon('images/home.png');
        }
        
        function fail(){
            console.log("Fallo");
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
