<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function create()
    {
        return Customer::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'display_currency' => 'required|size:3',
            'mobile_phone' => 'required|size:11',
        ]);

        Customer::create($request->only([
            'first_name',
            'last_name',
            'email',
            'display_currency',
            'mobile_phone',
        ]));

        return redirect()->route('customers.index');
    }
}
