<?php


   require("../includes/config.php"); 
    
    $rows = CS50::query("SELECT symbol,shares FROM portfolios WHERE user_id = ?", $_SESSION["id"]);	
     
	// create new array to store all info for portfolio table
	$positions = [];
	// for each of user's stocks
	

    foreach ($rows as $row)	
        {   
            
            
            $stock = lookup($row["symbol"]);
            if($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"],
                    "total" =>  $stock["price"] * $row["shares"]
                ];
            }
        }
        
     

        
        
        
	
    // query cash for template
    $users = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    // render portfolio (pass in new portfolio table and cash)
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "users" => $users]);
	


?>
