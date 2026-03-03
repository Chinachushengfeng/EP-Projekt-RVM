<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapisy kodów kreskowych kuponów</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        header {
            background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 20%),
                radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 20%);
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
        }
        
        .logo-icon {
            font-size: 3.5rem;
            margin-right: 20px;
            color: #FFD700;
            filter: drop-shadow(0 0 5px rgba(255, 215, 0, 0.5));
            animation: pulse 2s infinite alternate;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        
        .header-text {
            text-align: left;
        }
        
        h1 {
            font-size: 2.8rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }
        
        .subtitle {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-top: 10px;
            font-weight: 300;
            letter-spacing: 0.5px;
        }
        
        .content {
            padding: 40px;
        }
        
        .info-box {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border-left: 6px solid #1a2980;
            position: relative;
            overflow: hidden;
        }
        
        .info-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #1a2980, #26d0ce);
        }
        
        .info-box h3 {
            color: #1a2980;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 1.5rem;
        }
        
        .info-box h3 i {
            margin-right: 15px;
            color: #26d0ce;
            font-size: 1.8rem;
        }
        
        .info-box p {
            color: #495057;
            font-size: 1.1rem;
            line-height: 1.7;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .stats {
            display: flex;
            gap: 20px;
        }
        
        .stat-box {
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            text-align: center;
            min-width: 150px;
            box-shadow: 0 5px 15px rgba(26, 41, 128, 0.3);
        }
        
        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        .refresh-btn {
            background: linear-gradient(135deg, #FF416C, #FF4B2B);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.3);
        }
        
        .refresh-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 65, 108, 0.4);
        }
        
        .refresh-btn i {
            margin-right: 10px;
            font-size: 1.3rem;
        }
        
        .barcodes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 30px;
            margin-top: 20px;
        }
        
        .barcode-card {
            background: linear-gradient(to bottom, white, #f8f9fa);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .barcode-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(to right, #1a2980, #26d0ce);
        }
        
        .barcode-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .barcode-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px dashed #e9ecef;
        }
        
        .barcode-number {
            font-family: 'Courier New', monospace;
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a2980;
            letter-spacing: 1.5px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .barcode-id {
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            color: white;
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(26, 41, 128, 0.2);
        }
        
        .barcode-image-container {
            text-align: center;
            padding: 25px 15px;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            border-radius: 12px;
            margin: 20px 0;
            min-height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
        }
        
        .barcode-image {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.1));
        }
        
        .barcode-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 1rem;
        }
        
        .barcode-type {
            color: #6c757d;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .barcode-type i {
            margin-right: 8px;
            color: #26d0ce;
        }
        
        .copy-btn {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 176, 155, 0.3);
        }
        
        .copy-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 176, 155, 0.4);
        }
        
        .copy-btn i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .no-data {
            text-align: center;
            padding: 70px 20px;
            color: #6c757d;
            font-size: 1.3rem;
            grid-column: 1 / -1;
        }
        
        .no-data i {
            font-size: 4rem;
            margin-bottom: 25px;
            color: #adb5bd;
            opacity: 0.7;
        }
        
        .no-data h3 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #495057;
        }
        
        footer {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%);
            color: white;
            margin-top: 40px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .footer-logo i {
            margin-right: 10px;
            font-size: 1.5rem;
            color: #FFD700;
        }
        
        .footer-info {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        @media (max-width: 992px) {
            .barcodes-container {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .barcodes-container {
                grid-template-columns: 1fr;
            }
            
            header, .content {
                padding: 25px;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .stats {
                justify-content: center;
            }
            
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
        
        @media (max-width: 480px) {
            .stat-box {
                min-width: 120px;
                padding: 12px 18px;
            }
            
            .stat-value {
                font-size: 1.8rem;
            }
            
            .barcode-card {
                padding: 20px;
            }
        }
        
        /* Animacje */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .barcode-card {
            animation: fadeIn 0.6s ease forwards;
        }
        
        /* Opóźnienie animacji dla kolejnych kart */
        .barcode-card:nth-child(1) { animation-delay: 0.1s; }
        .barcode-card:nth-child(2) { animation-delay: 0.2s; }
        .barcode-card:nth-child(3) { animation-delay: 0.3s; }
        .barcode-card:nth-child(4) { animation-delay: 0.4s; }
        .barcode-card:nth-child(5) { animation-delay: 0.5s; }
        .barcode-card:nth-child(6) { animation-delay: 0.6s; }
        .barcode-card:nth-child(7) { animation-delay: 0.7s; }
        .barcode-card:nth-child(8) { animation-delay: 0.8s; }
        .barcode-card:nth-child(9) { animation-delay: 0.9s; }
        .barcode-card:nth-child(10) { animation-delay: 1.0s; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-barcode logo-icon"></i>
                <div class="header-text">
                    <h1>Zapisy kuponów</h1>
                    <p class="subtitle">100 ostatnio wygenerowanych kodów kreskowych</p>
                </div>
            </div>
        </header>
         <a href="../index.php" class="back-link">
		   <h3 style='margin-right:800px;   display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background-color: #cdd2d8 ;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
			
			'>  <-Powrót</h1> </a>
		
        
        
        <div class="content">
            <div class="info-box">
                <h3><i class="fas fa-info-circle"></i> Informacje o systemie</h3>
                <p>
Aktualnie wyświetlanych jest 100 ostatnio wydrukowanych kodów kreskowych.
				</div>
            
            <div class="controls">
                <div class="stats">
                    <div  >
                        <div  id="barcode-count"> </div>
                      
                    </div>
                    <div  >
                       
                       
                    </div>
                </div>
                
           
            </div>
            
            <div id="barcodes-list">
                <!-- Kody kreskowe będą generowane dynamicznie -->
            </div>
        </div>
        
        <footer>
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-barcode"></i>
                    <span>RVM  Zapisy kuponów</span>
                </div>
                <div class="footer-info">
                    <p>Zapisy kuponów &copy; <?php echo date('Y'); ?> </p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Pobieranie danych z PHP - tutaj symulujemy dane z bazy danych
        // W rzeczywistości dane te będą generowane dynamicznie przez PHP
// 直接将PHP数组转换为JavaScript对象
const barcodeData = <?php
include('incdb.php');
date_default_timezone_set("PRC");

$sql = "SELECT 
    ut.print_barcode,
    ut.dateline,
    ut.transactionid,
    ut.recognitionstatus,
    ut.id,
    COUNT(*) as record_count  -- 直接使用COUNT
FROM user_transaction ut
WHERE ut.recognitionstatus = 1
GROUP BY ut.print_barcode
ORDER BY MAX(ut.id) DESC  -- 使用MAX来排序
LIMIT 100";

$result = mysqli_query($link, $sql);
$data = [];

while($it = mysqli_fetch_assoc($result)) {
    // 添加格式化后的时间
    $it['formatted_time'] = date('Y-m-d H:i:s', $it['dateline'] - 25200);
    // 添加波兰格式时间
    $it['polish_time'] = date('d.m.Y H:i:s', $it['dateline'] - 25200);
    $data[] = $it;
}

// 输出JSON
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>;
        
        
        // Gdy DOM jest załadowany, generuj kody kreskowe
        document.addEventListener('DOMContentLoaded', function() {
            const barcodesList = document.getElementById('barcodes-list');
            const barcodeCount = document.getElementById('barcode-count');
            const refreshBtn = document.getElementById('refresh-btn');
            
            // Funkcja generująca kody kreskowe
            function generateBarcodes() {
                // Jeśli nie ma danych
                if(barcodeData.length === 0) {
                    barcodesList.innerHTML = `
                        <div class="no-data">
                            <i class="fas fa-barcode"></i>
                            <h3>Brak danych kodów kreskowych</h3>
                            <p>W bazie danych nie znaleziono żadnych zweryfikowanych kodów kreskowych.</p>
                        </div>
                    `;
                    barcodeCount.textContent = '0';
                    return;
                }
                
                // Generowanie kart z kodami kreskowymi
                let barcodesHTML = '';
                
         barcodeData.forEach((item, index) => {
			 
			 
    // 确保item是对象且有print_barcode属性
    if (!item || typeof item !== 'object') {
        console.error('无效的数据项:', item);
        return;
    }
    
    const formattedBarcode = item.print_barcode ? item.print_barcode.toString().padStart(14, '0') : '';
    const cardId = index + 1;
    
    barcodesHTML += `
        <div class="barcode-card">
            <div class="barcode-header">
                <div class="barcode-number"  >${formatBarcodeDisplay(formattedBarcode)}</div>
                <div class="barcode-id">#${cardId.toString().padStart(2, '0')}</div>
            </div>
            <div class="barcode-image-container">
                <svg class="barcode-image" id="barcode-${cardId}"></svg>
            </div>
            <div class="barcode-footer">
                <div class="barcode-type">
                    <i class="fas fa-chart-bar"></i> Time: ${item.formatted_time || 'Brak daty'}
                </div>
          
            </div>
            <div class="additional-info" style="margin-top: 10px; font-size: 0.9em;">
                <div>Numer transakcji: ${item.transactionid || ''}</div> 
                <div>Pomyślnie odzyskano: ${item.record_count || 0}</div>
            </div>
        </div>`;
});
                
                barcodesList.innerHTML = barcodesHTML; 
                
                // Generowanie obrazów kodów kreskowych
        barcodeData.forEach((item, index) => {
    // 确保获取正确的条码数据
    const barcodeStr = item.print_barcode ? item.print_barcode.toString() : '';
    const formattedBarcode = barcodeStr.padStart(14, '0');
    const cardId = index + 1;
    
    // 添加调试信息
    console.log(`生成条码 ${cardId}:`, {
        原始数据: item.print_barcode,
        类型: typeof item.print_barcode,
        转换后: barcodeStr,
        格式化后: formattedBarcode
    });
    
    // 生成条码
    JsBarcode(`#barcode-${cardId}`, formattedBarcode, {
        format: "CODE128",
        width: 2.2,
        height: 90,
        displayValue: true,
        text: formattedBarcode, // 明确设置显示文本
        fontSize: 18,
        margin: 12,
        background: "transparent",
        lineColor: "#1a2980"
    });
});
            }
            
            // Wywołaj funkcję generowania kodów kreskowych
            generateBarcodes();
            
            // Obsługa przycisku odświeżania
            refreshBtn.addEventListener('click', function() {
                // Animacja przycisku
                refreshBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Odświeżanie...';
                refreshBtn.disabled = true;
                
                // Symulacja odświeżania danych
                setTimeout(() => {
                    generateBarcodes();
                    refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Odśwież dane';
                    refreshBtn.disabled = false;
                    
                    // Pokazanie powiadomienia
                    showNotification('Dane zostały odświeżone pomyślnie!');
                }, 800);
            });
        });
        
        // Formatowanie wyświetlania kodu kreskowego (co 4 cyfry spacja)
        function formatBarcodeDisplay(barcode) {
            return barcode.replace(/(\d{4})(?=\d)/g, '$1 ');
        }
        
        // Kopiowanie kodu kreskowego do schowka
        function copyBarcode(barcode) {
            navigator.clipboard.writeText(barcode).then(() => {
                // Pokaż potwierdzenie kopiowania
                const button = event.target.closest('.copy-btn');
                const originalText = button.innerHTML;
                
                button.innerHTML = '<i class="fas fa-check"></i> Skopiowano!';
                button.style.background = 'linear-gradient(135deg, #2ecc71, #27ae60)';
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = 'linear-gradient(135deg, #00b09b, #96c93d)';
                }, 2000);
                
                // Pokazanie powiadomienia
                showNotification('Kod kreskowy został skopiowany do schowka: ' + barcode);
            }).catch(err => {
                console.error('Błąd kopiowania: ', err);
                showNotification('Błąd kopiowania, skopiuj ręcznie: ' + barcode, 'error');
            });
        }
        
        // Funkcja do wyświetlania powiadomień
        function showNotification(message, type = 'success') {
            // Utwórz element powiadomienia
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'error' ? 'linear-gradient(135deg, #FF416C, #FF4B2B)' : 'linear-gradient(135deg, #00b09b, #96c93d)'};
                color: white;
                padding: 15px 25px;
                border-radius: 10px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                font-weight: 600;
                animation: slideIn 0.3s ease, fadeOut 0.3s ease 2.7s forwards;
                max-width: 400px;
            `;
            notification.textContent = message;
            
            // Dodaj style animacji
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes fadeOut {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }
            `;
            document.head.appendChild(style);
            
            document.body.appendChild(notification);
            
            // Usuń powiadomienie po 3 sekundach
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
                if (style.parentNode) {
                    style.parentNode.removeChild(style);
                }
            }, 3000);
        }
    </script>
</body>
</html>