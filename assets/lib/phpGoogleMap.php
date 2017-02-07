<!--
/*
	# 
	# MODULE DESCRIPTION:
	# PhpGoogleMap.php
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
 
class PhpGoogleMap {
    private $apikey;
 
    function __construct($_apikey){
        $this->apikey = $_apikey;
    }
 
    function renderJS(){
        echo "
            <script src=\"http://maps.google.com/maps?file=api&v=2&key=". $this->apikey ."&sensor=false\" type=\"text/javascript\">
            </script>
        ";
 
        echo "
            <script type=\"text/javascript\">
                function initialize() {
                    if (GBrowserIsCompatible()) {
                        var map = new GMap2(document.getElementById(\"map_canvas\"));
                        map.setCenter(new GLatLng(41.900706, 12.487579), 13);
                        map.setUIToDefault();
                    }
                }
            </script>
        ";
    }
 
    function renderHTML(){
        echo "<div id=\"map_canvas\" style=\"width: 500px; height: 300px\"></div>";
    }
}
 
?>