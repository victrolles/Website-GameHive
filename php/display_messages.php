<?php
session_start();
// Include the database connection fil
if (isset($_SESSION["id_friend"])) {
    
    include "database.php";
    ConnectDatabase();
    // Get the logged-in user's ID
    $id_profil = GetIdFromPseudo();
    // Get the ID of the conversation partner
    $id_profil_receiver = $_SESSION["id_friend"];

    // Retrieve all messages between the logged-in user and the conversation partner
    // display all messages
    $sql = "SELECT * FROM(SELECT * FROM message WHERE (id_sender = $id_profil AND id_receiver = $_SESSION[id_friend]) OR (id_sender = $_SESSION[id_friend] AND id_receiver = $id_profil) ORDER BY time DESC LIMIT 10) sub ORDER BY time ASC";
    $result = $conn->query($sql);

    // Display the messages
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sender_id = $row["id_sender"];
            $message = $row["text"];
            $sender_sql = "SELECT pseudo FROM profil WHERE id = '$sender_id'";
            $sender_result = $conn->query($sender_sql);
            $sender_row = $sender_result->fetch_assoc();
            $sender = $sender_row["pseudo"];

            if ($sender_id == $id_profil) {
                echo "<div class='message message-right'>";
                echo "<div class='message-text'><p>$message</p></div>";

                if ($row["image"] != NULL) {
                    $row["image"] = str_replace("../", "", $row["image"]);

                    echo "<div class='message-image'><img src='$row[image]' alt='Image'></div>";
                }
                // echo "<div class='message-time'>$row[time]</div>";
                echo "</div>";
            } else {
                echo "<div class='message message-left'>";
                echo "<div class='message-text'><p>$message</p></div>";
                
                if ($row["image"] != NULL) {
                    $row["image"] = str_replace("../", "", $row["image"]);

                    echo "<div class='message-image'><img src='$row[image]' alt='Image'></div>";
                }
                // echo "<div class='message-time'>$row[time]</div>";
                echo "</div>";
            }
            
        }
    } else {
        echo "No messages.";
    }
}
?>