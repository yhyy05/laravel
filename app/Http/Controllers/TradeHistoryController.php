<?php
// app/Http/Controllers/TradeHistoryController.php
namespace App\Http\Controllers;

use App\Models\TradeHistory;
use App\Models\User;
use Illuminate\Http\Request;

class TradeHistoryController extends Controller
{
    public function create()
    {
        return view('trade_histories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'transaction_type' => 'required|string',
            'status' => 'required|string',
        ]);

        TradeHistory::create($request->only('user_id', 'amount', 'transaction_type', 'status'));

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
