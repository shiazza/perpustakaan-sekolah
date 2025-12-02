<?php

namespace App\Http\Controllers\web\Master\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roleData')->paginate(10);
        return view('master.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('master.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Handle multiple users creation
        if ($request->has('users') && is_array($request->users)) {
            $request->validate([
                'users.*.name' => 'required|string|max:255',
                'users.*.email' => 'required|email|unique:users,email',
                'users.*.password' => 'required|string',
                'users.*.id_role' => 'required|exists:roles,id_role',
                'users.*.NISN' => 'nullable|numeric',
                'users.*.number' => 'nullable|string|max:255',
                'users.*.address' => 'nullable|string',
                'users.*.NIK' => 'nullable|numeric',
                'users.*.gender' => 'nullable|in:male,female',
                'users.*.photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            foreach ($request->users as $userData) {
                $data = [
                    'id' => Str::uuid(),
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                    'id_role' => $userData['id_role'],
                    'NISN' => $userData['NISN'] ?? null,
                    'number' => $userData['number'] ?? null,
                    'address' => $userData['address'] ?? null,
                    'NIK' => $userData['NIK'] ?? null,
                    'gender' => $userData['gender'] ?? null,
                ];

                if (isset($userData['photo']) && $userData['photo']) {
                    $data['photo'] = $userData['photo']->store('user_photos', 'public');
                }

                User::create($data);
            }

            return redirect()->route('user.index')->with('success', 'Users created successfully.');
        } else {
            // Single user creation
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'id_role' => 'required|exists:roles,id_role',
                'NISN' => 'nullable|numeric',
                'number' => 'nullable|string|max:255',
                'address' => 'nullable|string',
                'NIK' => 'nullable|numeric',
                'gender' => 'nullable|in:male,female',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->all();
            $data['id'] = Str::uuid();
            $data['password'] = Hash::make($data['password']);
            $data['id_role'] = $data['id_role']; // Ensure it's using id_role

            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('user_photos', 'public');
            }

            User::create($data);

            return redirect()->route('user.index')->with('success', 'User created successfully.');
        }
    }

    public function show(User $user)
    {
        $user->load('roleData');
        return view('master.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('master.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'password' => 'nullable|string',
            'id_role' => 'required|exists:roles,id_role',
            'NISN' => 'nullable|numeric',
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'NIK' => 'nullable|numeric',
            'gender' => 'nullable|in:male,female',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('user_photos', 'public');
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
