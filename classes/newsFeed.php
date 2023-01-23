<?php

class NewsFeed
        {
            private $dt,$id,$time,$msg;
            
            function add($msg,$pid)
            {
                //$msg = $_POST['message'];
                //fwrite($ff," a3 ");
                $conn = getConnection();
                //fwrite($ff," a4 ");
                //if($conn!=null){fwrite($ff," axxx ");}

                if(strlen($msg)>0)
                {
                    date_default_timezone_set('Asia/Kolkata');
                    $stmt = $conn->prepare("insert into newsfeed ( pid, edate, etime, message) values(:pid,:date,:time,:msg)");
                    //fwrite($ff," a5 ");
                    $date = date("Y-m-d");
                    $time = date("H:i:s");
                    $stmt->bindParam(':pid',$pid);
                    $stmt->bindParam(':date',$date);
                    $stmt->bindParam(':time',$time);
                    $stmt->bindParam(':msg',$msg);
                    $stmt->execute();
                    echo"<script>alert('Post Updated!');</script>";
                    //fwrite($ff," a6 ");
                }
            }

            function edit($id,$msg)
            {
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("update newsfeed set message=:msg where nid=:id");
                    $stmt->bindParam(':msg',$msg);
                    $stmt->bindParam(':id',$id);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                   // $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    //$result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                }
            }

            function del($id)
            {
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("delete from newsfeed where nid=:id");
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                }
            }

            function getDateCount()
            {
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("SELECT COUNT(edate) , edate FROM newsfeed WHERE edate >= date_sub(now(),INTERVAL 7 day) group by edate ORDER BY edate desc");
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }

            function getFeeds2()
            {
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("SELECT * FROM newsfeed WHERE edate >= date_sub(now(),INTERVAL 7 day) ORDER BY edate desc , etime desc");
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }
            function getUserInfo($pid){
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("select photo,firstname,surname,pid from prosecutor where pid = :username");
                    $stmt->bindParam(':username',$pid);
                    $stmt->execute();
                    $picture = $stmt->FetchAll();
                    return $picture;
                }
            }
            function getPhoto($username){
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("select photo,firstname,surname,pid from prosecutor where email = :username");
                    $stmt->bindParam(':username',$username);
                    $stmt->execute();
                    $picture = $stmt->FetchAll();
                    return $picture;
                }
                
            }
            function addComment($pid,$nid,$cmt){
                $conn = getConnection();
                if(strlen($cmt)>0)
                {
                    date_default_timezone_set('Asia/Kolkata');
                    $stmt = $conn->prepare("insert into news_comments (pid,nid,date,time,comments) values(:pid,:nid,:date,:time,:msg)");
                    $date = date("Y-m-d");
                    $time = date("H:i:s");
                    $stmt->bindParam(':pid',$pid);
                    $stmt->bindParam(':nid',$nid);
                    $stmt->bindParam(':date',$date);
                    $stmt->bindParam(':time',$time);
                    $stmt->bindParam(':msg',$cmt);
                    $stmt->execute();
                    echo"<script>alert('Post Updated!');</script>";
                    //fwrite($ff," a6 ");
                }
            }
            function getComments(){
                $conn = getConnection();

                if($conn != null)
                {
                    // $stmt = $conn->prepare("select p.firstname , p.surname , c.pid , c.nid , c.date , c.time , comments from prosecutor p, news_comments c where p.pid = :pid");
                    $stmt = $conn->prepare("select p.firstname , p.surname , c.pid , c.nid , c.date , c.time , comments from prosecutor p, news_comments c where p.pid in (select pid from news_comments)");
                    //  $stmt->bindParam(':pid',$pid);
                    $stmt->execute();
                    $result = $stmt->FetchAll();
                    return $result;
                    
                }
            }
            function getUsername(){
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("select pid,firstname,surname from prosecutor");
                    $stmt->execute();
                    $result = $stmt->FetchAll();
                    return $result;
                }
            }
           
    }

?>