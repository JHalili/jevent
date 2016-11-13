<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Source code of Campus Events">
    <meta name="author" content="Joana Halili AND Rubin Deliallisi">
    <title>Campus Event</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include_once("analyticstracking.php");
        include_once("config.php");
        include_once("session.php");
    ?>
    <?php include_once('navbar.php') ?>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            echo '<div class="container">';

            $title = mysqli_real_escape_string($db,$_POST['title']);
            $description = mysqli_real_escape_string($db,$_POST['description']);
            $audience = mysqli_real_escape_string($db,$_POST['audience']);
            $public_private = mysqli_real_escape_string($db,$_POST['public-private']);
            $start_time = mysqli_real_escape_string($db,$_POST['start_time']);
            $end_time = mysqli_real_escape_string($db,$_POST['end_time']);

            // For the moment store in images
            // Latter a directory will exist for every user
            $target_dir = "images/";
            $username = $_SESSION["login_user"];
            $target_file = $target_dir.$username."_".basename($_FILES["ufile"]["name"]);
            if(($_FILES["ufile"]["name"]) == '') {
                $target_file = "images/texture.png";
            } else {
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["ufile"]["tmp_name"]);
                if($check == false) {
                    echo "<h1>File is not an image.</h1>";
                    goto cleanup;
                }

                // Check file size
                if ($_FILES["ufile"]["size"] > 500000) {
                    echo "<h1>Sorry, your file is too large.</h1>";
                    goto cleanup;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "<h1>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h1>";
                    goto cleanup;
                }
                $destination_path = getcwd().DIRECTORY_SEPARATOR;
                if (!move_uploaded_file($_FILES["ufile"]["tmp_name"], $destination_path.$target_file)) {
                    echo "<h1>Sorry, there was an error uploading your file.</h1>";
                    goto cleanup;
                }

                // Upload data to database
                if(!empty($title) && !empty($description) && !empty($public_private) && !empty($start_time) && !empty($end_time)) {
                    mysqli_autocommit($db, FALSE);
                    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);
                    $query = "INSERT INTO Event (title, start_time, end_time, description, audience, picture_url) 
                    VALUES ('$title','$start_time','$end_time','$description', '$audience', '$target_file')";
                    $data = mysqli_query ($db, $query);
                    if(!$data) { 
                        echo "<h1>Could store Event in database.</h1>" ;
                        mysqli_rollback($db);
                        mysqli_autocommit($db, TRUE);
                        goto cleanup;
                    }
                    $return_id = mysqli_insert_id($db);
                    if($public_private == "Public") {
                        $query = "INSERT INTO PublicEvent(public_event_id) VALUES ('$return_id')";
                    } else if($public_private == "Private") {
                        $query = "INSERT INTO PrivateEvent(private_event_id) VALUES ('$return_id')";
                    } else {
                        echo "<h1>Corrupt data passed into server!</h1>";
                        mysqli_rollback($db);
                        mysqli_autocommit($db, TRUE);
                        goto cleanup;
                    }

                    $data = mysqli_query($db, $query);
                    if(!$data) {
                        echo "<h1>Could not store Event Type in database.</h1>";
                        mysqli_rollback($db);
                        mysqli_autocommit($db, TRUE);
                        goto cleanup;
                    }

                    $query = "INSERT INTO Event_Created(event_Id, user_username) VALUES('$return_id', '$username')";
                    $data = mysqli_query($db, $query);
                    if(!$data) {
                        echo "<h1> Could not store Event Creator in database. </h1>";
                        mysqli_rollback($db);
                        mysqli_autocommit($db, TRUE);
                        goto cleanup;
                    } else {
                        echo "<h1>Event successfully created.</h1>";
                    }
                    mysqli_commit($db);
                    mysqli_autocommit($db, TRUE);
                }
            }
            cleanup:
                echo "</div>";
        else:
    ?>

    <form id="sign-up" action="create_event.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Title*</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Description*</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text"  name="description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Audience</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" name="audience">
                       </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Public / Private*</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="public-private" required>
                                <option>Public</option>
                                <option>Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Start time*</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="date" name="start_time" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">End time*</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="date" name="end_time" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Event Image</label>
                        <div class="col-xs-10">
                            <input type="file" name="ufile" id="ufile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </div> <!-- /.col-sm-10 -->
                <div class="col-sm-1">
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </form>

    <?php endif ?>

    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <p>jevent.tk © 2016 <a href="imprint.php">Imprint</a> </p>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
