<?php

    class Position
    {
        function getPositions()
        {
            $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from position");
                    $stmt->execute();
                    $result = $stmt->FetchAll();
                    return $result;
                }
        }
    }

?>