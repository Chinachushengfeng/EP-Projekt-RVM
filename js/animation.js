function show() {
    var main = document.getElementsByClassName('main')[0]
    var showState = main.style.opacity
    if (showState == '') {  // 没有初始值
        main.style.opacity = 0
        setTimeout(() => {
            main.style.opacity = 1
        }, 1);
    } else {
        if (main.style.opacity == 1) {
            main.style.opacity = 0
        }
        setTimeout(() => {
            main.style.opacity = 1
        }, 1);

    }
}
document.addEventListener('DOMContentLoaded', function () {
    show()
})