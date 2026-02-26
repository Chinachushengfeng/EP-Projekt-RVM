<!doctype html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>回收箱交互页面</title>
    <style>
        :root {
            --accent: #4C7D3C;
            --dark-bg: rgba(0,0,0,0.5);
            --radius: 16px;
        }
        * {
            box-sizing: border-box;
        }
        body {
			
			 
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f8f4;
            color: #0f172a;
            display: flex;
            margin-top:400px;
            flex-direction: column;
            height: 50vh;
			 
 
 
        }
        .wrap {
            display: flex;
            flex: 1;
        }
		
		   .top  {
			   margin-top:-422px;
			   height:350px;
			   absolute:position;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 300;
            cursor: pointer;
            transition: all .3s;
            color: white;
            border: none;
			 background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
			
			
        }
		
		
		
        .btn-box {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .3s;
            color: white;
            border: none;
        }
		
		
        .left {
            flex: 0 0 60%;
            background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
        }
        .right {
            flex: 0 0 40%;
            background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
        }
        .btn-box:hover {
            filter: brightness(1.1);
        }
        /* 弹窗 */
        .overlay {
            position: fixed;
            inset: 0;
            background: var(--dark-bg);
            display: none;
            align-items: center;
            justify-content: center;
        }
        .overlay.active {
            display: flex;
        }
        .input-modal {
            background: white;
            border-radius: var(--radius);
            padding: 40px;
            min-width: 720px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            text-align: center;
        }
        .input-modal h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.4rem;
        }
        .input-modal input {
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1.2rem;
			
        }
        .close-btn {
            margin-top: 20px;
            padding: 40px 28px;
            border-radius: 8px;
            background: var(--accent);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 30px;
			
        }
        /* 底部显示条 */
        .bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #ffffff;
            border-top: 1px solid #d1d5db;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 200px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }
        .bottom-text {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #374151;
            font-size: 2rem;
        }
        .bottom-actions button {
            margin-left: 10px;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 2rem;
        }
        .reset-btn {
            background: #e5e7eb;
            color: #111827;
			
			
        }
        .confirm-btn {
            background: var(--accent);
            color: white;
			
        }
		
	.back-button {
    position: absolute;
    left: 40.2%;
    top: 80%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
    color: white;
    border: none;
    padding: 32px 24px;
    border-radius: 50px;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.back-button:hover {
    background: linear-gradient(135deg, rgba(46, 204, 113, 0.9), rgba(39, 174, 96, 0.9));
    box-shadow: 0 6px 20px rgba(46, 204, 113, 0.5);
    transform: translateY(-50%) scale(1.05);
}
        .back-button:active {
            transform: translateY(-50%) scale(0.98);
        }
        
        .back-button i {
            font-size:48px;
        }
		
		
		
    </style>
</head>
<body>
<?php 

include("IncDB.php");
  

$sql = "update command set userscan=0";
 mysqli_query($link, $sql);
 


?>



 

<img src='img/logo.png' width='210px' style='position:absolute;top:20px'>
   <div class="wrap">
        <div class="top"   >Tryb wymiany worka w urządzenia</div>
         
    </div>
	
	


    <div style='margin-top:300px; left: 20%;top:15%; position:absolute;font-size:30px;color:black;font-family:bold'>Wybierz kosz w którym chcesz wymienić worek:</div>
    <div class="wrap">
        <div class="btn-box left" id="leftBtn" style='text-align:center'  >LEWY KOSZ <br>(Butelki PET)</div>
        <div class="btn-box right" id="rightBtn" style='text-align:center'>PRAWY KOSZ <br>(Puszki)</div>
    </div>
    <div class="overlay" id="overlay">
        <div class="input-modal" id="modal">
            <h2 id="modalTitle" style='font-size:40px'>Wprowadź treść</h2>
            <input type="text" id="inputField" placeholder="Zeskanowana plomba:">
            <button class="close-btn" id="closeBtn">zamknięcie</button>
        </div>
    </div>
<form id="bottomForm" action="submit.php" method="get">
    <!-- ✅ 隐藏字段，用来同步 bottomText 的内容 -->
    <input type="hidden" id="bottomTextValue" name="bin_barcode" value="">
    <div class="bottom-bar">
        <div class="bottom-text" id="bottomText">Proszę zeskanować kod QR</div>
        <div class="bottom-actions">
            <button type="reset" class="reset-btn" id="resetBtn">Nastawić</button>
            <button type="submit" class="confirm-btn">Zaakceptuj number plomby</button>
        </div>
    </div>
</form>
   <button class="back-button"  style=' ' onclick="window.location.href='http://127.0.0.1/tjt/debug/'">
                ← Powrót do ekranu serwisowego
            </button>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script>
	const bottomForm = document.getElementById('bottomForm');
const bottomTextValue = document.getElementById('bottomTextValue');

bottomForm.addEventListener('submit', function() {
    bottomTextValue.value = bottomText.textContent.trim();
});

const overlay = document.getElementById('overlay');
const modalTitle = document.getElementById('modalTitle');
const inputField = document.getElementById('inputField');
const leftBtn = document.getElementById('leftBtn');
const rightBtn = document.getElementById('rightBtn');
const closeBtn = document.getElementById('closeBtn');
const bottomText = document.getElementById('bottomText');
const resetBtn = document.getElementById('resetBtn');
let currentBin = '';
let pollingInterval = null;

// ✅ 打开 modal，并启动轮询
function openModal(bin) {
    currentBin = bin;
    modalTitle.textContent = bin === 'left' ? 'Lewy kosz na śmieci' : 'Kosz do recyklingu po lewej stronie';
    inputField.value = '';
    overlay.classList.add('active');
    startPolling(); // ← 打开对话框时开始轮询
}

// ✅ 关闭 modal，并停止轮询
function closeModal() {
    const val = inputField.value.trim() || inputField.placeholder;
    bottomText.textContent = `${currentBin === 'left' ? 'l' : 'r'} ${val}`;
    overlay.classList.remove('active');
    stopPolling(); // ← 关闭对话框时停止轮询
}

// ✅ 轮询 data.php
function startPolling() {
    if (pollingInterval) clearInterval(pollingInterval);

    function poll() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "data.php",
            timeout: 8000,
            data: { time: "5000" },
            success: function(data) {
                if (data.success == "1") {
                    inputField.placeholder = data.msg || data.value;
                    if (!overlay.classList.contains('active')) {
                        bottomText.textContent = `最新数据: ${data.msg}`;
                    }
                } else {
                    inputField.placeholder = "Zeskanuj plombę przykładając ją do skanera po prawej stronie.";
                }
            },
            error: function() {
                inputField.placeholder = "请求出错";
            }
        });
    }

    poll();
    pollingInterval = setInterval(poll, 3000);
}

// ✅ 停止轮询
function stopPolling() {
    if (pollingInterval) {
        clearInterval(pollingInterval);
        pollingInterval = null;
    }
}

// ✅ 事件绑定
leftBtn.addEventListener('click', () => openModal('left'));
rightBtn.addEventListener('click', () => openModal('right'));
closeBtn.addEventListener('click', closeModal);
resetBtn.addEventListener('click', (e) => {
    e.preventDefault();
    bottomText.textContent = 'Oczekiwanie na dane';
});
overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closeModal();
});
</script>


    <script>
        // 延迟 5 秒后跳转
        setTimeout(() => {
            window.location.href = "http://127.0.0.1";
        }, 120000); // 5000 毫秒 = 5 秒
    </script>
	
	
</body>
</html>