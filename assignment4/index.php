<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" >

    <title>Assignment 4 | SignIn </title>
</head>
<body>

<?php
// gloabal variables
$FILENAME = "userDB.txt";
$USERSDATA = readTextFileDB();
$ErrorMessage = "";


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

// print_r($GLOBALS['USERSDATA'][$_POST['username']]['password']);
// check if user name taken already
function checkUserNameExists($username, $password){
    if(array_key_exists($username, $GLOBALS["USERSDATA"])){
        // check if password is correct
        if($password === $GLOBALS['USERSDATA'][$username]['password']){
            // navigate user to home.php
            $ErrorMessage = "";
            header("Location: home.php?username=$username");
        }else{
            $ErrorMessage = "Password incorrect, please check and type again";
        };
    }else {
        $ErrorMessage = "Username not found, Please create an account";
    }
    return $ErrorMessage;
}

if(isset($_POST['username'])){
    $GLOBALS['ErrorMessage'] = CheckUserNameExists($_POST['username'], $_POST['password']);
}

?>

<div class="container mt-5">
    <div class="d-flex aligns-items-center justify-content-center mb-4">
            <div class="col-6 page">
                <div class="container">
                <h1 class="text-center">Sign In</h1>
                <form action="" class="form-group" method="POST">

                    <div class="row mt-4 mb-4">
                        <div class="col-12">
                            <input 
                                type="text" 
                                name="username" 
                                class="form-control" 
                                placeholder="Username" 
                                value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"
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
                                value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"
                                required
                            >
                        </div>
                    </div>
                    <div class="form-text text-danger mb-4"> 
                            <?php echo $ErrorMessage ?> 
                    </div>
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>

                    <h6 class="text-center">New user? <a href="register.php">Sign Up</a> now</h6>

                </form>
                </div>
            </div>
        
    </div>
</div>

    
</body>
</html>