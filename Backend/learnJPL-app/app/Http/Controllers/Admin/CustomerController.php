<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerController extends Controller
{
    public function getAllCustomer()
    {
        $customer = User::where('role_id',2)->paginate(10);
        return view('admin.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.courses.add');
    // }
}
