<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerSearchController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::query()

            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('kana', 'like', "%{$request->search}%")
                    ->orWhere('tel', 'like', "%{$request->search}%");
            })
            ->select('id','name','kana','tel')
            ->orderBy('kana')
            ->limit(50)
            ->get();

        return response()->json($customers);
    }
}