<?php

     /**
     * Created by PhpStorm.
     * User: hamdy
     * Date: 2/25/16
     * Time: 1:35 AM
     *
     * This file takes iteratively the inputs given from any form and
     * pass them for addition in the DataBase.
     *
     */

    $str = "field";
    $count = 0;
    $table = null;

    /**
     * Creates table that includes all form's data.
     */

    $tableName = $_POST['formName'];
    while (isset($_POST[$str . $count])) { // checks if POST exists
        $table[$count] = $_POST[$str . $count];
        $count++;
    }
    $return=1;
    if($tableName=="Staff"){
        $table[1]=md5($table[1]);
        $str = $str . $count;
        if(is_uploaded_file($_FILES[$str]['tmp_name'])){
            $return = saveFile($table[0], $str, "StaffPictures/");
            if($return==1)
                $table[$count] = $table[0].".zip";
            else
                $table[$count] = "";
        }
        else
            $table[$count] = "";
    }
    else if($tableName=="Student"){
        $str = $str . $count;
        if(is_uploaded_file($_FILES[$str]['tmp_name'])){
            $return = saveFile($table[0],$str,"StudentDocuments/");
            if($return==1)
                $table[$count] = $table[0].".zip";
            else
                $table[$count] = "";
        }
        else
            $table[$count] = "";

    }
    else if($tableName=="Tschedule"){
        $str = $str . $count;
        $pKey = $table[0]."-".$table[1]."-".$table[2]."-".$table[3];
        if(is_uploaded_file($_FILES[$str]['tmp_name'])) {
            $return = saveFile($pKey, $str, "ScheduleDocuments/");
            if($return==1)
                $table[$count] = $pKey.".zip";
            else
                $table[$count] = "";
        }
        else
            $table[$count] = "";
    }

//echo "<script type='text/javascript'>alert(".$fileName.");</script>";

    function saveFile($pKey,$str,$dir){
        $target_dir = $dir;
        $target_file = $target_dir . basename($_FILES[$str]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check file size
        if ($_FILES["$str"]["size"] > 30000000) {
            echo "<script type='text/javascript'>alert('Sorry, your file is too large.');</script>";
            return 0;
        }
// Allow certain file formats
        if($imageFileType != "zip" ) {
            echo "<script type='text/javascript'>alert('Sorry, only Zip files are allowed.');</script>";
            return 0;
        }

        if (move_uploaded_file($_FILES[$str]["tmp_name"], $target_dir.$pKey.".zip")) {
            echo "The file ". basename( $_FILES[$str]["name"]). " has been uploaded.";
            return 1;
        } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
        }


    }


   include 'dbManipulation.php';
        if($return==1)
            insert($table, $tableName);
        else
            echo "<script type='text/javascript'>alert('Insert failed!');</script>";



