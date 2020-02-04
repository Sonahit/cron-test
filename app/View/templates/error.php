<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if ($status >= 400 and $status <= 499) {
        print("Page not found");
    }
    if ($status >= 500) {
        print("Something went wrong");
    }
    ?>

</body>
</html>
