<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SSSContribution;

class SSSContributionController extends Controller
{
    //

    public function index(Request $request){ 

        $sss_contribution_table = SSSContribution::get();

        return view('sss_contribution_table.index')
                    ->with(compact('sss_contribution_table'));

    }

}
