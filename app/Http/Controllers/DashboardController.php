<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        
        $users = User::where('role', 'user');

        $userCount = $users->count();

        $products = Product::all();
        $productCount = $products->count();


        $user = User::where('status', 'active')->where('role', 'user');
      $activeuserCount = $user->count();
       

    
        return view('dashboard',compact('userCount','productCount', 'activeuserCount'));

        
    }

   
        }

   

