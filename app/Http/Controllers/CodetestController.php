<?php

namespace Bulkly\Http\Controllers;

use App\Http\Resources\CustomerCollection;
use Bulkly\BufferPosting;
use Faker\Provider\DateTime;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Http\Request;


class CodetestController extends Controller
{
    public function codetest()
    {
        return view('pages.codetest');
    }
    public function index()
    {
        $data = BufferPosting::with('group', 'account')->paginate(15);
        return response()->json($data);
    }

    public function search(Request $request)
    {

        $date = date("Y-m-d", strtotime($request->date_search));
        $Posting_query = BufferPosting::with('group', 'account');
        if (!empty($request->keword)){
            $Posting_query->where('post_text', 'like', "%$request->keword%");
        }

        if (!empty($request->date_search)&&$date!='1970-01-01'){
            $Posting_query->Where('created_at', 'like', "%$date%");
        }
        $group=$request->group;
        if (!empty($group)) {
            $Posting_query->whereHas('group', function ($query) use ($group) {
                $Posting_query=$query->where('type','like',"%$group%");
            });
                }
        $data=  $Posting_query->paginate(15);

        return response()->json($data);
    }

}
