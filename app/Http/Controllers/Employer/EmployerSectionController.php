<?php

namespace App\Http\Controllers\Employer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployerSectionController extends Controller
{
    //
    //home
    public function employerHome()
    {
        return view('employer.employerhome');
    }
    //update employer profile
    public function employerProfile()
    {
        $data = User::where('id', Auth()->user()->id)->first();
        return view('employer.EmployerSection.updateprofile')->with(['data' => $data]);
    }
    //psw change
    public function changPswPage()
    {
        return view('employer.EmployerSection.changePsw');
    }
    public function changePassword(Request $request)
    {
        $validation = $request->validate([
            'currentPsw' => 'required|min:6',
            'newPsw' => 'required|min:6',
            'confirmPsw' => 'required|min:6|same:newPsw',
        ]);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $hashValue = $user->password;
        if (Hash::check($request->currentPsw, $hashValue)) {

            $data = [
                'password' => Hash::make($request->newPsw)
            ];
            User::where('id', Auth()->user()->id)->update($data);
            return redirect()->route('employer#info');
        } else {

            return back()->with(['notMachMessage' => 'The Old Password doesnot Match! Try Again....']);
        }
    }
    //update
    public function profileUpdate(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
            'aboutme' => $request->aboutme
        ];
        if ($request->hasFile('img')) {
            $imgFilter = User::where('id', Auth()->user()->id)->first();
            $dbImage = $imgFilter->img;
            if ($dbImage != null) {
                Storage::delete(public_path() . '/employerImage' . $dbImage);
            }
            $file = $request->file('img');
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move(public_path() . '/employerImage', $fileName);
            $data['img'] = $fileName;
        }

        $data = User::where('id', Auth()->user()->id)->update($data);
        return redirect()->route('employer#info');
    }
    //about me
    public function aboutme($id)
    {
        $data = User::where('id', $id)->first();
        return view('employer.EmployerSection.aboutme', compact('data'));
    }
}
