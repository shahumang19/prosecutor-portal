<?php
    class Cases{
        function getPid($id){
            $conn = getConnection();
            if($conn != null)
            {
                
                $stmt = $conn->prepare("select pid from prosecutor where email = :id");
                $stmt->bindParam(':id',$id);     
                $stmt->execute();
                $result = $stmt->FetchAll();
                return $result;
            }
        }
        function viewMycases($id){
            $conn = getConnection();
            if($conn != null)
            {
                
                $stmt = $conn->prepare("select * from case_study where pid = :id");
                $stmt->bindParam(':id',$id);     
                $stmt->execute();
                $result = $stmt->FetchAll();
                return $result;
            }
        }
        function updateMyCases($title,$visible,$judgement,$detail,$id){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("update case_study set title = :title,visibility =:visibility,details=:details,judgement=:judgement where id=:id");
                $stmt->bindParam(':title',$title);
                $stmt->bindParam(':visibility',$visible);
                $stmt->bindParam(':details',$detail);                
                $stmt->bindParam(':judgement',$judgement);     
                $stmt->bindParam(':id',$id);                                                                           
                $stmt->execute();
                
                
            }
        }

        function deleteMyCases($id){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("delete from case_study where id = :id");
                $stmt->bindParam(':id',$id);
                $stmt->execute();
            }
        }
        function viewCases(){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("select * from case_study where visibility = 1");
                $stmt->execute();
                $result = $stmt->FetchAll();
                return $result;
            }
        }
        function addcases($title,$pid,$detail,$visible,$date,$time,$judgement){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("insert into case_study(title,pid,visibility,details,judgement,date,time) values(:title,:pid,:visibility,:details,:judgement,:date,:time)");
                $stmt->bindParam(':title',$title);
                $stmt->bindParam(':pid',$pid);                
                $stmt->bindParam(':visibility',$visible);
                $stmt->bindParam(':details',$detail);                
                $stmt->bindParam(':judgement',$judgement);     
                $stmt->bindParam(':date',$date);    
                $stmt->bindParam(':time',$time);    
                $stmt->execute();
            }
        }
        function findRecordByTitle($ttl)
            {
                $conn = getConnection();
                $ttl = "%$ttl%";
                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from case_study where title like :ttl");
                    $stmt->bindParam(':ttl',$ttl);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }

            function findRecordByDate($from,$to)
            {
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from case_study where date between :frm AND :to");
                    $stmt->bindParam(':frm',$from);
                    $stmt->bindParam(':to',$to);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }

            function findRecordByCases($tt1)
            {
                $conn = getConnection();
                $ttl = "%$ttl%";
                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from case_study where details like :ttl");
                    $stmt->bindParam(':ttl',$ttl);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }

            function findQuery($search,$field)
    {
        //echo "<script>alert('$search : $field')</script>";
        $conn = getConnection();
                $search = "%$search%";
                if($conn != null)
                {
                    $query = "select * from prosecutor where $field like :src";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':src',$search);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
    }


    }
?>