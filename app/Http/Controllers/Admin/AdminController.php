<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\User;
use App\Models\jobapplyData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListOfJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //home
    public function index()
    {
        $id = Auth::user()->id;
        $adminData = User::where('id', $id)->first();
        return view('admin.profile')->with(['adminData' => $adminData]);
    }
    //change Password
    public function pswChangePage()
    {
        return view('admin.changePswPage');
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
            return redirect()->route('admin#profile');
        } else {

            return back()->with(['notMachMessage' => 'The Old Password doesnot Match! Try Again....']);
        }
    }
    //update profile
    public function updatePage($id)
    {
        $data = User::where('role', 'admin')
            ->where('id', $id)
            ->first();
        return view('admin.profileUpdatePage')->with(['data' => $data]);
    }
    public function update(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ];
        if ($request->hasFile('img')) {
            $imgFilter = User::where('id', Auth()->user()->id)->first();
            $dbImage = $imgFilter->img;
            if ($dbImage != null) {
                Storage::delete('/adminImage' . $dbImage);
            }
            $file = $request->file('img');
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move(public_path() . '/adminImage', $fileName);
            $data['img'] = $fileName;
        }
        $data = User::where('id', Auth()->user()->id)->update($data);
        return redirect()->route('admin#profile');
    }
    //joblist

    //employer list
    public function employerList()
    {
        $data = User::where('role', 'employer')->paginate(5);
        return view('admin.employer.employerlist')->with(['userData' => $data]);
    }
    //employer joblist
    public function employerJobList($id)
    {
        $userData = ListOfJobs::where('company_id', $id)->paginate(5);
        return view('admin.employer.employerJobList', compact('userData'));
    }
    //employerjob delete
    public function deleteEmployerJob($id)
    {
        ListOfJobs::where('id', $id)->delete();
        return back();
    }
    //employer list
    public function userList()
    {
        $data = User::where('role', 'user')->paginate(5);
        return view('admin.userlist')->with(['userData' => $data]);
    }
    //blog
    // public function blogPage()
    // {
    //     return view('admin.blog');
    // }
    //post
    // public function blogPost(Request $request)
    // {
    //     $blogData = $this->blogData($request);
    //     Blog::create($blogData);
    //     return back();
    // }
    //joblist
    public function jobListPage()
    {
        $userData = jobapplyData::paginate(5);
        return view('admin.joblist')->with(['userData' => $userData]);
    }
    //private
    // private function blogData($request)
    // {
    //     return [
    //         'title' => $request->title,
    //         'body' => $request->blog,
    //         'image' => $request->image,
    //         'admin_id' => Auth::user()->id,
    //     ];
    // }
}
