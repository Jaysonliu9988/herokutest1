<?php

// require_once realpath("../vendor/autoload.php");
require_once ("src/php/component.php");
// require_once ("src/php/operation.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <script src="https://kit.fontawesome.com/e41cb624b5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="style.css">    
</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "book_id",""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "book_price",""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php

                        if(isset($_POST['read'])){
                            $result = getData();

                            if($result){

                                while($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['book_name'];?></td>
                                    <td><?php echo $row['book_publisher'];?></td>
                                    <td><?php echo $row['book_price'];?></td>
                                </tr>
                            <?php
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>


    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- <script src="src/php/main.js"></script> -->
</body>
</html>