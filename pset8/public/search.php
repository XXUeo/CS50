<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    
    $geo = $_GET["geo"];
    $geo = str_replace(",", " ", $geo);
    $geo = trim($geo);
    $geo = preg_split("@ @", $geo, NULL, PREG_SPLIT_NO_EMPTY);
    $count = count($geo);
    
    if ($count < 1)
    {
    	print("Please enter a query string.");
    }
    
    elseif ($count === 1)
    {
    	$geo = $geo[0] ;
    
    	if(strlen($geo) < 6 and is_numeric($geo))
    	{
    		$places = CS50::query("SELECT * FROM places WHERE postal_code LIKE ?", $geo . "%");	
    	}
    	else
    	{
    	
    		$places = CS50::query("SELECT * FROM places WHERE place_name LIKE ?", $geo . "%");
    	}
    	
    	if(empty($places))
    	{
    
    		$places = CS50::query("SELECT * FROM places WHERE admin_name1 LIKE ?", $geo . "%");
    	}
    }
    elseif($count > 1)
    {
        
    	$geo = implode(" ", $geo);

          $places = CS50::query("SELECT * FROM places WHERE place_name LIKE ?", $geo . "%");
          

    	    if(empty($places))
    	    {
        	    $places = CS50::query("SELECT * FROM places WHERE admin_name1 LIKE ?", $geo . "%");
        	    
         
            }
               
    	    
    	     if(empty($places))
                {
                 $places = CS50::query("SELECT * FROM places WHERE MATCH(place_name,admin_name1,postal_code) AGAINST (?)", $geo . "%");
       
                 
            
                }
    
    }

    
   

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>