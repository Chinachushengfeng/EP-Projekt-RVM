// 修改id
function changeId(val) {
    let id = document.getElementById('id')
    id.innerHTML = val
}

// 修改瓶子 
function changeBottle(val) {
    let bottleNumber = document.getElementById('bottle_text_Number')
    bottleNumber.innerHTML = val
}

// 修改易拉罐
function changeCan(val) {
    let canNumber = document.getElementById('can_text_Number')
    canNumber.innerHTML = val
}

// 判断回收
function judgment(val) {
    let img = document.getElementById('tips')

    if (img.className) {
        img.className = ''
        img.style.display = "none"
        let repetitiveExecution = setTimeout(() => {
            img.className = "animation"
            img.style.display = "block"
            clearTimeout(repetitiveExecution)
        });
    } else {
        img.className = "animation"
        img.style.display = "block"
    }

    // img.style.animation = "gif 1s 1"
    // // 动画清除
    img.addEventListener("animationend", function () {
        img.style.animation = ''
        img.style.display = "none"
    });
    switch (val) {
        case 1:
            a = 1
            img.src = '../img/tips/success.png'; //回收成功
            i = 119
            break;
        case 2:
            a = 2
            img.src = '../img/tips/barcodeNotRead.png'; //条码未能读取
            break;
        case 3:
            a = 3
            img.src = '../img/tips/barcodeInexist.png'; //条码不在资料库中
            break;
        case 4:
            a = 4
            img.src = '../img/tips/weight.png'; //胶樽重量不符
            break;
        case 5:
            a = 5
            img.src = '../img/tips/shape.png'; //条码与胶樽形状不符
            break;
        case 6:
            a = 6
            img.src = '../img/tips/hand.png'; //回收时请勿触碰胶樽
            break;
        default:
            break;
    }
}


// 结束
function finish() {
    sessionStorage.url = "end.html";
    window.location.href = "end.html";
}


// 测试
let a = 0
function recycle() {
    changeBottle(1)
    changeCan(4)

    changeId(40523105)
    if (a === 6) {
        a = 1
    } else {
        a++
    }
    judgment(a)
}
