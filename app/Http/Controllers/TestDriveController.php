<?php

namespace App\Http\Controllers;

use App\Models\TestDrive;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class TestDriveController extends Controller
{
public function store(Request $request,Car $car){
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'preferred_date' => 'required|date',
        'preferred_time' => 'nullable|string',
        'message' => 'nullable|string',
    ]);
    $data['car_id'] = $car->id;

    $testDrive = TestDrive::create($data);

    Mail::raw(
        "New Test Drive Request for {$car->title}\n\n".
        "Name: {$data['name']}\n".
        "Email: {$data['email']}\n".
        "Phone: {$data['phone']}\n".
        "Date: {$data['preferred_date']}\n".
        "Time: {$data['preferred_time']}\n".
        "Message: {$data['message']}",
        function ($message) {
            $message->to('admin@driveone.com')
                ->subject('New Test Drive Request');
            }
        );

    return back()->with('success', 'Test drive request submitted successfully.');
}
}
