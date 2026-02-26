function start() {
 
}

// 前后门故障
function doorError() {
    sessionStorage.url = "doorError.html";
    window.location.href = "doorError.html";
}

// 维护
function repair() {
    sessionStorage.url = "repair.html";
    window.location.href = "repair.html";
}

// 断网
function outService() {
    sessionStorage.url = "outService.html";
    window.location.href = "outService.html";
}

// 溢满
function full() {
    sessionStorage.url = "full.html";
    window.location.href = "full.html";
}


// 打印纸
function noPaper(val) {
    let print = document.getElementById('print')
    if (val) { // 有打印纸
        print.style.display = "none"
    } else {
        print.style.display = "block"
    }

}