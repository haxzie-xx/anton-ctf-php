class Toast {

    constructor() {
        this.toast = null;
        this.messageView = null;
    }

    init(toastView) {
        this.messageView = document.querySelector(`#${toastView.id} #message`);        
        this.toast = toastView;
        this.messageView.innerHTML = "Hello World";
    }

    showSuccess(message, callback) {
        this.toast.classList.add("t-success");
        this.messageView.innerHTML = message;
        setTimeout(() => {
            this.toast.classList.remove("t-success");
            console.log("timeout");
            if (callback !== null) {
                callback();
            }
        }, 2000);
    }

    showError(message, callback) {
        this.toast.classList.add("t-error");
        this.messageView.innerHTML = message;
        setTimeout(() => {
            this.toast.classList.remove("t-error");
            console.log("timeout");
            if ( callback !== null) {
                callback();
            }
        }, 2000);
    }
}