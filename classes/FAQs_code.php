<?php
    class FAQs{

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

        function myQuestion($id){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("select * from question where pid = :pid");
                $stmt->bindParam(':pid',$id);
                $stmt->execute();
                $result = $stmt->FetchAll();
                return $result;
            }
        }
        function displayQuestion(){
            $conn = getConnection();
            if($conn != null)
            {
                 $stmt = $conn->prepare("select  p.photo,p.firstname,p.surname , question ,answer,q.date,q.time,q.qid from question q left join answer a on q.qid = a.aid join prosecutor p on p.pid = q.uid");
                // $stmt = $conn->prepare("select question , qid from question ")
				$stmt->execute();
                $result = $stmt->FetchAll();
                return $result;
            }
        }
		function displayAnswer($qid){
			$conn = getConnection();
			if($conn != null){
				$stmt = $conn->prepare("select answer from answer where qid = :qid");
				$stmt->bindParam(':qid',$qid);
				$stmt->execute();
				$ans = $stmt->FetchAll();
				return $ans;
			}
		}
        
        function addQuestion($id,$que,$date,$time){
            $conn = getConnection();
            $val = 1;
            if($conn != null)
            {
                $stmt = $conn->prepare("insert into question values(0,:uid,:type,:question,:date,:time)");
                $stmt->bindParam(':uid',$id);
                $stmt->bindParam(':type',$val);
                $stmt->bindParam(':question',$que);
                $stmt->bindParam(':date',$date);
                $stmt->bindParam(':time',$time);
                $stmt->execute();
            }
        }
        function getName($id){
            $conn = getConnection();
            if($conn != null)
            {
                $stmt = $conn->prepare("select firstname , surname from prosecutor where pid = :uid");
                $stmt->bindParam(':uid',$id);
               
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
                $stmt = $conn->prepare("select p.photo,p.firstname,p.surname , question ,answer,q.date,q.time,q.qid from question q left join answer a on q.qid = a.aid join prosecutor p on p.pid = q.uid where question like :src");
                $stmt->bindParam(':src',$ttl);
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
                $stmt = $conn->prepare("select p.photo,p.firstname,p.surname , question ,answer,q.date,q.time,q.qid from question q left join answer a on q.qid = a.aid join prosecutor p on p.pid = q.uid where Date between :frm AND :to");
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
                $stmt = $conn->prepare("select * from answer where answer like :ttl");
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