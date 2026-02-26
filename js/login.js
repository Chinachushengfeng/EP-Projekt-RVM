function back() {
    window.history.go(-1);
}

function continueNext() {
    sessionStorage.url = "user.html";
    window.location.href = "user.html";

}