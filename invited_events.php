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
    <?php include_once('session.php');
        include_once('navbar.php');
        $username = $_SESSION["login_user"];
        $file_name = basename(__FILE__);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <span class="label label-default" contenteditable="false">Invited</span>
            </div>
            <div class="col-md-10">
                <?php
                $username = $_SESSION["login_user"];
                $query = "SELECT DISTINCT * from Event E, Invited I WHERE E.id = I.privateEvent_Id AND I.user_username = '$username'";
                $data = mysqli_query($db, $query);
                // Don't check data but still show result
                $item_row = 0;
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)):
                if($item_row == 0):
                ?>
                <div class="row">
                    <?php endif; ?>
                    <div class="col-md-4">
                        <?php include("event_thumbnail.php"); ?>
                    </div>
                    <?php
                    $item_row = $item_row + 1;
                    if($item_row == 3):
                    $item_row = 0;
                    ?>
                </div>
                <?php endif; ?>
                <?php endwhile;
                if($item_row != 0):
                ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-1">
        </div>
        </div>
    </div>
    
    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <p>jevent.tk © 2016 <a href="imprint.php">Imprint</a>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>