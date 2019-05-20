<?php

    function outputOrderRow($file, $title, $quantity, $price,$amount) {
        echo "<tr>";
        $book="images/books/tinysquare/".$file;

        echo"<td><img src=$book></td>";
        echo"<td>$title</td>";
        echo"<td>$quantity</td>";
        echo"<td>$price</td>";
        echo"<td>$amount</td>";



        //TODO
        echo "</tr>";
    }
?>