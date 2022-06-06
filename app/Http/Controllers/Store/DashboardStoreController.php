<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transactions;

class DashboardStoreController extends Controller
{

    public function index()
    {
        $customer = User::count();
        $revenue = Transactions::where('transaction_status', 'success')->sum('total_price');
        $transactions = Transactions::count();
        return view('pages.store.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transactions' => $transactions
        ]);
    }
}
