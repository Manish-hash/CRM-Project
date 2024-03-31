<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user',
            'status' => 'required|string|in:active,inactive',
        ]);

        // Create a new user record
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->status = $validatedData['status'];
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User created successfully!');
    }
    public function index()
    {
        $users = User::where('role', 'user')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Fetch the company from the database based on the provided ID
        $user = User::findOrFail($id);
    
        // Pass the company data to the view
        return view('users.show', compact('user'));
    }
    public function edit($id)
    {
        // Fetch the company from the database based on the provided ID
        $user = User::findOrFail($id);
    
        // Pass the company data to the view
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            // 'role' => 'required|string|in:admin,user',
            'status' => 'required|string|in:active,inactive',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // $user->role = $validatedData['role'];
        $user->status = $validatedData['status'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->status = 'inactive'; // Update status to 'inactive'
        $user->save();
        return redirect()->route('users.index')->with('success', 'User status changed to inactive');
    }

    public function totaluser()
    {
        $users = User::where('status', 'active')->where('role', 'user')->paginate(10);
      
        return view('users.totaluser', compact('users'));
    }
}
