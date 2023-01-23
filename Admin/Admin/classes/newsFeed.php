<?php

class NewsFeed
        {
            private $dt,$id,$time,$msg;
            
            function add($msg,$ttl)
            {
                //$msg = $_POST['message'];
                //fwrite($ff," a3 ");
                $conn = getConnection();
                //fwrite($ff," a4 ");
                //if($conn!=null){fwrite($ff," axxx ");}

                if(strlen($msg)>0)
                {
                    date_default_timezone_set('Asia/Kolkata');
                    $stmt = $conn->prepare("insert into newsfeed(edate,etime,message,header) values(:dt,:tm,:msg,:ttl)");
                    //fwrite($ff," a5 ");
                    $date = date("Y-m-d");
                    $time = date("H:i:s");
                    $stmt->bindParam(':dt',$date);
                    $stmt->bindParam(':tm',$time);
                    $stmt->bindParam(':msg',$msg);
                    $stmt->bindParam(':ttl',$ttl);
                    $stmt->execute();
                    //fwrite($ff," a6 ");
                }
            }

            function edit($id,$msg,$ttl)
            {
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("update newsfeed set message=:msg,header=:ttl where nid=:id");
                    $stmt->bindParam(':msg',$msg);
                    $stmt->bindParam(':id',$id);
                    $stmt->bindParam(':ttl',$ttl);
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

            function getFeeds()
            {
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from newsfeed");
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }


            function findRecordByTitle($ttl)
            {
                $conn = getConnection();
                $ttl = "%$ttl%";
                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from newsfeed where header like :ttl");
                    $stmt->bindParam(':ttl',$ttl);
                    //fwrite($ff," a5 ");
                    $stmt->execute();
                    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->FetchAll();
                    //fwrite($ff," a6 ");
                    return $result;
                }
            }

            function findRecordByNews($news)
            {
                $conn = getConnection();

                $news = "%$news%";

                if($conn != null)
                {
                    $stmt = $conn->prepare("select * from newsfeed where message like :ns");
                    $stmt->bindParam(':ns',$news);
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
                    $stmt = $conn->prepare("select * from newsfeed where edate between :frm AND :to");
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

        }

?>