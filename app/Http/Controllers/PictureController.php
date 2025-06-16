<?php

namespace App\Http\Controllers;
use App\Models\Picture;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;
use Illuminate\Support\Str;

class PictureController extends Controller
{    
    public function store(Request $request)
    {   Auth::user();
        
         // Validate the incoming request
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // You can adjust validation as needed
    ]);

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        // Get the uploaded image
        $image = $request->file('image');

        // Generate a unique name for the image
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move the image to the public/images directory
        $image->move(public_path('images'), $imageName);

        // Create a new Picture record and save it in the database
        $picture = new Picture();
        $picture->user_id =Auth::id(); // Assuming the user is authenticated and you want to store the user_id
        $picture->image = $imageName;  // Save the image name (path relative to the public directory)
        $picture->save();  // Save the record to the database

        // Return a success message
        return back()->with('success', 'Image uploaded and saved successfully!');
    }

    // Return an error message if no image is uploaded
    return back()->with('error', 'No image is uploaded');
    }
}