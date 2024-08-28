<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Item;
use App\Models\User;
use App\Models\ItemImage;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\RelatedLinks;






use App\Models\ConversionRate;





class Admin extends Controller
{



    // ======================================================
function adminPage() {
    $usertype=Auth::user()->usertype;
    if($usertype==1) {
        return view('admin.forms.index');

    }

}


// ================================================================== index login function

// function addAdmin() {
//     return view('admin.forms.addAdmin');
// }

function admins() {
    $users = User::where('userType', 1)->get();
    return view('admin.forms.admins',compact('users'));


}


// ================================================================== delete item


public function delete_user($id) {

    $user=User::find($id);
    $user->delete();
    return redirect()->back()->with('message','admin deleted successfully');

    }

// ================================================================== index login function


public function index() {

    $usertype=Auth::user()->userType;

    $aboutUs = AboutUs::findOrFail(1);
    $banner = Banner::findOrFail(1);
    $relatedLink = RelatedLinks::findOrFail(1);





    if($usertype==1) {

        return view('admin.forms.index');
    }else{
        return view('home.Home.Home',compact('aboutUs','banner','relatedLink'));
    }
}

// ================================================================== view add item page


function newItemPage() {


    return view('admin.forms.addItem');
}


// ================================================================== add item


public function add_item(Request $request) {
    // Validate the request


    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'points' => 'required|integer',
        'images.*' => 'file|mimes:jpeg,png,jpg,gif',
    ]);

    // Create a new item
    $item = new Item;
    $item->name = $request->input('name');
    $item->description = $request->input('description');
    $item->price = $request->input('price');
    $item->points = $request->input('points');

    // Save the item to the database
    $item->save();

    // Handle file uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            // Assuming you have an ItemImage model to store item images
            ItemImage::create([
                'item_id' => $item->id,
                'image_url' => 'storage/images/' . $imageName,
            ]);
        }
    }

    // Return the view with a success message
    return redirect()->back()->with('message', 'Item added successfully');
}


// ================================================================== view items


function viewItems() {

    // $items = Item::all();
    $items = Item::with('images')->get();
    $conversionRate = ConversionRate::first()->conversion_rate; // Assuming only one rate


    return view('admin.forms.viewItems', compact('items','conversionRate'));


}


// ================================================================== calculate Price

public function calculatePrice($points, $conversionRate)
{
    return $points / $conversionRate; // Converts points to dollars
}



// ================================================================== update Conversion Rate


public function updateConversionRate(Request $request)
{
    $request->validate([
        'conversion_rate' => 'required|integer',
    ]);

    $conversionRate = ConversionRate::first();
    $conversionRate->conversion_rate = $request->conversion_rate;
    $conversionRate->save();

    return redirect()->back()->with('status', 'Conversion rate updated!');
}


// ================================================================== delete item


public function delete_item($id) {

    $item=Item::find($id);
    $item->delete();
    return redirect()->back()->with('message','item deleted successfully');

    }





// ================================================================== update Item



public function updateItem(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string', // Assuming description is optional
        'price' => 'required|numeric|min:0',
        'points' => 'required|integer|min:0',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images

    ]);

    // Find the item
    $item = Item::find($id);
    
    if (!$item) {
        return redirect()->back()->with('error', 'Item not found');
    }

    // Update item details
    $item->name = $request->input('name');
    $item->description = $request->input('description');
    $item->price = $request->input('price');
    $item->points = $request->input('points');
    // if ($request->hasFile('images')) {
    //     foreach ($item->images as $image) {
    //         Item::delete('storage/images/' . basename($image->image_url));
    //     }
        
    //     // Store new images
    //     $imageUrls = [];
    //     foreach ($request->file('images') as $image) {
    //         $path = $image->store('storage/images');
    //         $imageUrls[] = $path;
    //     }
        
    //     $item->images()->delete(); 
    //     foreach ($imageUrls as $url) {
    //         $item->images()->create(['image_url' => $url]); 
    //     }
    // }
    // $item->save();



    // Redirect with success message
    return redirect()->back()->with('success', 'Item updated successfully');
}



// ================================================================== update USer



public function updateUser(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|string', // Assuming description is optional

    ]);

    // Find the item
    $user = User::find($id);
    
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    // Update item details
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    $user->save();



    // Redirect with success message
    return redirect()->back()->with('success', 'User updated successfully');
}


}
