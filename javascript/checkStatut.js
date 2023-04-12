function checkForNewMessages() {
    console.log("checking for new messages");
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (this.responseText.includes('reloadFriends')) {
                // Reload the page or display a notification
                searchFriends();
            }
            if (this.responseText.includes('displayMessage')) {
                // Reload the page or display a notification
                displayMessage();
            }
        }
    };
    xhttp.open("GET", "./php/seen_unseen.php", true);
    xhttp.send();
  }
  
  // Call the checkForNewMessages function every 2 seconds
  setInterval(checkForNewMessages, 20000);