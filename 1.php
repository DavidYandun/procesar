<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Google Maps JavaScript API Ejemplo de Marcador con texto</title>
    <script src="/js/maps.js"
            type="text/javascript"></script>
    <script type="text/javascript">
    function initialize() {
 
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
 
      <? 
 
          $descripcion="hola marca";
                $latitud= 10.000;
                $longitud=10.000;
      echo 'map.setCenter(new GLatLng('.$latitud.', '.$longitud.'), 13);';?>
        map.setUIToDefault();
 
        // Create a base icon for all of our markers that specifies the
        // shadow, icon dimensions, etc.
        var baseIcon = new GIcon(G_DEFAULT_ICON);
        baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
        baseIcon.iconSize = new GSize(20, 34);
        baseIcon.shadowSize = new GSize(37, 34);
        baseIcon.iconAnchor = new GPoint(9, 34);
        baseIcon.infoWindowAnchor = new GPoint(9, 2);
 
        // Creates a marker whose info window displays the letter corresponding
        // to the given index.
        function createMarker(point, index) {
          // Create a lettered icon for this point using our icon class
          var letter = String.fromCharCode("A".charCodeAt(0) + index);
          var letteredIcon = new GIcon(baseIcon);
          letteredIcon.image = "http://www.google.com/mapfiles/marker" + letter + ".png";
 
          // Set up our GMarkerOptions object
          markerOptions = { icon:letteredIcon };
          var marker = new GMarker(point, markerOptions);
          document.cookie ='variable='+index+'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
           GEvent.addListener(marker, "click", function() {
            <? echo 'marker.openInfoWindowHtml("<b>" + '.json_encode($descripcion).' + "</b>");';?>
          });
          return marker;
        }
 
        <?
        $x = 0;
            echo'var latlng = new GLatLng('.$latitud.',
            '.$longitud.');
          map.addOverlay(createMarker(latlng, '.$x.'));';
         ?>
      }
     <? mysql_close($conectado);
                                } else {
                                    die("NO SE PUDO CONECTAR AL SERVIDOR MYSQL.");
                                }
    ?>
    }
    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 500px; height: 300px"></div>
  </body>
</html>