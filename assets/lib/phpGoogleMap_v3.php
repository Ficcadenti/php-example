<!--
/*
	# 
	# MODULE DESCRIPTION:
	# PhpGoogleMap_v3.php
	# 
	# 
	# AUTHORS:
	# Author Name		Raffaele Ficcadenti
	# Author email		raffaele.ficcadenti@gmail.com
	# 
	# 
	# HISTORY:
	# -[Date]-      -[Who]-               -[What]-
	# 07-02-2017    Ficcadenti Raffaele         
	# -
	#
-->
<?php
 
class PhpGoogleMap_v3 {
    private $apikey;
 
    function __construct($_apikey){
        $this->apikey = $_apikey;
    }
 
    function renderJS(){
        echo "
            <script src=\"//maps.googleapis.com/maps/api/js?key=AIzaSyD24SggKH9CuUEPjS2N1La0STvWZkxzqFc&sensor=false\" type=\"text/javascript\">
            </script>
        ";
 
        echo "
            <script type=\"text/javascript\">
                function initialize() {
                      var map = new google.maps.Map(
                        document.getElementById(\"map_canvas\"), {
                          center: new google.maps.LatLng(41.9681802, 12.3423484),
                          zoom: 10,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                      });

                      var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(41.9681802, 12.3423484),
                            label: \"Ciao\",
                            title: 'Hello World!',
                            map: map
                      });

                    }
                    google.maps.event.addDomListener(window, \"load\", initialize);
            </script>
        ";
    }
 
    function renderHTML(){
        echo "<div id=\"map_canvas\" style=\"width: 700px; height: 500px\"></div>";
    }
}
 
?>