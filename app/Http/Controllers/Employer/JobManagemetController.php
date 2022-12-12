<?php

namespace App\Http\Controllers\Employer;

use App\Models\User;
use App\Models\ListOfJobs;
use App\Models\jobapplyData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobManagemetController extends Controller
{
    //
    //info
    public function employerInfo()
    {
        $id = auth()->user()->id;
        $userData = User::where('id', $id)
            ->where('role', 'employer')
            ->first();
        return view('employer.EmployerSection.myprofile')->with(['userData' => $userData]);
    }
    //list
    public function jobList()
    {
        $jobdata = ListOfJobs::where('company_id', Auth()->user()->id)->paginate(5);
        return view('employer.Job Managment.jobs')->with(['jobdata' => $jobdata,]);
    }
    public function otherJoblist()
    {
        $jobdata = ListOfJobs::where('company_id', '!=', Auth()->user()->id)->paginate(5);
        return view('employer.Job Managment.otherJoblist', compact('jobdata'));
    }
    //info
    public function info($id)
    {
        $info = ListOfJobs::where('id', $id)->first();
        return view('employer.Job Managment.jobInfo')->with(['jobdata' => $info]);
    }
    //create job
    public function createPost()
    {
        return view('employer.Job Managment.postJob');
    }
    public function createJob(Request $request)
    {
        // $file = Auth()->user()->img;
        // $fileName = uniqid() . '_c' . $file->getClientOriginalName();

        // $file->move(public_path() . '/uploads/', $fileName);
        $validation = $request->validate([
            'jobTitle' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'typeOfJob' => 'required',
        ]);
        $employerData = [
            'job_title' => $request->jobTitle,
            'company_id' => Auth()->user()->id,
            'company_name' => Auth()->user()->name,
            //'image' => $fileName,
            'salary' => $request->salary,
            'tags' => $request->tags,
            'location' => $request->location,
            'description' => $request->description,
            'email' => Auth()->user()->email,
            'typeOfJob' => $request->typeOfJob,
        ];
        ListOfJobs::create($employerData);
        $jobdata = ListOfJobs::paginate(5);
        return redirect()->route('employer#jobList')->with(['jobMessage' => 'job created..', 'jobdata' => $jobdata]);
    }
    //edit and update
    public function edit($id)
    {
        $jobdata = ListOfJobs::where('id', $id)->first();

        return view('employer.Job Managment.edit')->with(['editdata' => $jobdata]);
    }
    public function updateJob($id, Request $request)
    {
        $validation = $request->validate([
            'jobTitle' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'description' => 'required',
            'typeOfJob' => 'required',
        ]);
        $updateData = $this->requestemployerData($request);
        ListOfJobs::where('id', $id)->update($updateData);
        $jobdata = ListOfJobs::paginate(5);
        return view('employer.Job Managment.jobs')->with(['updateSuccess' => 'updateSuccess', 'jobdata' => $jobdata]);
    }
    //DELETE
    public function deleteJob($id)
    {
        //$img = ListOfJobs::select('image')->where('id', $id)->first();
        $deleteData = ListOfJobs::where('id', $id)->delete();
        // $fileName = $img['image'];
        // if (File::exists(public_path() . '/uploads/' . $fileName)) {
        //     File::delete(public_path() . '/uploads/' . $fileName);
        // }

        return back()->with(['deleteSuccess' => 'DeleteSuccess..']);
    }
    //job detail
    public function jobdetailsPage($id)
    {
        $jobdata = jobapplyData::where('company_id', $id)->get();
        return view('employer.Job Managment.jobdetailPage')->with(['jobdata' => $jobdata]);
    }
    //job response
    public function jobRespond(Request $request, $id)
    {

        $validation = $request->validate([
            'status' => 'required',
        ]);
        $data = [
            'status' => $request->status,

        ];
        jobapplyData::where('id', $id)->update($data);
        if ($request->status == 'Accept') {
            $message = 'Job Accepted..';
        };
        if ($request->status == 'Decline') {
            $message = 'Job Declined..';
        };
        return redirect()->route('employer#jalerts')->with(['respondMessage' => $message]);
        //return redirect()->route('employer#jalerts')->with(['respondMessage' => 'Job Responded....']);
    }
    public  function jrespondDetail($id)
    {
        $jobdata = jobapplyData::where('id', $id)->first();
        return view('employer.Job Managment.jobsalertsdetail', compact('jobdata'));
    }
    //JOBALERTS
    public function employerJob()
    {
        $jobdata = jobapplyData::where('company_id', Auth()->user()->id)->get();

        return view('employer.Job Managment.jobsalerts')->with(['jobdata' => $jobdata]);
    }
    //SEARCH jobs and filter
    public function search(Request $request)
    {
        $searchData = ListOfJobs::where('job_title', 'like', '%' . $request->searchJob . '%')
            ->orwhere('company_name', 'like', '%' . $request->searchJob . '%')
            ->orwhere('tags', 'like', '%' . $request->searchJob . '%')
            ->orwhere('location', 'like', '%' . $request->searchJob . '%')
            ->orwhere('description', 'like', '%' . $request->searchJob . '%')
            ->orwhere('email', 'like', '%' . $request->searchJob . '%')
            ->orwhere('typeOfJob', 'like', '%' . $request->searchJob . '%')
            ->paginate(5);

        $searchData->appends($request->all()); // fixed search
        return view('employer.Job Managment.jobs')->with(['jobdata' => $searchData]);
    }
    //END JOB MANAGMENT
    // PRIVATE
    private function requestemployerData($request)
    {
        $arr = [
            'job_title' => $request->jobTitle,
            'tags' => $request->tags,
            'location' => $request->location,
            'description' => $request->description,
            'typeOfjob' => $request->typeOfJob,
        ];
        return $arr;
    }
}
