<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" >

    <title>Assignment 4 | Home </title>
</head>
<body>


<?php 
// gloabal variables
$FILENAME = "userDB.txt";
$USERSDATA = readTextFileDB();

// function to read all data in the file and store data in an assoc
function readTextFileDB(){
    $filename = $GLOBALS['FILENAME'];
    $file = fopen($filename, "r");
    if($file){
        $contents = fread($file, filesize($filename));
        fclose($file);
    }; 
    return json_decode($contents, true);
};

$username = $_GET['username'];
$fName = $USERSDATA[$username]['fName'];
$lName = $USERSDATA[$username]['lName'];
$email = $USERSDATA[$username]['email'];

?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center mb-4">
        <div class="col-8">
            <div class="card">
                <div class="row">
                    <div class="col-4 user-bg  pt-4">
                        <div class="card-block text-center text-white">
                            <div class="mb-2"> <img src="user-icon.png" class="img-radius" alt="User-Profile-Image"> </div>
                            <h6 class="text-bold"><?php echo $username ?></h6>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-block">
                            <h4 class="mb-1 text-bold"> User Information</h4>
                            <div class="divider mb-3"></div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="text-bold">First Name</p>
                                    <h6 class="text-muted"><?php echo $fName ?></h6>
                                </div>
                                <div class="col-6">
                                    <p class="text-bold">Last Name</p>
                                    <h6 class="text-muted"><?php echo $lName ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <p class="text-bold">Email</p>
                                    <h6 class="text-muted"><?php echo $email ?></h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
    
</body>
</html>