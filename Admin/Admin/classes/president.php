<?php

    if(isset($_POST['submit']))
    {
        saveImage();
        save();
        //echo "1111";
    }


    function save()
    {
       // echo "11121";
        $file = fopen("president/president.txt","w") or die("Unable to open the file.");
        $data = $_POST['pname']."\n".$_POST['description']."\n";
        //$data = "test \n t1";
        fwrite($file,$data);
        fclose($file);
    }

    function saveImage()
    {
        //Image transfer code
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        $ss = "<script>";$es="</script>";
        //$check = true;

        if($check !== false) {
            //echo "File is an image - ".$_FILES["img"]["name"] ;//. $check["mime"] . ".";
            if (move_uploaded_file($_FILES["img"]["tmp_name"], "president/president.jpg")){
                //echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
                echo $ss."alert('Data has been updated.')".$es;
                //echo "<br/>".$_POST["f1"];
            } else {
                echo $ss."alert('Sorry, An error ocurred while updating the info.')".$es;
            }
            $uploadOk = 1;
        } else {
            echo $ss."alert('File is not an image.')".$es;
            $uploadOk = 0;
            //exit(0);
        }
    }

?>