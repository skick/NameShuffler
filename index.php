<!DOCTYPE html>
<?php
    include "includes/fileActions.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="includes/style.css">
        <title>Name shuffle app</title>        
    </head>
    <body>
        <div id="addingNames">
            <h3> Enter names:</h3>
            <form action="includes/fileActions.php" method="POST">
                <input type="text" name="name">
                <button>SUBMIT</button>
            </form>
        </div>
        <div id="namesList">
            <?php
                listItems();
            ?>
            <form action="includes/fileActions.php" method="post"> 
                <input type="submit" name="empty"
                    class="button" value="Empty" /> 
            </form>
        </div>
        
        <div id="results">
            <form method="post"> 
                <input type="submit" name="calc"
                    class="button" value="Calculate" /> 
            </form>
            <?php
            if(isset($_POST['calc'])) {
                $file = "includes/names.txt";
                $buyers = file($file);
                $receivers = file($file);
                $received = array();

                shuffle($buyers);
                shuffle($receivers);

                echo "<h3>Results:</h3>";

                for($x=0; $x<count($buyers); $x++){
                    echo "<br>";   
                    //Stops the last pair to be the same person
                    if($x == count($buyers) - 2){
                        if($buyers[$x+1] == $receivers[1]){
                            echo $buyers[$x] . " -> " . $receivers[1];
                            echo "<br>";
                            echo $buyers[$x+1] . " -> " . $receivers[0];
                            break;
                        }
                    }
                    for($y = 0; $y < count($receivers); $y++){
                        if($buyers[$x] != $receivers[$y]){
                            echo $buyers[$x] . " -> " . $receivers[$y];
                            unset($receivers[$y]); 
                            $receivers = array_values($receivers);
                            break;
                        }
                    }
                }
            }
            ?>
        </div>
    </body>
</html>
