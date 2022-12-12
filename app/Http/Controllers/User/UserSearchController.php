<?php

namespace App\Http\Controllers\User;

use App\Models\ListOfJobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSearchController extends Controller
{
    //search
    public function filterJob($type)
    {
        $jobdata = ListOfJobs::where('description', $type)->paginate(6);
        $searchText = $type;
        return view('user.searchcategory.filtersearch', compact('jobdata', 'searchText'));
    }
    public function filterJobType($jobType)
    {
        $jobdata = ListOfJobs::where('typeOfJob', $jobType)->paginate(6);
        $searchText = $jobType;
        return view('user.searchcategory.filtersearch', compact('jobdata', 'searchText'));
    }

    //end serch category end
}
