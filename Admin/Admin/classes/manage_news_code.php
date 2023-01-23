<?php
    require_once('connection.php');
    //echo "<script>alert(1311);</script>";
    $ff= fopen("classes/abc.txt","w");
    
        require_once('classes/newsFeed.php');

        $ns = new NewsFeed();

    if(isset($_POST['add']))
    {
        $action = $_POST['add'];
        $ttl = $_POST['ttl'];
        //fwrite($ff,"xx22zz");

        //fwrite($ff," a1 ");
        $msg = $_POST['msg'];
        //fwrite($ff," a2 ".$msg);
        $ns->add($msg,$ttl);
        echo "<script>alert('Data Added');</script>";
    }

    if(isset($_POST['edit']))
    {
        echo "<script>alert('".$_POST['id']." : ".$_POST['msg1']." : ".$_POST['ttl1']."');</script>";
         $id =  $_POST['id'];
         $msg = $_POST['msg1'];
         $ttl = $_POST['ttl1'];
         $ns->edit($id,$msg,$ttl);
    }   
    
    if(isset($_POST['remove']))
    {
        //echo "<script>alert('".$_POST['id']."');</script>";
        $id =  $_POST['id'];
        $ns->del($id);
    }

    if(isset($_POST['search']))
    {
        //echo "<script>alert('".$_POST['id']."');</script>";
        $param = $_POST['search_param'];
        if($param == 'Title')
        {
            $search = $_POST['x'];
            $result = $ns->findRecordByTitle($search);
        }
        else if($param == 'News')
        {
            $search = $_POST['x'];
            $result = $ns->findRecordByNews($search);
        }
        else
        {
            $from = $_POST['fromd'];
            $to = $_POST['tod'];
            $result = $ns->findRecordByDate($from,$to);
        }
    }
    else
    {
        $result = $ns->getFeeds();
    }

    fwrite($ff,"1122");
    fclose($ff);
    //echo "<script>alert('".$_POST['action']."');</script>";
    
?>