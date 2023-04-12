(function() {
  
    function searchProfiles() {
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
      xhr.open('GET', './php/search-profiles.php?query=' + encodeURIComponent(searchQuery));
      xhr.send();
    }
  
    window.onload = function() {
      searchProfiles();
    }
  
    window.searchProfiles = searchProfiles;
  
  })();
    