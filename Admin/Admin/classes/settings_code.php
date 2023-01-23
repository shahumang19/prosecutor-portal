<?php
require_once('classes/connection.php');
require_once('classes/admin.php');

if(isset($_POST['del']))
{
    $user = new Admin();
    $result = $user->deleteUser($_POST['mail']);
    echo "<script>alert('Admin deleted')</script>";
}

if(isset($_POST['change']))
{
    $user = new Admin();
    $result = $user->changePassword($_SESSION['username'],$_POST['newp']);
    echo "<script>alert('Password Changed')</script>";
}

if(isset($_POST['add']))
{
    $user = new Admin();
    $result = $user->addUser($_POST['user'],$_POST['newp']);
}

function printdata()
{
    echo '<table id="tab">
            <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Remove</th>
            </tr>';
    
            $user = new Admin();
            $result = $user->getData($_SESSION['username']);

    $cnt = 1;

    foreach($result as $d)
    {
        echo "<form method='post' action='settings.php'><tr>
        <td>$cnt</td>
        <td>".htmlentities($d[0])."</td><input name='mail' type='hidden' value=".htmlentities($d[0]).">
        <td><button name='del'><img src='img/remove.png' height='15px' width='15px'></button></td>
        </tr></form>"; 
        $cnt++;
    }
    
}

?>