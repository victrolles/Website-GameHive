<?php
// Include the database connection fil
session_start();
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
        echo "<p>$sender: $message</p>";
        if ($row["image"] != NULL) {
            echo "<img src='$row[image]' alt='Image' style='width:100px;height:100px;'>";
        }
    }
} else {
    echo "No messages.";
}
?>