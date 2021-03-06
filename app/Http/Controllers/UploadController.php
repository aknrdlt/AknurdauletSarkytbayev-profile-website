<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Models\Form;

class UploadController extends Controller
{
    public function index() {
        $form = Form::paginate(5);

        return view('form.index')->with(['forms' => $form]);
    }
    public function others() {
        $form = Form::paginate(5);

        return view('post_of_others')->with(['forms' => $form]);
    }

    public function uploadform() {
        return view('form.upload');
    }
    public function uploadsubmit(Request $request) {

        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'photos' => 'required|mimes:jpg,png,jpeg,gif|max:5048'
        ]);
        $newImageName = auth()->user()->email . '-' . $request->name . '.' . $request->photos->extension();

        $request->photos->move(public_path('uploads'), $newImageName);

        Form::create([
            'name' => $request->name,
            'body' => $request->body,
            'email' => auth()->user()->email,
            'filename' => $newImageName
        ]);

        return redirect('/upload');
    }
}