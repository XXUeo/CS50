 <?php


   require("../includes/config.php"); 
    
     $rows = CS50::query("SELECT Transaction, symbol,shares,price,DateTime FROM historyTable WHERE user_id = ?", $_SESSION["id"]);	
     
 	// create new array to store all info for portfolio table
 	$positions = [];
 	// for each of user's stocks
	

     foreach ($rows as $row)	
         {   
            
            
             $stock = lookup($row["symbol"]);
             if($stock !== false)
             {
                 $positions[] = [
                     "Transaction" => $row["Transaction"],
                     "price" => $stock["price"],
                     "shares" => $row["shares"],
                     "symbol" => $row["symbol"],
                     "DateTime" =>  $row["DateTime"] 
                 ];
             }
         }
        
     

        
        
        
	
  // query cash for template
     $users = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
     // render portfolio (pass in new portfolio table and cash)
     render("history_form.php", ["title" => "History", "positions" => $positions, "users" => $users]);
	


 ?>