<?php


if(isset($_POST['name']) and $_POST['name'] != "") {
    addToFile();
}

if(isset($_POST['empty'])){
    emptyfile();
}


function addToFile(){
    $namefile = fopen("names.txt", "a") or die("Unable to open file.");
    fwrite($namefile, $_POST['name'] . "\n");
    fclose($namefile);
    header("Location: ../index.php");     
}

function emptyFile(){
    $file = @fopen("names.txt", "r+");
    if ($file != false) {
        ftruncate($file, 0);
        fclose($file);
    }
    header("Location: ../index.php");    
}

function listItems(){
    if(file_exists("includes/names.txt")){
        $lines = file("includes/names.txt");
        echo "<h3> Names added: </h3>";
        foreach($lines as $line) {
            echo $line . "<br>";
        } 
    }    
}