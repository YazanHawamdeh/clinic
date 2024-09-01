<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



use App\Models\Category;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\Order;
use App\Models\RelatedLinks;
use App\Models\Item;





// use App\Models\BlogImage;




class Home extends Controller
{


    public function add_banner(Request $request) {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'images' => 'required|array|size:2', // Ensure exactly 2 images are uploaded
            'images.*' => 'file|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Create a new Banner instance
        $Banner = new Banner;
        $Banner->title = $request->input('title');
        $Banner->description = $request->input('description');
    
        // Handle the image uploads
        $images = $request->file('images');
        
        if (isset($images[0])) {
            $image1 = $images[0];
            $Banner->image_url_1 = $image1->store('banners', 'public');
        }
    
        if (isset($images[1])) {
            $image2 = $images[1];
            $Banner->image_url_2 = $image2->store('banners', 'public');
        }
    
        $Banner->save();
    
        return redirect()->back()->with('message', 'Banner added successfully');
    }
    

    function newBannerPage() {


        return view('admin.forms.addBanner');
    }
    // ============================================================================= updateBanner

    public function updateBanner(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image_url_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $banner = Banner::findOrFail($id);

        $banner->title = $request->input('title');
        $banner->description = $request->input('description');

        if ($request->hasFile('image_url_1')) {
            if ($banner->image_url_1) {
                Storage::delete($banner->image_url_1);
            }

            $banner->image_url_1 = $request->file('image_url_1')->store('banners', 'public');
        }

        if ($request->hasFile('image_url_2')) {
            if ($banner->image_url_2) {
                Storage::delete($banner->image_url_2);
            }

            $banner->image_url_2 = $request->file('image_url_2')->store('banners', 'public');
        }

        $banner->save();

        return redirect()->back()->with('message', 'Banner updated successfully!');
    }


    public function edit_banner($id)
    {
        $banner = Banner::findOrFail(1);
        
    
        return view('admin.forms.updateBanner', compact('banner'));

    }

    
    // ============================================================================= about us

    
    function newAboutUsPage() {


        return view('admin.forms.addAboutUs');
    }



    public function add_aboutUs(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'array|required|min:1', // Allow up to 4 images
            'images.*' => 'file|mimes:jpeg,png,jpg,gif',
            'titleBox1' => 'required_with:images.1|string',
            'descriptionBox1' => 'required_with:images.1|string',
            'titleBox2' => 'required_with:images.2|string',
            'descriptionBox2' => 'required_with:images.2|string',
            'titleBox3' => 'required_with:images.3|string',
            'descriptionBox3' => 'required_with:images.3|string',
        ]);
    
        // Create a new AboutUs instance
        $aboutUs = new AboutUs();
    
        // Set main AboutUs fields
        $aboutUs->title = $request->input('title');
        $aboutUs->description = $request->input('description');
    
        // Handle the main image upload
        if ($request->hasFile('images') && isset($request->file('images')[0])) {
            $mainImage = $request->file('images')[0];
            $aboutUs->image = $mainImage->store('aboutUs', 'public');
        }
    
        // Handle Box 1
        if ($request->hasFile('images') && isset($request->file('images')[1])) {
            $imageBox1 = $request->file('images')[1];
            $aboutUs->image_box_1 = $imageBox1->store('aboutUs', 'public');
            $aboutUs->title_box_1 = $request->input('titleBox1');
            $aboutUs->description_box_1 = $request->input('descriptionBox1');
        }
    
        // Handle Box 2
        if ($request->hasFile('images') && isset($request->file('images')[2])) {
            $imageBox2 = $request->file('images')[2];
            $aboutUs->image_box_2 = $imageBox2->store('aboutUs', 'public');
            $aboutUs->title_box_2 = $request->input('titleBox2');
            $aboutUs->description_box_2 = $request->input('descriptionBox2');
        }
    
        // Handle Box 3
        if ($request->hasFile('images') && isset($request->file('images')[3])) {
            $imageBox3 = $request->file('images')[3];
            $aboutUs->image_box_3 = $imageBox3->store('aboutUs', 'public');
            $aboutUs->title_box_3 = $request->input('titleBox3');
            $aboutUs->description_box_3 = $request->input('descriptionBox3');
        }
    
        // Save the AboutUs to the database
        $aboutUs->save();
    
        // Return with success message
        return redirect()->back()->with('message', 'About Us section added successfully');
    }
    

    // ============================================================================= about us update


    public function update_aboutUs(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'images' => 'array|nullable|max:4',
        'images.*' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        'titleBox1' => 'nullable|string',
        'descriptionBox1' => 'nullable|string',
        'titleBox2' => 'nullable|string',
        'descriptionBox2' => 'nullable|string',
        'titleBox3' => 'nullable|string',
        'descriptionBox3' => 'nullable|string',
    ]);

    // Find the existing AboutUs instance
    $aboutUs = AboutUs::findOrFail($id);

    // Update AboutUs fields
    $aboutUs->title = $request->input('title');
    $aboutUs->description = $request->input('description');

    // Handle the main image upload
    if ($request->hasFile('images') && isset($request->file('images')[0])) {
        // Delete old image if necessary
        if ($aboutUs->image && Storage::disk('public')->exists($aboutUs->image)) {
            Storage::disk('public')->delete($aboutUs->image);
        }

        $mainImage = $request->file('images')[0];
        $aboutUs->image = $mainImage->store('aboutUs', 'public');
    }

    // Handle Box 1
    if ($request->hasFile('images') && isset($request->file('images')[1])) {
        // Delete old image if necessary
        if ($aboutUs->image_box_1 && Storage::disk('public')->exists($aboutUs->image_box_1)) {
            Storage::disk('public')->delete($aboutUs->image_box_1);
        }

        $imageBox1 = $request->file('images')[1];
        $aboutUs->image_box_1 = $imageBox1->store('aboutUs', 'public');
        $aboutUs->title_box_1 = $request->input('titleBox1');
        $aboutUs->description_box_1 = $request->input('descriptionBox1');
    }

    // Handle Box 2
    if ($request->hasFile('images') && isset($request->file('images')[2])) {
        // Delete old image if necessary
        if ($aboutUs->image_box_2 && Storage::disk('public')->exists($aboutUs->image_box_2)) {
            Storage::disk('public')->delete($aboutUs->image_box_2);
        }

        $imageBox2 = $request->file('images')[2];
        $aboutUs->image_box_2 = $imageBox2->store('aboutUs', 'public');
        $aboutUs->title_box_2 = $request->input('titleBox2');
        $aboutUs->description_box_2 = $request->input('descriptionBox2');
    }

    // Handle Box 3
    if ($request->hasFile('images') && isset($request->file('images')[3])) {
        // Delete old image if necessary
        if ($aboutUs->image_box_3 && Storage::disk('public')->exists($aboutUs->image_box_3)) {
            Storage::disk('public')->delete($aboutUs->image_box_3);
        }

        $imageBox3 = $request->file('images')[3];
        $aboutUs->image_box_3 = $imageBox3->store('aboutUs', 'public');
        $aboutUs->title_box_3 = $request->input('titleBox3');
        $aboutUs->description_box_3 = $request->input('descriptionBox3');
    }

    // Save the updated AboutUs to the database
    $aboutUs->save();

    // Return with success message
    return redirect()->back()->with('message', 'About Us section updated successfully');
}


