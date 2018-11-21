<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googleapi{

	public function getPointFromAddress($address){

    	$prepAddr = str_replace(' ','+',$address);
                          
    	//Need to add "&key=API_KEY" to the end of the URL in the PHP example above, otherwise you'll likely run in to issues with exceeding the quota. More on it here: developers.google.com/maps/documentation/geocoding 
    	//https://developers.google.com/maps/documentation/geocoding/intro
        $lat = $lon = "";              
        if(PRODUCTION===FALSE){
        	$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        }else{
        	//$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyCGYYE-fKAdzEErv_4Pu5Ic8pGEBsr0UK8');
        }
        $output= json_decode($geocode);
		//var_dump($output);
		if(isset($output->results[0]->geometry->location->lat)){
			$lat = $output->results[0]->geometry->location->lat;
			$lon = $output->results[0]->geometry->location->lng;	
		}
		
		return $lon.",".$lat;
	}	
}
/*
object(stdClass)#44 (2) {
	["results"]=> array(1) {
	 	[0]=> object(stdClass)#38 (5) {
	 	 	["address_components"]=> array(10) { 
	 	 	 	[0]=> object(stdClass)#28 (3) { 
	 	 	 		["long_name"]=> string(1) "6" 
	 	 	 		["short_name"]=> string(1) "6" 
	 	 	 		["types"]=> array(1) { 
	 	 	 			[0]=> string(10) "subpremise" 
	 	 	 		}
	 	 	 	} 
	 	 	 	[1]=> object(stdClass)#29 (3) { 
	 	 	 		["long_name"]=> string(3) "950" 
	 	 	 		["short_name"]=> string(3) "950" 
	 	 	 		["types"]=> array(1) { 
	 	 	 			[0]=> string(13) "street_number" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[2]=> object(stdClass)#30 (3) { 
	 	 	 		["long_name"]=> string(18) "West Bishop Street" 
	 	 	 		["short_name"]=> string(11) "W Bishop St" 
	 	 	 		["types"]=> array(1) { 
	 	 	 			[0]=> string(5) "route" 
	 	 	 			} 
	 	 	 		} 
	 	 	 	[3]=> object(stdClass)#31 (3) { 
	 	 	 		["long_name"]=> string(11) "Pico-Lowell" 
	 	 	 		["short_name"]=> string(11) "Pico-Lowell" 
	 	 	 		["types"]=> array(2) { 
	 	 	 			[0]=> string(12) "neighborhood" 
	 	 	 			[1]=> string(9) "political" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[4]=> object(stdClass)#32 (3) { 
	 	 	 		["long_name"]=> string(9) "Santa Ana" 
	 	 	 		["short_name"]=> string(9) "Santa Ana" 
	 	 	 		["types"]=> array(2) { [0]=> string(8) "locality" 
	 	 	 		[1]=> string(9) "political" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[5]=> object(stdClass)#33 (3) { 
	 	 	 		["long_name"]=> string(13) "Orange County" 
	 	 	 		["short_name"]=> string(13) "Orange County" 
	 	 	 		["types"]=> array(2) { 
	 	 	 			[0]=> string(27) "administrative_area_level_2" 
	 	 	 			[1]=> string(9) "political" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[6]=> object(stdClass)#34 (3) { 
	 	 	 		["long_name"]=> string(10) "California" 
	 	 	 		["short_name"]=> string(2) "CA" 
	 	 	 		["types"]=> array(2) { 
	 	 	 			[0]=> string(27) "administrative_area_level_1" 
	 	 	 			[1]=> string(9) "political" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[7]=> object(stdClass)#35 (3) { 
	 	 	 		["long_name"]=> string(13) "United States" 
	 	 	 		["short_name"]=> string(2) "US" 
	 	 	 		["types"]=> array(2) { 
	 	 	 			[0]=> string(7) "country" 
	 	 	 			[1]=> string(9) "political" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[8]=> object(stdClass)#36 (3) { 
	 	 	 		["long_name"]=> string(5) "92703" 
	 	 	 		["short_name"]=> string(5) "92703" 
	 	 	 		["types"]=> array(1) { 
	 	 	 			[0]=> string(11) "postal_code" 
	 	 	 		} 
	 	 	 	} 
	 	 	 	[9]=> object(stdClass)#37 (3) { 
	 	 	 		["long_name"]=> string(4) "4885" 
	 	 	 		["short_name"]=> string(4) "4885" 
	 	 	 		["types"]=> array(1) { 
	 	 	 			[0]=> string(18) "postal_code_suffix" 
	 	 	 		}
	 	 	 	} 
	 	 	} 
	 	 	["formatted_address"]=> string(44) "950 W Bishop St #6, Santa Ana, CA 92703, USA" 
	 	 	["geometry"]=> object(stdClass)#40 (3) { 
	 	 		["location"]=> object(stdClass)#39 (2) { 
	 	 			["lat"]=> float(33.7391394) 
	 	 			["lng"]=> float(-117.8786072) } 
	 	 			["location_type"]=> string(7) "ROOFTOP" 
	 	 			["viewport"]=> object(stdClass)#42 (2) { 
	 	 				["northeast"]=> object(stdClass)#41 (2) { 
	 	 					["lat"]=> float(33.740488380292) 
	 	 					["lng"]=> float(-117.87725821971) 
	 	 				} 
	 	 				["southwest"]=> object(stdClass)#43 (2) { 
	 	 					["lat"]=> float(33.737790419709) 
	 	 					["lng"]=> float(-117.87995618029) 
	 	 				} 
	 	 			} 
	 	 		} 
	 	 		["place_id"]=> string(103) "Eiw5NTAgVyBCaXNob3AgU3QgIzYsIFNhbnRhIEFuYSwgQ0EgOTI3MDMsIFVTQSIdGhsKFgoUChIJfbUmev3Y3IARBziMVND0BLwSATY" 
	 	 		["types"]=> array(1) { 
	 	 			[0]=> string(10) "subpremise" 
	 	 		} 
	 	 	} 
	 	} 
	 	["status"]=> string(2) "OK" 
	} 
*/

?>




