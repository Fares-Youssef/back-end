<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriveController extends Controller
{

    public function index()
    {
        $id = \auth()->user()->id;
        $drive = DB::table("drives")->where("userId", "=", $id)->get();
        return \view('Drive.index')->with("drive", $drive);
    }


    public function public()
    {
        $drive = DB::table("publicFile")->where("status", "=", "public")->get();
        return \view('Drive.public')->with("drive", $drive);
    }


    public function create()
    {
        return \view("Drive.create");
    }


    public function store(Request $request)
    {
        $fileSiza = 1024 * 2;
        $request->validate([
            'name' => "required|string|min:2|max:20",
            'title' => "required|string|min:4|max:50",
            'file' => "required|mimes:png,jpg,pdf|max:$fileSiza"
        ]);
        $drive = new Drive();
        $drive->name = $request->name;
        $drive->title = $request->title;
        $drive->userId = \auth()->user()->id;
        // upload file code
        $drive_data = $request->file("file");
        $drive_name = \time() . $drive_data->getClientOriginalName();
        $location =  \public_path('./drives/');
        $drive_data->move($location, $drive_name);
        $drive->file = $drive_name;
        $drive->save();
        return redirect()->back()->with("done", "uploaded file done");
    }


    public function show($id)
    {
        $drive = Drive::find($id);
        $id = \auth()->user()->id;
        if ($drive->status == "private") {
            if ($drive->userId == $id) {
                return \view('Drive.show')->with("drive", $drive);
            }else{
                return \back();
            }
        }else{
            return \view('Drive.show')->with("drive", $drive);
        }
    }


    public function download($id)
    {
        $drive = Drive::find($id);
        $drive_name = $drive->file;
        $path = \public_path() . "/drives/" . $drive_name;
        return \response()->download($path);
    }


    public function edit($id)
    {
        $drive = Drive::find($id);
        $userId = \auth()->user()->id;
        if ($userId == $drive->userId) {
            return \view('Drive.edit')->with("drive", $drive);
        } else {
            return \redirect()->back();
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|min:2|max:20",
            'title' => "required|string|min:4|max:50"
        ]);
        $drive = Drive::find($id);
        $drive->name = $request->name;
        $drive->title = $request->title;
        $drive->file = $drive->file;
        $drive->save();
        return redirect()->route('drive.index')->with("done", "uploaded file done");
    }


    public function destroy($id)
    {
        $drive = Drive::find($id);
        $path = \public_path() . "/drives/" . $drive->file;
        \unlink($path);
        $drive->delete();
        return redirect()->route('drive.index')->with("remove", "remove file done");
    }


    public function status($id)
    {
        $drive = Drive::find($id);
        if ($drive->status == "private") {
            $drive->status = "public";
            $drive->save();
        } else {
            $drive->status = "private";
            $drive->save();
        }
        return \redirect()->route('drive.index');
    }
}
