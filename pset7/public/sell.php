<?php

 require("../includes/config.php"); 
 
 
  if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
       $rows = CS50::query("SELECT symbol FROM portfolios WHERE user_id = ?", $_SESSION["id"]);	
       if ($rows == false)
        {
            apologize("Nothing to sell.");
        } 
   
        render("sell_form.php", ["title" => "Sell", "rows" => $rows]);
    }
 
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
       
          
        $stock = lookup($_POST["symbol"]);
 
        if ($stock === false)
        {
            apologize("Choose a symbol");
        }
 
        $transaction = 'SELL';

        
        // lookup user's shares of stock being sold
        $shares = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
        // calculate total sale value (stock's price * shares)
        $value = $stock["price"] * $shares[0]["shares"];
        
        // add the sale value to cash
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $_SESSION["id"]);
        // delete the stock from their portfolio 
        CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);        
       
        CS50::query("INSERT INTO historyTable (Transaction, user_id, Symbol, Shares, price) VALUES(?, ?, ?, ?, ?)",$transaction, $_SESSION["id"], $stock["symbol"], $shares[0]["shares"], $stock["price"]);
        redirect("/");
 
    }
   


?>