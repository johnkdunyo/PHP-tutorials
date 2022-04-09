<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Assignment 3 | Multiplication Table</title>
</head>
<body>

    <!-- php functions -->
    <?php 
        // this checks if the input is within the constraits given, if not then we return error message
        function inputCheck ($number) {
            if($number < 1){
                $errorMessage = "Please the input number must not be less than 1";
            }elseif ($number > 12){
                $errorMessage = "Please the input number must not be greater than 12";
            }else{
                $errorMessage = "";
            }
            return $errorMessage;
        };

        // this multiplies two numbers and return the result
        function multiply($x, $y){
            return $x * $y;
        }

        // this generates multiplication table for the value entered.
        function multiplicationTable ($n) {
            $str = "";
            for($k = 1; $k <= 12; $k++){
                $str .=  "<p>". $n . " X " . $k . " = ". multiply($k, $n). "</p>";
            };
            return $str;
        };
    ?>



    <div class="container mt-5">
        <div class="d-flex aligns-items-center justify-content-center mb-4">
            <div class="col-6">
                <h1 class="text-center mb-4">Multiplication Table</h1>
                <form action="" method="get">
                    <div class="row">
                        <div class="col-8">
                            <input type="number" name="input_number" class="form-control" value="<?php echo isset($_GET["input_number"]) ? $_GET["input_number"] : 1 ;?>" required />
                        </div>
                        <div class="col-4 d-grid">
                            <button class="btn btn-primary" type="submit">Generate table</button>
                        </div>
                    </div>
                    <div class="form-text text-danger"> <?php if(isset($_GET['input_number'])){ echo inputCheck($_GET['input_number']);} ?> </div>
                </form>
            </div>
        </div>
        <!-- tables-->
        <div class="row">
            <?php if(isset($_GET['input_number']) && empty(inputCheck($_GET['input_number'])))
            {
                foreach(range(1, $_GET['input_number']) as $k => $n){
                    print (
                        "<div class='col-sm-2'>
                            <div class='card text-center'>
                                <div class='card-header'>".
                                    $n."X Table
                                </div>
                                <div class='card-body'>".
                                     multiplicationTable($n)
                                ."</div>
                            </div>
                        </div>
                        "
                    );
                } 
            } ; 
            ?>
                
        </div>

    </div>
    
</body>
</html>