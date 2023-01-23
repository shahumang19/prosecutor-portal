<?php
    $obj = new NewsFeed();

    if(isset($_POST['post'])){
       
        $msg = $_POST['txt'];
        $pid = $_POST['pid'];
        $obj->add($msg,$pid);
    }
    
    if(isset($_POST['cmt'])){
        echo"<script> alert('disha');</script>";
        $cmt = $_POST['cmt_text'];
        $pid =$_POST['pid'];
        $nid =$_POST['nid'];
        $obj->addComment($pid,$nid,$cmt);
    }
?>