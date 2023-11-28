<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    public function consumers_view()
    {
        $consumers = User::where('role', 'consumer')->get();
        return view('provider.consumers', compact('consumers'));
    }

    public function single_consumer_view(int $id)
    {
        $consumer = User::whereId($id)->first();
        $bills = Bill::where('consumer_id', $id)->get();
        return view('provider.single-consumer', compact('consumer', 'bills'));
    }

    public function add_bill_view(int $id)
    {
        return view('provider.add-bill');
    }

    public function add_bill(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|gte:1'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        Bill::create([
            'provider_id' => $request->user()->id,
            'consumer_id' => $id,
            'amount' => $request->amount
        ]);

        return redirect()->route('provider.single_consumer_view', ['id' => $id])
            ->with('success', 'Bill added successfully.');
    }
}
