function connectToFriend(id_friend) {
  
  // Send an AJAX request to execute the ConnectFriend function with the given id_friend
  console.log("connecting to friend with id: " + id_friend);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "php/connectionWithFriend.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id_friend=" + id_friend);
}

(function() {

  function searchFriends() {
    const searchBox = document.getElementById('search-box');
    const searchQuery = searchBox.value;
    console.log("searching for friends with query: " + searchQuery + "");
    // send an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const friendsContainer = document.getElementById('friends-container');
          friendsContainer.innerHTML = xhr.responseText;
        } else {
          console.error('Error searching friends:', xhr.status, xhr.statusText);
        }
      }
    };
    xhr.open('GET', './php/search-friends.php?query=' + encodeURIComponent(searchQuery));
    xhr.send();
  }

  function displayMessage() {
    console.log("displaying message");

    // Send an AJAX request to display_message.php
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the chat messages container with the response
          const messagesContainer = document.getElementById('message-list');
          messagesContainer.innerHTML = xhr.responseText;
        } else {
          console.error('Error:', xhr.status, xhr.statusText);
        }
      }
    };
    xhr.open('POST', './php/display_messages.php');
    xhr.send();
    return false;
  }

  function sendMessage() {
    
    console.log("sending message");
    // Get the form data using the FormData constructor
    const formData = new FormData(document.getElementById('message-form'));
    const messageInput = document.getElementById('msg');
    const fileInput = document.getElementById('img');

    // Send an AJAX request to display_message.php
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the chat messages container with the response
          const messagesContainer = document.getElementById('message-error');
          messagesContainer.innerHTML = xhr.responseText;
          messageInput.value = '';
          fileInput.value = '';
          displayMessage();
        } else {
          console.error('Error:', xhr.status, xhr.statusText);
        }
      }
    };
    xhr.open('POST', './php/send_message.php');
    xhr.send(formData);
    return false;
  }

  window.onload = function() {
    searchFriends();
    displayMessage();
  }

  window.searchFriends = searchFriends;
  window.displayMessage = displayMessage;
  window.sendMessage = sendMessage;

  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('message-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      sendMessage(event);
    });
  });
})();
  