<?php
// require_once('classes/connection.php');
	class Result{	
		private $result_count;
		function count_vote(){
			 $con= getConnection();
			if($con != null){
				$stmt = $con->prepare("select c.pid,v.position_id,p.firstname,count(*) from candidate c,vote v,prosecutor p where c.cid=v.cid and p.pid=c.pid group by c.pid,p.firstname,v.position_id" );
				$stmt->execute();
				$result = $stmt->FetchAll();
				return $result;
			}
		}
		function getPosition(){
			 $con = getConnection();
			if($con != null){
				$stmt = $con->preapre("select * from position");
				$stmt->execute();
				$position = $stmt->FetchAll();
				return $position;
			}
			
		}
	}
?>