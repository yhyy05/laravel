<?php
// app/Http/Controllers/TradeHistoryController.php
namespace App\Http\Controllers;

use App\Models\TradeHistory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EventModel;  // 引用新的模型名稱

class TradeHistoryController extends Controller
{
    public function create()
    {
        // 測試是否正確獲取 Event 資料
        $events = Event::all();

        // 確認 events 資料
        dd($events);

        // 傳遞資料至視圖
        return view('trade', compact('events'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'transaction_type' => 'required|string',
            'status' => 'required|string',
            'events_id' => 'nullable|exists:events,id',
        ]);

        TradeHistory::create($request->only('user_id', 'amount', 'transaction_type', 'status', 'events_id'));

        return redirect()->back()->with('success', '交易紀錄已新增');
    }


    public function searchUser(Request $request)
    {
        $query = $request->get('query');
        return User::where('id', $query)
            ->orWhere('name', 'like', "%{$query}%")
            ->get();
    }
}
