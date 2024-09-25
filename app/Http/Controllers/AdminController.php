<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $image->move('product', $image_name);
        $product->image = $image_name;

        if($request->hasFile('video'))
        {
            $video = $request->video;
            $video_name = time().'.'.$video->getClientOriginalExtension();
            $video->move('product', $video_name);
            $product->video = $video_name;
        }

        
        
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    

    public function show_all_product()
    {
        $product = Product::all();
        return view('admin.show_all_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('product', $image_name);
            $product->image = $image_name;
        }

        if($request->hasFile('video'))
        {
            $video = $request->video;
            $video_name = time().'.'.$video->getClientOriginalExtension();
            $video->move('product', $video_name);
            $product->video = $video_name;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function index(Request $request)
    {
        $orders= Order::latest('orders.created_at')->select('orders.*','users.name','users.email');
        $orders= $orders->leftJoin('users','users_id', 'orders.user_id');
        if ($request->get('keyword')!= ""){
            $orders= $orders->where('users.name','like','%',$request->keyword,'%');
            $orders= $orders->orWhere('users.email','like','%',$request->keyword,'%');
            $orders= $orders->orWhere('orders.id','like','%',$request->keyword,'%');
        }
        $orders= $orders->paginate();
        $data['orders']= $orders;
        return view('admin.order_history_list');
    }

    public function show_orders()
    {
        $order = Order::all();
        return view('admin.order_history', compact('order'));
    }

    

}
