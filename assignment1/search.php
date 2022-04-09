<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
    <title>Google Clone</title>
</head>
<body>
    <div class="container">
            <nav class="navbar navbar-light mt-4">
                <div class="container-fluid">
                    <div class="row align-items-start">
                        <div class="col-3">
                            <a class="navbar-brand" href="index.php">
                                <img src="icons/google.png" alt="" width="90px" height="34px" class="d-inline-block align-text-top">
                            </a>
                        </div>
                        <div class="col-6">
                        <form action="search.php" method="get">
                            <div class="flex-nowrap">
                                <input type="text" name="query" value="<?php echo ($_GET["query"]) ?>" class="search_input"></input>
                                <span><img class="search_icon2" src="icons/search_icon.png" width="80px" height="34px" alt="search icon" /></span>
                            </div>
                            
                        </form>
                        </div>

                    </div>
                    
                </div>
            </nav>
            <hr/>


            <?php
                $curl = curl_init();
                
                
                $queryStructured =  str_replace(" ", "%20", $_GET['query']);
                // echo $queryStructured;
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/WebSearchAPI?q=$queryStructured&pageNumber=1&pageSize=10&autoCorrect=true",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com",
                        "X-RapidAPI-Key: 7a19de882amshe1a9f00633d9d8bp1b38c0jsnb5a70c41d488"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } 
                // echo var_dump($response['value']);
                // echo gettype(($response));
                $resArray = (json_decode($response,true));
                // print_r($resArray["value"][0]["title"]);
                // print_r($resArray["value"][0]["description"]);
                // echo (sizeof($resArray["value"]));
                for ($i = 0; $i < 10; $i++){
                    echo ("<div class='mt-4'> <h3>" . $resArray['value'][$i]['title']. "</h3>");
                    echo ("<p>" . $resArray['value'][$i]['description']. "</p> </div>");

                    echo "<div class='mt-5'></div>";
                   
                    
                    
                }
                
                ?>


        
        <hr/>


    </div>
    
</body>
</html>