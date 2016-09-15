<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         if (empty($_POST["old"]) )
        {
            apologize("You must provide your current password.");
        }
        
        else if (empty($_POST["new"]))
        {
            apologize("You must provide your new password.");
        }
         else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your new password.");
        }
        else if ($_POST["confirmation"] != $_POST["new"])
        {
            apologize("New password and it's confirmation doesn't match.");
        }
        
        
        $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
         if (count($rows) == 1)
        {
            // first (and only) row
            $choose = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["old"], $choose["hash"]))
            {
                // remember that user's now logged in by storing user's ID in session
              
                CS50::query("UPDATE users SET hash = ? WHERE id = ?",password_hash($_POST["new"], PASSWORD_DEFAULT), $_SESSION["id"]);
                // redirect to portfolio
                redirect("index.php");
            }
            else
            {
                apologize("Your current password is wrong");
            }
        }

        // else apologize
        apologize("Invalid  password.");
     
		
     
    }
    

?>