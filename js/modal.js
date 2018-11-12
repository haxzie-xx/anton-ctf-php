
var Modal = {

    init: function(modal_id, trigger_id, close_id) {
        let trigger = document.getElementById(trigger_id);
        let modal = document.getElementById(modal_id);
        let btnClose = document.getElementById(close_id);

        if (typeof trigger === undefined || typeof modal === undefined) {
            console.error("Unable link the elements");
            return;
        }
        //Set click listener for trigger
        trigger.onclick = function() {
            modal.style.display = "flex";
        }

        btnClose.onclick = function() {
            modal.style.display = "none";
        }

    }
}

var ChallengeModal = {

    init: function(modal_id, card_class, close_id) {
        let triggers = document.getElementsByClassName(card_class);
        const modal = document.getElementById(modal_id);
        let btnClose = document.getElementById(close_id);

        for (let i = 0; i < triggers.length; i++) {
            triggers[i].onclick = function() {
                modal.style.display = "flex";
                let challenge_id = triggers[i].dataset.id;
                loadData(modal_id, challenge_id);
            }
        }

        btnClose.onclick = function() {
            console.log("Closing Modal");
            modal.style.display = "none";
        }
    }
}

function postData(url = ``, data = {}) {
    // Default options are marked with *
      return fetch(url, {
          method: "POST", // *GET, POST, PUT, DELETE, etc.
          mode: "cors", // no-cors, cors, *same-origin
          cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
          credentials: "same-origin", // include, *same-origin, omit
          headers: {
              "Content-Type": "application/json; charset=utf-8",
              // "Content-Type": "application/x-www-form-urlencoded",
          },
          redirect: "follow", // manual, *follow, error
          referrer: "no-referrer", // no-referrer, *client
          body: JSON.stringify(data), // body data type must match "Content-Type" header
      })
      .then(response => response.json()); // parses response to JSON
}

function loadData (modal_id, challenge_id) {
    //TODO Create network request to fetch challenge details
    console.log("Opening "+modal_id+" for #"+challenge_id);
    let challenge_title = document.getElementById("challenge-id");
    challenge_title.innerHTML = "Challenge #"+challenge_id;

    let challenge_name = document.getElementById("challenge-name");
    let challenge_desc = document.getElementById("challenge-desc");
    let challenge_flag = document.getElementById("text-flag");

    challenge_name.innerHTML = "";
    challenge_desc.innerHTML = "";
    challenge_flag.value = "";


    fetch("get_challenge.php?cid="+challenge_id)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        console.log(JSON.stringify(myJson));

        challenge_name.innerHTML = myJson.title;
        challenge_desc.innerHTML = myJson.description;
    });
}