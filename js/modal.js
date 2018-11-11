
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