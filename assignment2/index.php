<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Assignment 2 | Calculator </title>
</head>
<body>

<?php 
// gloabl variables
$operator = isset($_POST["operator"]) ? $_POST["operator"] : "+";  
$answer = 0;

function add($number1, $number2){
    return $number1 + $number2;
};

function subtract($number1, $number2){
    return $number1 - $number2;
};

function multiply($number1, $number2){
    return $number1 * $number2;
};

function divide($number1, $number2){
    return $number1 / $number2;
};







// this should run only if form is submitted;
if (isset($_POST["number1"]) && isset($_POST["number2"])){
    switch($operator){
        case "+":
            $answer = add($_POST["number1"], $_POST["number2"]);
            break;
        case "-":
            $answer = subtract($_POST["number1"], $_POST["number2"]);
            break;
        case "x":
            $answer = multiply($_POST["number1"], $_POST["number2"]);
            break;
        case "/":
            $answer = divide($_POST["number1"], $_POST["number2"]);
            break;
    }
};



?>

    <div class="container mt-5">
            <div class="d-flex aligns-items-center justify-content-center">
                <div class="col-6">
                    <h1 class="text-center mb-5">Calculator</h1>
                    
                    <form action="" method="post">
                        <div class="row mb-4">
                            <div class="col-5">
                                <label for="number1" class="form-label">Enter first number:</label>
                                <input type="number" class="form-control" name="number1" value="<?php echo isset($_POST["number1"]) ? $_POST["number1"] :  0 ?>" required />
                            </div>

                            <div class="col-2">
                                <label for="" class="form-label">Operator</label>
                                <input type="text" class="form-control text-center"  value="<?php echo $operator ?>" disabled/>
                            </div>

                            <div class="col-5">
                                <label for="number2" class="form-label">Enter second number:</label>
                                <input type="number" class="form-control" name="number2" value="<?php echo isset($_POST["number2"]) ? $_POST["number2"] : 0 ?>" required />
                            </div>
                        </div>

                        <div class="row mb-4 text-center">
                            <div class="col"> <input type="submit" class="px-5 btn btn-lg btn-secondary" name="operator"  value="+" />  </div>
                            <div class="col"> <input type="submit" class="px-5 btn btn-lg btn-secondary" name="operator"  value="-" />  </div>
                            <div class="col"> <input type="submit" class="px-5 btn btn-lg btn-secondary" name="operator"  value="x" />  </div>
                            <div class="col"> <input type="submit" class="px-5 btn btn-lg btn-secondary" name="operator"  value="÷" />  </div>
                        </div>

                        <div class="d-grid gap-2  mb-4">
                            <button class="btn btn-primary" type="submit" >Calculate </button>
                        </div>

                        <div class="row px-2">
                                <input type="text" class="form-group p-4"  value="ANS:  <?php echo $answer ?>" readonly/>
                        </div>
                        <?php
                        // var_dump($_POST);
                        
                        
                        ?>
                        
                    </form>
                </div>
                
                
            </div>
            

    </div>

    
</body>
</html>