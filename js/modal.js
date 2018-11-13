
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

class ChallengeModal {

    constructor(modal_id, card_class, close_id, solve_id) {
        this.triggers = document.getElementsByClassName(card_class);
        this.modal = document.getElementById(modal_id);
        this.btnClose = document.getElementById(close_id);
        this.btnSolve = document.getElementById(solve_id);
        this.solveForm = document.getElementById("solve-form");
        this.textFlag = document.getElementById("text-flag");

        for (let i = 0; i < this.triggers.length; i++) {
            this.triggers[i].onclick = () => {
                this.modal.style.display = "flex";
                this.solveForm.setAttribute("data-cid", this.triggers[i].getAttribute("data-id"));
                console.log("Challenge Id: "+this.solveForm.dataset.cid);
                let challenge_id = this.triggers[i].dataset.id;
                loadData(modal_id, challenge_id);

            }
        }
    }

    init(userid){
    
        this.userid = userid;
        console.log("UserID : "+userid);

        this.solveForm.addEventListener("submit", (e) => {
            if (e.preventDefault) e.preventDefault();
            
            let flag = this.textFlag.value;
            let params = {
                flag: flag,
                cid: this.solveForm.dataset.cid,
                userid: this.userid
            };
            console.log("Params: "+JSON.stringify(params));

            axios.post('solve_challenge.php', params).then((response) => {
                //code here 
                console.log(JSON.stringify(response));
                if (response.status === 200) {
                    this.textFlag.style.color = "green";
                    myToast.showSuccess(response.message, function() { location.reload(); });
                } else {
                    this.textFlag.style.color = "red";
                    myToast.showError(response.message, null);
                }
                
            });
            // You must return false to prevent the default form behavior
            return false;
        });

        this.btnClose.onclick = () => {
            console.log("Closing Modal");
            this.modal.style.display = "none";
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
