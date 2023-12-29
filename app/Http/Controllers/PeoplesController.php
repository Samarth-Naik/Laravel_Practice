<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeoplesController extends Controller
{
    public function saveFormDelivered(Request $request)
    {
        $peopleIds = $request->input('form_delivered', []);

        // Update the database for the selected people
        People::whereIn('id', $peopleIds)->update(['form_delivered' => true]);

        return redirect()->back()->with('success', 'Form Delivered updated successfully');
    }
}
