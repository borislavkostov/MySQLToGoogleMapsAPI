<html>
  <head>

<?php wp_head(); ?> 
    <title>Concerts</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
<style>
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
</style>
  </head>
  <body>
<?php include 'readingfromDB.php';?>
    <div id="map"></div>
<script>
var map;
	var myLatLng ={lat: latitude, lng:longitude};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center:new google.maps.LatLng(36.05178307933835,42.49737373046878),
          zoom: 3
        });
var marker = new google.maps.Marker({
    position: new google.maps.LatLng(parseFloat('<?php echo $latitude; ?>'), parseFloat('<?php echo $longitude; ?>')),
    map: map
  });
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAymgz0AXCj6ipuLijePEpi72_QcUga23Q&callback=initMap"
    async defer> </script>


		<?php wp_footer();?>

	</body>
</html>
