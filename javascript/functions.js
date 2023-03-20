function displayMessages() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("message-list").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "php/display_messages.php", true);
    xhttp.send();
  }
  
function connectToFriend(id_friend) {
  console.log("Hello, world!");
  // Send an AJAX request to execute the ConnectFriend function with the given id_friend
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "php/connectionWithFriend.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id_friend=" + id_friend);
}
  