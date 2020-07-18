<?php
    if(!empty($_GET['tcnic']))
    {
        $filename = basename($_GET['tcnic']);
        $filepath = 'Images/Tutors/Cnic/' . $filename;
        if(!empty($filename) && file_exists($filepath)){
    
    //Define Headers
            header("Cache-Control: public");
            header("Content-Description: FIle Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");
    
            readfile($filepath);
            exit;
    
        }
        else{
            echo "This File Does not exist.";
        }
    }
?>