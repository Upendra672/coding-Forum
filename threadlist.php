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


<!-- php for jumbotron -->
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

<!-- form php -->
<?php
    $showALert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '0')";
        $result = mysqli_query($conn, $sql);
        $showALert = true;
        if ($showALert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread is added please wait for someone to respond.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        }
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
</div>';
    ?>

    

    <!-- form -->
    <div class="container my-3">
        <h1>Ask a Questions</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter Title">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short as possible.</small>
            </div>
            <div class="form-group">
                <label for="desc">Elaborate Your Problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- container -->
    <div class="container">

        <h1>Browse Questions</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $thid = $row['thread_id'];
            $thtitle = $row['thread_title'];
            $thdesc = $row['thread_desc'];
            $thread_time = $row['timestamp'];

            echo '<div class="media my-3">
            <img src="./img/user.jpg" width="50px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">Anonymous users at '.$thread_time.'</p>
                <h5 class="mt-0"><a href="thread.php?threadid=' . $thid . '">' . $thtitle . '</a></h5>
                <p>' . $thdesc . '</p>
            </div>
        </div>';
        }
        // echo var_dump($noresult);
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Thread Found</p>
              <p class="lead">Be the first person to ask a question.</p>
            </div>
          </div>';
        }
        ?>



    </div>


    <!-- footer  -->
    <?php include 'partials/_footer.php'; ?>




    <!---------------------------------------------------------------- Optional JavaScript; choose one of the two! ---------------------------------------------->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>