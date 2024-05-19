<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egres-It</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<?php include_once 'components/header.php' ?>
<body>
    <!-- Header -->



    <?php echo $contenido; ?>



    <?php include_once 'components/footer.php' ?>    


    <?php echo $script ?? ''; ?>
    
</body>
</html>