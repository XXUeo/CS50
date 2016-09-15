<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody align = "left">
    <?php
       foreach (array_reverse($positions) as $position)	
        {   
            echo("<tr>");
            echo("<td>" . $position["Transaction"] . "</td>");
            echo("<td>$" . $position["DateTime"] . "</td>");
            echo("<td>" . $position["symbol"] . "</td>");
            echo("<td>" . $position["shares"] . "</td>");
            echo("<td>$" . number_format($position["price"], 2) . "</td>");
            echo("</tr>");
        }
    ?>

    

    </tbody>

</table>

