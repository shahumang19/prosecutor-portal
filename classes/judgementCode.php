<?php
include_once('Connection.php');
class Judgement
        {
          //  private $dt,$id,$time,$msg;
            
            function add($appelant,$respondent,$citation,$act,$section,$details)
            {
                $conn = getConnection();

                    $stmt = $conn->prepare("insert into judgement values(0,(select pid from prosecutor where username='jayjoshi.551@gmail.com'),:appelant,:respondent,:citation,:act,:section,:details)");
                   
                    $stmt->bindParam(':appelant',$appelant);
                    $stmt->bindParam(':respondent',$respondent);
                    $stmt->bindParam(':citation',$citation);
					$stmt->bindParam(':act',$act);
					$stmt->bindParam(':section',$section);
					
					$stmt->bindParam(':details',$details);
                    $stmt->execute();
					echo "<script> alert('Data Entered');</script>";
                   

            }

            function edit($appelant,$respondent,$citation,$act,$section,$details,$id)
            {
                $conn = getConnection();
                if($conn != null)
                {
                     $stmt = $conn->prepare("update judgement set appellant=:appelant,respondent=:respondent,citation=:citation,acts=:act,section=:section,details=:details where id=:id");
                    // $stmt->bindParam(':username',$_SESSION['username']);
                    $stmt->bindParam(':appelant',$appelant);
                    $stmt->bindParam(':respondent',$respondent);
                    $stmt->bindParam(':citation',$citation);
					$stmt->bindParam(':act',$act);
					$stmt->bindParam(':section',$section);
					$stmt->bindParam(':details',$details);
					$stmt->bindParam(':id',$id);
                    $stmt->execute();
                }
            }

            function del($id)
            {
                $conn = getConnection();
                if($conn != null)
                {
                    $stmt = $conn->prepare("delete from judgement where id=:id");
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                }
            }

            function getJudgements($query)
            {
                $conn = getConnection();

                if($conn != null)
                {
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->FetchAll();
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