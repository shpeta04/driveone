<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestDrive;

class TestDriveController extends Controller
{
    public function index()
    {
        $testdrives = TestDrive::latest()->get();

        return view('admin.testdrives.index', compact('testdrives'));
    }

    public function destroy(TestDrive $testdrive)
    {
        $testdrive->delete();

        return back()->with('success', 'Request deleted');
    }
}

