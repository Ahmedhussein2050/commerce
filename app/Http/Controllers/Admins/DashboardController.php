<?php

namespace App\Http\Controllers\Admins;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function show(User $user){
        $products = $user->products()->with(['user', 'categories'])->paginate(6);
        return view('Admins.dashboard', [
            'user' => $user,
            'products' => $products
        ]);
    }

}
