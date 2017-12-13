<?php

namespace App\Http\Controllers;

use App\SupportingDocs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupportingDocsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path(
            'files/supporting-docs/'.$request->chargeback_id),
            $imageName);

        $data = [
            'chargeback_id' => $request->chargeback_id,
            'user_id' => Auth::id(),
            'filename' => $imageName,
        ];

        SupportingDocs::create($data);

        return response()->json(['success'=>$imageName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SupportingDocs::findOrFail($id)->delete();

        return redirect()->back()->with('success', 
            'Supporting Document was deleted successfully!'
        );
    }
}
