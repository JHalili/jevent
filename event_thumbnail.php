<?php
    include_once('config.php');
    include_once('session.php');
    error_reporting( E_ALL );
    if(isset($row) && isset($file_name) && isset($username)):
?>

<div class="thumbnail">
    <img class="homepage-image" src="<?php echo $row["picture_url"]; ?>"
    onerror="this.src='images/texture.jpg'">
    <div class="caption">
        <h3><?php echo $row["title"]; ?></h3>
        <p>
            <?php echo $row["description"]; ?>
        </p>
        <form id="subscribe" method="post" action="<?php echo $file_name; ?>">
            <?php
                $event_id = $row["id"];
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["s".$event_id])){
                    $query = "INSERT INTO Interested(event_Id, user_username) VALUES ('$event_id', '$username')";
                    $become_interested_data = mysqli_query($db, $query);
                    if(!$become_interested_data) {
                        echo "<h3 style='color:red'>Could not subscribe.</h3>";
                    }
                } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["u".$event_id])) {
                    $query = "DELETE FROM Interested WHERE event_Id = '$event_id' AND user_username = '$username'";
                    $remove_interest_data = mysqli_query($db, $query);
                    if(!$remove_interest_data) {
                        echo "<h3 style='color:red'>Could not unsubscribe.</h3>";
                    }
                } else if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($invite_options = $_POST[$event_id."invite_options"])) {
                    $query = "INSERT INTO Invited(privateEvent_Id, user_username) VALUES ";
                    $count = count($invite_options);
                    $array = array();
                    for($i = 0; $i < $count; $i++) {
                        array_push($array, "('$event_id','$invite_options[$i]')");
                    }
                    $value_string = join(",", $array);
                    $query .= $value_string;
                    $query .= ";";
                    $sent_invitation_data = mysqli_query($db, $query);
                    if(!$sent_invitation_data) {
                        echo "<h3 style='color:red'>Could not send invitations.</h3>";
                    }
                }

                $query = "SELECT * FROM Event_Created WHERE '$event_id' = event_Id AND user_username = '$username'";
                $created_private_data = mysqli_query($db, $query);
                if(mysqli_fetch_array($created_private_data, MYSQLI_ASSOC)):
            ?>
            <button type="button" class="btn btn-primary btn-green" data-toggle="modal" data-target="<?php echo "#invite".$row["id"]; ?>">Invite</button>
            <?php else: ?>
                <?php
                    $query = "SELECT * FROM Interested WHERE event_Id = '$event_id' AND user_username = '$username'";
                    $interested_data = mysqli_query($db, $query);
                    if(!mysqli_fetch_array($interested_data, MYSQLI_ASSOC)):
                ?>
                <button type="submit" class="btn btn-primary" name="<?php echo "s".$event_id;?>">Subscribe</button>
                <?php else: ?>
                <button type="submit" class="btn btn-primary btn-red" name="<?php echo "u".$event_id;?>">Unsubscribe</button>
                <?php endif; ?>
            <?php endif; ?>
            <button type="button" class="btn" data-toggle="modal" data-target="<?php echo "#popup".$row["id"]; ?>">More</button>
            <!-- More Modal -->
            <div id="<?php echo "popup".$event_id; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- More Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><?php echo $row['title']; ?></h3>
                  </div>
                  <div class="modal-body">
                    <table>
                        <tr>
                            <td><b>Description:<b></td>
                            <td><?php echo $row['description']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Audience:<b></td>
                            <td><?php echo $row['audience']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Start Time:<b></td>
                            <td><?php echo $row['start_time']; ?></td>
                        </tr>
                        <tr>
                            <td><b>End Time:<b></td>
                            <td><?php echo $row['end_time']; ?></td>
                        </tr>

                        <?php
                            $query = "SELECT DISTINCT P.private_event_id FROM PrivateEvent P WHERE P.private_event_id = '$event_id';";
                            $private_data = mysqli_query($db, $query);
                            $is_private = mysqli_fetch_array($private_data, MYSQLI_ASSOC);
                            if($is_private):
                        ?>
                        <tr>
                            <td><b>Invited:<b></td>
                            <td>
                            <?php
                                $query = "SELECT DISTINCT U.name from User U, Invited I WHERE U.username = I.user_username AND I.privateEvent_Id = '$event_id';";
                                $invited_data = mysqli_query($db, $query);
                                while($names = mysqli_fetch_array($invited_data, MYSQLI_ASSOC)){
                                    echo "<a href='#'>".$names["name"]."</a><br>";
                                }
                            ?>
                            <td>
                        </tr>
                        <?php endif; ?>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Invite Modal -->
            <div id="<?php echo "invite".$event_id; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Invite Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Select users to invite to: <?php echo $row['title']; ?></h3>
                  </div>
                  <form id="invite" method="post" action="<?php echo $file_name; ?>">
                      <div class="modal-body">
                        <?php
                            $query = "SELECT DISTINCT U.name, U.username FROM User U WHERE U.username != '$username' AND U.username NOT IN (SELECT DISTINCT I.user_username FROM Invited I);";
                            $not_invited_data = mysqli_query($db, $query);
                            while($names = mysqli_fetch_array($not_invited_data, MYSQLI_ASSOC)):
                        ?>
                            <input type="checkbox" name="<?php echo $event_id."invite_options[]"; ?>" value="<?php echo $names["username"];?>"><?php echo $names["name"];?><br>
                        <?php endwhile; ?>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-green">Invite</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </form>
    </div>
</div>

<?php
    endif;
?>