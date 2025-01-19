<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>儲值系統</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #333;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #555;
        }
        .transaction-list {
            margin-top: 20px;
        }
        .transaction-list h3 {
            margin-bottom: 10px;
        }
        .transaction-item {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h1>儲值系統</h1>
    </header>
    <div class="container">
        <h2>登入</h2>
        <form id="login-form">
            <div class="form-group">
                <label for="login-username">帳號</label>
                <input type="text" id="login-username" name="login-username" required>
            </div>
            <div class="form-group">
                <label for="login-password">密碼</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>
            <div class="form-group">
                <button type="submit">登入</button>
            </div>
        </form>

        <h2>活動付款</h2>
        <form id="payment-form">
            <div class="form-group">
                <label for="amount">金額</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <button type="button" onclick="generateQRCode()">生成 QR Code</button>
            </div>
        </form>
        <div id="qrcode-container" style="margin-top: 20px;"></div>

        <div class="transaction-list">
            <h3>交易紀錄</h3>
            <div id="transactions">
                <!-- 動態插入交易紀錄 -->
            </div>
        </div>
    </div>

    <script>
        function generateQRCode() {
            const amount = document.getElementById('amount').value;
            if (amount) {
                const qrCodeContainer = document.getElementById('qrcode-container');
                qrCodeContainer.innerHTML = `<p>活動金額：$${amount}</p><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Amount:${amount}' alt='QR Code'>`;

                const transactionList = document.getElementById('transactions');
                const transactionItem = document.createElement('div');
                transactionItem.className = 'transaction-item';
                transactionItem.textContent = `付款金額：$${amount} - 時間：${new Date().toLocaleString()}`;
                transactionList.appendChild(transactionItem);
            }
        }
    </script>
</body>
</html>
