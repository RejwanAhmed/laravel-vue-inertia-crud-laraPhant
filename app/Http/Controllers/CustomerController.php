<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return inertia::render('index', ['customers' => $customers]);
    }
    public function create()
    {
        return inertia::render('create');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:11|min:11',
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('message', 'Customer Created Successfully');
    }
    public function edit(Customer $customer)
    {
        return inertia::render('edit', ['customer' => $customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('message', 'Customer Deleted Successfully');
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:11|min:11',
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('message', 'Customer Updated Successfully');
    }

}
