


<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <tbody align = "left">
    <?php
	    foreach ($positions as $position)	
        {   
            echo("<tr>");
            echo("<td>" . $position["symbol"] . "</td>");
            echo("<td>" . $position["name"] . "</td>");
            echo("<td>" . $position["shares"] . "</td>");
            echo("<td>$" . number_format($position["price"], 2) . "</td>");
            echo("<td>$" . number_format($position["total"], 2) . "</td>");
            echo("</tr>");
        }
    ?>

    <tr>
        
        <td align = "left">CASH</td>
        <td></td>
        <td></td>
        <td></td>
        <td align = "left">$<?=number_format($users[0]["cash"], 2)?></td>
    </tr>

    </tbody>

</table>

