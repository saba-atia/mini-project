<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate(5);
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:15', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('admin_images', 'public');
            $data['image'] = $imagePath;
        }

        Admin::create($data);

        return redirect()->route('admins.index')->with('success', 'Admin created successfully!');
    }

    public function show(Admin $admin)
    {
        return view('admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('admin_images', 'public');
            $data['image'] = $imagePath;
        }

        $admin->update($data);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully!');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully!');
    }

    public function dashboard()
    {
        $adminCount = Admin::count();
        $userCount = User::count();

        return view('dashborde.layouts.dashbord', compact('adminCount', 'userCount'));
    }

    public function profile()
    {
        $admin = Admin::first();
        return view('admins.profile', compact('admin'));
    }
}