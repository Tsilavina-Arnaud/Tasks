<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        return \view("admin.profil", \compact('user'));
    }

    public function update(UpdateAdminAccountRequest $request)
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        User::where('id', $request->user()->id)->update($this->extractData($request));

        return \redirect()->route('admin.profil');
    }

    public function extractData(UpdateAdminAccountRequest $request)
    {
        $data = $request->validated();
        $image = $request->validated('image');
        if ($image == null) {
            return $data;
        }
        if ($request->user()->image) {
            Storage::disk('public')->delete($request->user()->image);
        }
        $data['image'] = $image->store('user_profil', 'public');
        return $data;
    }
    
}
