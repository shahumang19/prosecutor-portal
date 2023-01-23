<?php

class TableRow extends RecursiveIteratorIterator
    {
        function __construct($it) { 
            parent::__construct($it, self::LEAVES_ONLY); 
        }

        function current()
        {
            return "<td><label name=\"msg\">".parent::current()."</label></td>";
        }

        function beginChildren()
        {
            echo "<td><button name=\"edit\" id=\"1\"><img src=\"img/edit.png\" height=\"15px\" width=\"15px\"></button></td>";
            echo "<td><button name=\"remove\" id=\"2\"><img src=\"img/remove.png\" height=\"15px\" width=\"15px\"></button></td>";
            echo "<tr>";
        }

        function endChildren()
        {
            echo "</tr>";   
        }
    }

?>