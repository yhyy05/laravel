<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交易紀錄</title>
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
        <h1>交易紀錄</h1>
    </header>
    <div class="container">
        <h3>交易列表</h3>
        <div id="transactions">
            <!-- 動態插入交易紀錄 --> 
        </div>
    </div>

    <script>
        const transactionList = JSON.parse(localStorage.getItem('transactions')) || [];
        const transactionsDiv = document.getElementById('transactions');
        if (transactionList.length === 0) {
            transactionsDiv.innerHTML = '<p>尚無交易紀錄。</p>';
        } else {
            transactionList.forEach(transaction => {
                const item = document.createElement('div');
                item.className = 'transaction-item';
                item.innerHTML = `
                    <p>活動名稱：${transaction.activity}</p>
                    <p>金額：$${transaction.amount}</p>
                    <p>時間：${transaction.time}</p>
                `;
                transactionsDiv.appendChild(item);
            });
        }
    </script>
</body>
</html>
