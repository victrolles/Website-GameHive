(function() {
  
    function searchGames() {
      const searchBox = document.getElementById('search-box');
      const searchQuery = searchBox.value;
      console.log("searching for games with query: " + searchQuery + "");
      // send an AJAX request to the server
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const gamesContainer = document.getElementById('games-container');
            gamesContainer.innerHTML = xhr.responseText;
          } else {
            console.error('Error searching games:', xhr.status, xhr.statusText);
          }
        }
      };
      xhr.open('GET', './php/search-games.php?query=' + encodeURIComponent(searchQuery));
      xhr.send();
    }

    function searchGamemodes() {
      const searchBox = document.getElementById('search-box2');
      const searchQuery = searchBox.value;
      console.log("searching for gamemodes with query: " + searchQuery + "");

      const params = new URLSearchParams((window.location.href).split('?')[1]);
      console.log("params: " + params + "");
      game_name = null;
      if (params.has("game_name")) {
        console.log("true");
        game_name = decodeURIComponent(params.get("game_name"));
      }
      console.log("game_name: " + game_name + "");

      // send an AJAX request to the server
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const gamesContainer = document.getElementById('gamemodes-container');
            gamesContainer.innerHTML = xhr.responseText;
          } else {
            console.error('Error searching gamemodes:', xhr.status, xhr.statusText);
          }
        }
      };
      xhr.open('GET', './php/search-gamemodes.php?query=' + encodeURIComponent(searchQuery) + '&game_name=' + encodeURIComponent(game_name));
      xhr.send();
    }

    function ClassementResult() {

      const params = new URLSearchParams((window.location.href).split('?')[1]);
      const game_name = decodeURIComponent(params.get("game_name"));
      const gamemode = decodeURIComponent(params.get("gamemode"));
      const selectBox = document.getElementById('classement-select');
      const selectValue = selectBox.value;
      

      console.log("game_name: " + game_name + "");
      console.log("gamemode: " + gamemode + "");
      console.log("selectValue: " + selectValue + "");

      // send an AJAX request to the server
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const classementContainer = document.getElementById('result-container');
            classementContainer.innerHTML = xhr.responseText;
          } else {
            console.error('Error searching gamemodes:', xhr.status, xhr.statusText);
          }
        }
      };
      xhr.open('GET', './php/classement_result.php?game_name=' + encodeURIComponent(game_name) + '&gamemode=' + encodeURIComponent(gamemode) + '&classement_select=' + encodeURIComponent(selectValue));
      xhr.send();
    }
  
    window.searchGames = searchGames;
    window.searchGamemodes = searchGamemodes;
    window.ClassementResult = ClassementResult;
  
  })();
    