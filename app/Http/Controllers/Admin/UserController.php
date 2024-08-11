<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create():View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(string $id): View
    {

        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User not found');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update (UpdateUserRequest $request, string $id): RedirectResponse
    {
        if(!$user = User::find($id)) {
            return back()->with('message', 'User not found');
        }

        $data = $request->only(['name', 'email']);

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function show(string $id): View
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User not found');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(Request $resquest, string $id): RedirectResponse
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User not found');
        }

        if(Auth::user()->id === $user->id)  {
            return redirect()->route('users.index')->with('message', 'You cannot delete your own account');
        }

        $user->destroy($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
