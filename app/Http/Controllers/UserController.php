<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\UserModel;
use App\Models\ListOfJobs;
use App\Models\UserCatgory;
use App\Models\jobapplyData;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // USER SECTION
    //user
    public function userHome()
    {
        return view('user.userhome');
    }
    //user section
    //profile
    public function userInfo()
    {
        $id = auth()->user()->id;
        $userData = User::where('id', $id)
            ->where('role', 'user')
            ->first();
        return view('user.UserSection.usermyprofile')->with(['userData' => $userData]);
    }
    //profile
    public function profile($id)
    {
        $data = User::where('id', $id)->first();
        return view('user.UserSection.updateprofile')->with(['data' => $data]);
    }
    //profile update
    public function updateProfile(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($request->img != null) {
            $data = User::where('id', Auth()->user()->id)->first();
            if ($data != null) {
                $dbImageName = $data->img;
                File::delete(public_path() . '/userImage/' . $dbImageName);
            }
            $file = $request->file('img');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/userImage', $fileName);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'img' => $fileName,
                'bio' => $request->bio,
                'aboutme' => $request->aboutme
            ];
            User::where('id', Auth()->user()->id)->update($data);
            return redirect()->route('user#info');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
            'aboutme' => $request->aboutme
        ];
        User::where('id', Auth()->user()->id)->update($data);
        return redirect()->route('user#info');
    }
    //change psw
    public function pswChangePage()
    {
        return view('user.UserSection.changepsw');
    }
    public function pswChange(Request $request)
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
            return redirect()->route('user#info');
        } else {
            return back()->with(['notMachMessage' => 'The Old Password doesnot Match! Try Again....']);
        }
    }
    //jobsalert message
    public function alertMessagePage()
    {
        $messageData = jobapplyData::select('jobapply_data.*', 'list_of_jobs.*')
            ->leftJoin('list_of_jobs', 'jobapply_data.company_id', 'list_of_jobs.company_id')
            ->where('user_id', Auth()->user()->id)
            ->paginate(5);
        return view('user.UserSection.jobalertmessage')->with(['messageData' => $messageData]);
    }
    //about me
    public function aboutme($id)
    {
        $data = User::where('id', $id)->first();
        return view('user.UserSection.aboutme', compact('data'));
    }
    //end user section


    //aritcles
    // public function articles()
    // {
    //     $blog = Blog::get();
    //     return view('user.articles')->with(['blogData' => $blog]);
    // }
    //read
    // public function read()
    // {
    //     return view('user.read');
    // }
    //USER SECTION END
    //PRIVATE
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'currentPsw' => 'required|min:8',
            'newPsw' => 'required|min:8',
            'confirmPsw' => 'required|min:8|same:newPsw',
        ])->validate();
    }
}
