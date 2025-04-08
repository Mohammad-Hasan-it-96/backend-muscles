<?php

namespace App\Http\Controllers\API;


use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
           'name'   =>  'string|required',
           'email'  =>  'email|required',
        ]);
        return $this->sendResponse(1, 'Profile Updated successfully.');
    }
    public function destroy(Request $request)
    {
        $request->validate([
           'name'   =>  'string|required',
        ]);
        $user = User::query()->where('name','=',$request->name)->first();
        $user->delete();
        return $this->sendResponse(1, 'Your User Deleted successfully.');
    }
}
