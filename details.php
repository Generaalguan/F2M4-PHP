<?php
    require 'functions.php';
    $connection = dbconnect();

    if( !isset( $_GET['id']) ){
        echo "De id is niet gezet";
        exit;
    }

    $id = $_GET['id'];
    $check_int = filter_var($id, FILTER_VALIDATE_INT);
    if($check_int == false){
        echo"ditis geen getal";
        exit;
    }
     
    $statement = $connection->prepare('SELECT * FROM `programmeurs` WHERE id=?');
    $params = [$id];
    $statement->execute($params);
    $place = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time()?>">
    <title></title>
</head>
<body>
    <section class="testimonial">
        <div class="small-container">
                    <div class="row">
                   
                        <div class="col-3">
                            <i class="fa fa-quote-left"></i>
                            <h3><?php echo $place['titel'] ?></h3>
                            <figure class="programmers-img" style="background-image: url(/F2M4WEB-SHOP/database/img/<?php echo $place['foto'];?>)" > </figure>
                            <p class="text"><?php echo $place['grote_beschrijving'] ?></p>
                        </div>

                    </div>
                </div>
    </section>
</body>

</html>



