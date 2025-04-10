<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed'
        ]);

        $user->name = $validated['name'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        Toastr::success('Profile updated successfully!');
        return redirect()->route('admin.profile.edit');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
        ]);
        $user = User::query()->where('name', '=', $request->name)->first();
        $user->delete();
        return $this->sendResponse(1, 'Your User Deleted successfully.');
    }
}