public function edit_aboutUs($id)
{
    $aboutUs = AboutUs::findOrFail(1);
    

    return view('admin.forms.updateAboutUs', compact('aboutUs'));
}
// =============================================================================================add_cart


public function related_link_view()
{
    return view('admin.forms.addRelated'); // Return the view with the form
}


public function add_related_link(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'link' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg', // Adjust validation rules as needed
    ]);

    // Handle the file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Create a new RelatedLink instance and save it to the database
    RelatedLinks::create([
        'title' => $request->input('title'),
        'link'=> $request->input('link'),
        'description' => $request->input('description'),
        'image' => $imagePath ?? null,
    ]);

    // Redirect or return a response
    return redirect()->back()->with('message', 'Related link section added successfully');

}
// ========================================================================update_related_link

public function edit_related_link($id)
{
    $relatedLink = RelatedLinks::findOrFail(1);
    

    return view('admin.forms.updateRelated', compact('relatedLink'));
}

public function update_related_link(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'link' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg', 
    ]);

    $relatedLink = RelatedLinks::findOrFail($id);

    if ($request->hasFile('image')) {
        if ($relatedLink->image) {
            Storage::disk('public')->delete($relatedLink->image);
        }

        $imagePath = $request->file('image')->store('images', 'public');
        $relatedLink->image = $imagePath;
    }

    $relatedLink->title = $request->input('title');
    $relatedLink->link = $request->input('link');
    $relatedLink->description = $request->input('description');

    $relatedLink->save();

    // Redirect or return a response
    return redirect()->back()->with('message', 'Related link updated successfully');

}

// =============================================================================================add_cart
public function add_cart(Request $request, $id) {
    if (Auth::id()) {
        $user = Auth::user();
        $item = Item::find($id);
        $cart = new Cart;

        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->user_id = $user->id;
        $cart->item_title = $item->name;
        $cart->price = $item->price * $request->quantity;
        $cart->item_id = $item->id;
        $cart->quantity = $request->quantity;

        // Save only the first image URL
        $firstImage = $item->images->first(); // Assuming the relation is defined and returns a collection
        $cart->image = $firstImage ? $firstImage->url : null;

        $cart->save();

        return redirect()->back();
    } else {
        return redirect('login');
    }
}





// -==show_cart
// public function show_cart(){
//     $usertype=Auth::user()->usertype;
// if ( $usertype!=1) {
//     if (Auth::id()) {

//         $id=Auth::user()->id;
//         $cart=Cart::where('user_id','=',$id)->get();

//         return view('admin.forms.viewCart',compact('cart')); 

//            }else{
//             return redirect('login');
//            }}
//            else{
//             $cart=Cart::all()->get();
//             return view('admin.forms.viewCart',compact('cart')); 
//            }
// }
public function show_cart() {
    if (Auth::check()) {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        return view('home.order.order', compact('cartItems'));
    } else {
        return redirect('login');
    }
}

// -==remove_cart
public function remove_cart($id){
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back();

    }

// ================================================================================checkout

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return view('admin.forms.addBanner')->with('error', 'Cart is empty');
        }

        // Calculate total price
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Save the order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'items' => $cartItems->toJson(),
        ]);

        // Clear the cart
        Cart::where('user_id', $user->id)->delete();

        return view('admin.forms.addBanner')->with('status', 'Order placed successfully');
    }


    public function order()
    {
        $orders = Order::all();
        return view('admin.forms.order', compact('orders'));
    }

    // ================================================================================view login

    public function loginPage()
    {
        return view('home.login.loginPage');
    }

    public function home()
    {
        return view('home.Home.Home');
    }

    public function product()
    {
        return view('home.Product.product');
    }

    public function home2()
    {
        $items=Item::all();
        $aboutUs = AboutUs::findOrFail(1);
        $banner = Banner::findOrFail(1);
        $relatedLink = RelatedLinks::findOrFail(1);

        return view('home.Home2.Home2',compact('items','aboutUs','banner','relatedLink'));
    }
}