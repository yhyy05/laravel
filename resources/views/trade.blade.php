<!-- resources/views/trade_histories/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交易紀錄</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>新增交易紀錄</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('trade_histories.store') }}">
        @csrf

        <label for="user">交易者</label>
        <input type="text" id="userSearch" placeholder="搜尋交易者 (ID 或名稱)">
        <ul id="userResults"></ul>
        <input type="hidden" name="user_id" id="user_id">
        <p id="selectedUser"></p>

        <label for="amount">金額</label>
        <input type="number" name="amount" step="0.01" required>

        <label for="transaction_type">交易類型</label>
        <select name="transaction_type" required>
            <option value="deposit">存款</option>
            <option value="withdrawal">提款</option>
        </select>

        <label for="status">狀態</label>
        <select name="status" required>
            <option value="pending">待處理</option>
            <option value="completed">完成</option>
            <option value="failed">失敗</option>
        </select>

        <button type="submit">送出</button>
    </form>

    <script>
        function debounce(func, delay) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        $('#userSearch').on('input', debounce(function () {
            const query = $(this).val();
            if (!query) return;

            $.get('/trade-histories/search-user', { query }, function (data) {
                const results = data.map(user => `<li data-id="${user.id}" data-name="${user.name}">${user.id} - ${user.name}</li>`);
                $('#userResults').html(results.join(''));
            });
        }, 300));

        $(document).on('click', '#userResults li', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('#user_id').val(id);
            $('#selectedUser').text(`已選擇：${id} - ${name}`);
            $('#userResults').html('');
        });
    </script>
</body>
</html>
