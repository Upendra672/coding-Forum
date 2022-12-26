<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Threads</title>
</head>

<body>

    <!-- header nav -->
    <?php include 'partials/_header.php';   ?>
    <?php include 'partials/_dbconnect.php';  ?>

<!-- jambotron php -->
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `thread` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }

    ?>

<!-- comment php -->
<?php
    $showALert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $th_comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`) VALUES ( '$th_comment', '$id', '0')";
        $result = mysqli_query($conn, $sql);
        $showALert = true;
        if ($showALert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your commet has been added.
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
        <h1 class="display-6">Title: ' . $title . '</h1>
        <p class="lead">Description: <br>' . $desc . '</p>
        <hr class="my-4">
        <p>This is a peer to peer forum Platform to share knowledge to each other</p>
        <li>Keep it friendly.</li>
        <li>Be courteous and respectful. Appreciate that others may have an opinion different from yours.</li>
        <li>Stay on topic.</li>
        <li>Share your knowledge. ...</li>
        <li>Refrain from demeaning, discriminatory, or harassing behaviour and speech.</li>
        <br> 
        <p><b>Posted by Upendra</b></p>
        </div>
        </div>'
        
        ?>




    <!-- form -->
    <div class="container my-3">
        <h1>Post a Comment</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="comment">Type Your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>

    <!-- container -->
     <div class="container">
        <h1>Discussion</h1>

     <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
         $comment_time = $row['comment_time'];
        
            echo '<div class="media my-3">
           <img src="./img/user.jpg" width="50px" class="mr-3" alt="...">
           <div class="media-body">
           <p class="font-weight-bold my-0">Anonymous users at '.$comment_time.'</p>
           '.$content.'
           </div>
       </div>';
        }

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



