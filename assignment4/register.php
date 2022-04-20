<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" >

    <title>Assignment 4 | SignUp Form </title>
</head>
<body>

<?php
// gloabal variables
$FILENAME = "userDB.txt";
$USERSDATA = readTextFileDB();





// pass confirm check
function checkConfirmPassword ($pass1, $pass2){
    if ($pass1 !== $pass2){
        $ErrorMessage = "Confirm password does not match, please try again";
    } else {
        $ErrorMessage = "";
    }
    return $ErrorMessage;
};

// check if user name taken already
function checkUserNameExists($username){
    if(array_key_exists($username, $GLOBALS["USERSDATA"])){
        $ErrorMessage = "Username taken already, please choose another one or sign in!";
    }else {
        $ErrorMessage = "";
    }
    return $ErrorMessage;
}

// function to get all form data and put it in an array
function getFormData($fname, $lname, $username, $email, $password){
    $userDataArray =  Array(
        "fName" => $fname,
        "lName" => $lname,
        "username" => $username,
        "email"=> $email,
        "password"=> $password
    );
    return $userDataArray;
};

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

function storeTextFileDB($userData){
    $file = fopen($GLOBALS['FILENAME'], "w");
    fwrite($file, json_encode($userData));
    fclose($file);
}



// now lets run everything

// first check if form is submitted and there are no errors
if(isset($_POST) && !empty($_POST) && empty(checkConfirmPassword($_POST['password'], $_POST['confirmPassword'])) && empty(checkUserNameExists($_POST['userName']))  ){
    // store all field in assoc
    $newUserData = getFormData($_POST['firstName'],$_POST['lastName'], $_POST['userName'], $_POST['email'], $_POST['password']);

    // push to global usersdata if it does not exist
    $USERSDATA[$newUserData['username']] = $newUserData;
   
    // now store back to the file
    storeTextFileDB($USERSDATA);

    echo "<script> alert( 'User registered successfully, Please sign in now') </script>";

};


?>

<div class="container mt-5">
    <div class="d-flex align-items-center justify-content-center mb-4">
            <div class="col-6 page">
                <div class="container">
                <h1 class="text-center">Sign Up</h1>
                <form action="" class="form-group" method="post">
                    <div class="row mt-5 mb-4">
                        <div class="col-6">
                            <input 
                                type="text" 
                                name="firstName" 
                                class="form-control" 
                                placeholder="First Name"  
                                value="<?php echo isset($_POST['firstName'])? $_POST['firstName'] : ''?>"
                                required
                            >
                        </div>
                        <div class="col-6">
                            <input 
                                type="text" 
                                name="lastName" 
                                class="form-control" 
                                placeholder="Last Name" 
                                value="<?php echo isset($_POST['lastName'])? $_POST['lastName'] : '' ?>"
                                required
                            >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input 
                                type="text" 
                                name="userName" 
                                class="form-control" 
                                placeholder="Username" 
                                value="<?php echo isset($_POST['userName'])? $_POST['userName'] : '' ?>"
                                required
                            >
                        </div>
                        <div class="form-text text-danger"> 
                            <?php if(isset($_POST['userName']) ){ echo checkUserNameExists($_POST['userName']);} ?> 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input 
                                type="text" 
                                name="email" 
                                class="form-control" 
                                placeholder="Email" 
                                value="<?php echo isset($_POST['email'])? $_POST['email'] : '' ?>"
                                required
                            >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control"  
                                placeholder="Password" 
                                value="<?php echo isset($_POST['password'])? $_POST['password'] : '' ?>"
                                required
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input 
                                type="password" 
                                name="confirmPassword" 
                                class="form-control" 
                                placeholder="confirm Password" 
                                value="<?php echo isset($_POST['confirmPassword'])? $_POST['confirmPassword'] : '' ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-text text-danger"> 
                        <?php if(isset($_POST['password']) ){ echo checkConfirmPassword($_POST['password'], $_POST['confirmPassword']);} ?> 
                    </div>
                    <div class="d-grid mt-4 mb-4">
                        <button type="submit" class="btn btn-primary">Register Now</button>
                    </div>
                    <h6 class="text-center">Already have an account? <a href="index.php">Login</a> now</h6>

                </form>
                </div>
            </div>
        
    </div>
</div>

    
</body>
</html>