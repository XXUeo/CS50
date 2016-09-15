<?php

 require("../includes/config.php"); 
 
 
  if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
 
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup($_POST["symbol"]);
 
        if ($stock === false)
        {
        	apologize("The stock entered could not be found");
        }
 
        render("quote.php", ["stock" => $stock]);
 
    }
   


?>