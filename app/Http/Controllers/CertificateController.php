<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function edit(Portfolio $portfolio) {
        return view('profiles.portfolio.certificate')->with([
            'portfolio' => $portfolio,
        ]);
    }

    public function store(Request $request) {
        $user = $request->user();
        $portfolio  = $user->portfolio->certificates()->create($request->all());
        return redirect()->route('portfolio.certificate.index', $user->portfolio);
    }

    public function destroy(Certificate $certificate) {
        $certificate->delete();
        return redirect()->back();
    } 
}
