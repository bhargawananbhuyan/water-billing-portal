<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function bills_view(Request $request)
    {
        $bills = Bill::where('consumer_id', $request->user()->id)->get();
        return view('consumer.bills', compact('bills'));
    }

    public function update_bill(int $id)
    {
        Bill::whereId($id)->update(['status' => 'paid']);

        return redirect()->back()->with('success', 'Bill paid successfully.');
    }
}
