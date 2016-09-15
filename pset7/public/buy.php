<?php

 require("../includes/config.php"); 
 
 
  if ($_SERVER["REQUEST_METHOD"] == "GET")
    {

    
        render("buy_form.php", ["title" => "Buy"]);
    }
 
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
	
         
        $stock = lookup($_POST["symbol"]);
 
        if ($stock == false)
        {
            apologize("The stock entered could not be found");
        }
 
 
        $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        if ($cash < $_POST["shares"] * $stock["price"])
        {
              apologize("Sorry, you cannnot afford that");
        }
        $transaction = 'BUY';
        CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $_POST["shares"]*$stock["price"], $_SESSION["id"]);
  
        CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock["symbol"], $_POST["shares"]);
        
        CS50::query("INSERT INTO historyTable (Transaction, user_id, Symbol, Shares, price) VALUES(?, ?, ?, ?, ?)",$transaction, $_SESSION["id"], $stock["symbol"], $_POST["shares"], $stock["price"]);
        
       
        redirect("/");
 
    }
   


?>