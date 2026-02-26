function back() {
    window.history.go(-1);
}

function start() {
    sessionStorage.url = "recycle.html";
    window.location.href = "recycle.html";
}

// 修改id
function changeId(val) {
    let id = document.getElementById('userid')
    id.innerHTML = val
}
// 修改name
function changeName(val) {
    let name = document.getElementById('name')
    name.innerHTML = val
}
// 修改号码
function mobile(val) {
    let mobile = document.getElementById('mobile')
    mobile.innerHTML = val
}
// 修改point
function point(val) {
    let point = document.getElementById('point')
    point.innerHTML = val
}

// 修改日期
function lastUse(val) {
    let lastUse = document.getElementById('lastUse')
    lastUse.innerHTML = val
}