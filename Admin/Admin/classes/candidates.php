<?php

class Candidate
{
    function getCandidates()
    {
        $conn = getConnection();

        if($conn != null)
        {
            $query = "select cid,photo,firstname,surname,email,position.name from candidate left join prosecutor on 
                    candidate.pid = prosecutor.pid left join position on candidate.position_id = position.posid 
                    where eid = (select eid from election where status='0') order by cid";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->FetchAll();
            return $result;
        }
    }

    function deleteCandidates($id)
    {
        $conn = getConnection();

        if($conn != null)
        {
            $stmt = $conn->prepare("delete from candidate where cid=:cid");
            $stmt->bindParam(":cid",$id);
            $stmt->execute();
        }
    }

    function addCandidates($email,$pos,$desc)
    {
        $conn = getConnection();

        if($conn != null)
        {
            try{
                $query1 = "select pid from prosecutor where email=:email";
                $query2 = "select eid from election where status=0";
                $stmt = $conn->prepare("insert into candidate(pid,position_id,eid,description) values(($query1),:position,($query2),:description)");
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":position",$pos);
                $stmt->bindParam(":description",$desc);
                $stmt->execute();
            }catch(Exception $e)
            {
                echo "<script>alert('Either election date is not added or candidates email is wrong.');</script>";
            }
        }
    }

}

?>