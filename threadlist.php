<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>ThreadList</title>
</head>

<body>

    <!-- header nav -->
    <?php include 'partials/_header.php';   ?>
    <?php include 'partials/_dbconnect.php';  ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

    ?>


    <!-- Categories  -->
    <?php

    echo '<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to ' . $catname . '</h1>
        <p class="lead">' . $catdesc . '</p>
        <hr class="my-4">
        <p>This is a peer to peer forum Platform to share knowledge to each other</p>
        <li>Keep it friendly.</li>
        <li>Be courteous and respectful. Appreciate that others may have an opinion different from yours.</li>
        <li>Stay on topic.</li>
        <li>Share your knowledge. ...</li>
        <li>Refrain from demeaning, discriminatory, or harassing behaviour and speech.</li>
        <br> 
        <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>'

    ?>



    <!-- container -->
    <div class="container">
        <h1>Browse Questions</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $thid = $row['thread_id'];
            $thtitle = $row['thread_title'];
            $thdesc = $row['thread_desc'];
            
            echo '<div class="media my-3">
            <img src="./img/user.jpg" width="50px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a href="thread.php">' . $thtitle . '</a></h5>
                <p>' . $thdesc . '</p>
            </div>
        </div>';
        }
        ?>

    </div>


    <!-- footer  -->
    <?php include 'partials/_footer.php'; ?>




    <!---------------------------------------------------------------- Optional JavaScript; choose one of the two! ---------------------------------------------->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>