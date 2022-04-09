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
    <section class="center">
        <img class="logo" src="icons/google.png" alt="google logo" />
        <img class="search_icon" src="icons/search_icon.png" alt="search icon" />
        <img class="mic" src="icons/mic.png" alt="mic icon" />
        <form action="search.php" method="get">
        <input type="text" name="query" class="search_input"></input>
        <div class="search_buttons">
            <button class="submit_buttons" type="submit" >Google Search</button>
            <button class="submit_buttons" >I'm Feeling Lucky</button>
        </div>
        </form>
    </section>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>