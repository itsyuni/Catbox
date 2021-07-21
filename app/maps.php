<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catbox | карта</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>
</head>
<body>
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
  
  <!-- Promise polyfill script is required -->
  <!-- to use Mapbox GL Geocoder in IE 11. -->
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
  <style>
    .mapboxgl-ctrl-bottom-left {
      display: none !important;
    }
    #menu {
      position: absolute;
      background: #efefef;
      padding: 10px;
      font-family: 'Open Sans', sans-serif;
    }

    .map-overlay {
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
      position: absolute;
      width: 200px;
      top: 0;
      left: 0;
      padding: 10px;
      }
      
      .map-overlay .map-overlay-inner {
      background-color: #fff;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      border-radius: 3px;
      padding: 10px;
      margin-bottom: 10px;
      }
      
      .map-overlay-inner fieldset {
      border: none;
      padding: 0;
      margin: 0 0 10px;
      }
      
      .map-overlay-inner fieldset:last-child {
      margin: 0;
      }
      
      .map-overlay-inner select {
      width: 100%;
      }
      
      .map-overlay-inner label {
      display: block;
      font-weight: bold;
      margin: 0 0 5px;
      }
      
      .map-overlay-inner button {
      display: inline-block;
      width: 36px;
      height: 20px;
      border: none;
      cursor: pointer;
      }
      
      .map-overlay-inner button:focus {
      outline: none;
      }
      
      .map-overlay-inner button:hover {
      box-shadow: inset 0 0 0 3px rgba(0, 0, 0, 0.1);
      }
  </style>
    <div id='map' style='width: auto; height: 680px;'></div>
    <div class="map-overlay top">
      <div class="map-overlay-inner">
      <fieldset>
      <label>Select layer</label>
      <select id="layer" name="layer">
      <option value="water">Воды</option>
      <option value="building">Постройки</option>
      </select>
      </fieldset>
      <fieldset>
      <label>Выберите цвет</label>
      <div id="swatches"></div>
      </fieldset>
      </div>
      </div>
    <div id="menu">
      <input id="satellite-v9" type="radio" name="rtoggle" value="satellite" checked="checked">
      <!-- See a list of Mapbox-hosted public styles at -->
      <!-- https://docs.mapbox.com/api/maps/styles/#mapbox-styles -->
      <label for="satellite-v9">satellite</label>
      <input id="light-v10" type="radio" name="rtoggle" value="light">
      <label for="light-v10">Светлая</label>
      <input id="dark-v10" type="radio" name="rtoggle" value="dark">
      <label for="dark-v10">Тёмная</label>
      <input id="streets-v11" type="radio" name="rtoggle" value="streets">
      <label for="streets-v11">StreetView</label>
      <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
      <label for="outdoors-v11">outdoors</label>
    </div>
    <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiY2F0Ym94Z3IiLCJhIjoiY2tvbWdrd3h4MW81aDJxcm1ubTcydjJmMiJ9.p1AZI2Q2sWjMxrHmoRgoNw';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
      });
      map.addControl(new mapboxgl.NavigationControl());

      var layerList = document.getElementById('menu');
      var inputs = layerList.getElementsByTagName('input');
      
      function switchLayer(layer) {
      var layerId = layer.target.id;
      map.setStyle('mapbox://styles/mapbox/' + layerId);
      }
      
      for (var i = 0; i < inputs.length; i++) {
      inputs[i].onclick = switchLayer;
      }
      map.addControl(
      new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl
      })
      );

      var swatches = document.getElementById('swatches');
      var layer = document.getElementById('layer');
      var colors = [
      '#ffffcc',
      '#a1dab4',
      '#41b6c4',
      '#2c7fb8',
      '#253494',
      '#fed976',
      '#feb24c',
      '#fd8d3c',
      '#f03b20',
      '#bd0026'
      ];
      
      colors.forEach(function (color) {
      var swatch = document.createElement('button');
      swatch.style.backgroundColor = color;
      swatch.addEventListener('click', function () {
      map.setPaintProperty(layer.value, 'fill-color', color);
      });
      swatches.appendChild(swatch);
      });
    </script>
    
</body>
</html>