<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\ListOfJobs;
use App\Models\jobapplyData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobSectionController extends Controller
{
    //
    public function userJob()
    {
        $jobdata = ListOfJobs::paginate(4);
        return view('user.Jobs.jobsalerts')->with(['jobdata' => $jobdata]);
    }
    //ABOUT JOBS
    //employerlist
    public function employerList()
    {
        $data = User::where('role', 'employer')->paginate(5);
        return view('user.Employer.employerlist')->with(['userData' => $data]);
    }
    //job info
    public function jobinfo($id)
    {
        $jobdata = ListOfJobs::where('id', $id)->first();
        return view('user.Jobs.jobinfo')->with(['jobdata' => $jobdata]);
    }
    //job apply
    public function applyPage($id)
    {
        $jobdata = ListOfJobs::where('id', $id)->first();
        return view('user.Jobs.apply')->with(['jobdata' => $jobdata]);
    }
    //job apply
    public function applyData(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'image' => 'required'
        ]);
        $file = $request->image;
        $fileName = uniqid() . '_c' . $file->getClientOriginalName();

        $file->move(public_path() . '/uploads/', $fileName);
        $cvData = [
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $request->userId,
            'company_id' => $request->companyId,
            'image' => $fileName,
            'job_id' => $request->jobId,
            'phone_number' => $request->phoneNumber,
            'address' => $request->address,
        ];
        jobapplyData::create($cvData, $fileName);
        return redirect()->route('user#alertMessagePage')->with(['applySuccess' => 'Apply Success..']);
    }
    //employer Search
    public function employerSearch(Request $request)
    {
        $searchData = User::where('role', 'employer')
            ->where('name', 'like', '%' . $request->searchJob . '%')
            ->paginate(5);
        return view('user.Employer.employerlist')->with(['userData' => $searchData]);
    }
    //job search
    public function jobsearch(Request $request)
    {
        $searchData = ListOfJobs::where('job_title', 'like', '%' . $request->searchJob . '%')
            ->orwhere('company_name', 'like', '%' . $request->searchJob . '%')
            ->orwhere('tags', 'like', '%' . $request->searchJob . '%')
            ->orwhere('location', 'like', '%' . $request->searchJob . '%')
            ->orwhere('description', 'like', '%' . $request->searchJob . '%')
            ->orwhere('email', 'like', '%' . $request->searchJob . '%')
            ->orwhere('typeOfJob', 'like', '%' . $request->searchJob . '%')
            ->paginate(5);
        $searchText = $request->searchJob;
        //Session::put('JOB_SEARCH', $request->searchJob);
        $searchData->appends($request->all());
        return view('user.jobs.jobsalerts')->with(['jobdata' => $searchData, 'searchText' => $searchText]);
    }
}
