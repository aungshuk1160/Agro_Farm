<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $product = Product::all();
        

        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $comment = Comment::all();
            $reply = Reply::all();
            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function index()
    {
        $product = Product::all();
        $comment = Comment::all();
        $reply = Reply::all();

        return view('home.userpage', compact('product', 'comment', 'reply',));
    }   

    
    public function search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('name', 'like', '%' . $search . '%')->orWhere('category', 'like', '%' . $search . '%')->get();
        
        $comment = Comment::all();
        $reply = Reply::all();
        
        return view('home.userpage', compact('product', 'comment', 'reply'));       
    }
    

    public function view_product_details($id)
    {
        $product = Product::find($id);
        return view('home.view_product_details', compact('product'));
    }

    public function edit_profile()
    {
        $user = User::find(Auth::user()->id);
        return view('home.edit_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('message', 'User Info Updated Successfully');
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_name = $product->name;
            $cart->price = $product->price;
            $cart->image = $product->image;
            $cart->product_id = $product->id; 
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }


    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.show_cart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    /*public function show_cart()
    {
        return view('home.show_cart');
        
    }*/

    public function remove_cart($id)
        {
            $cart=cart::find($id);
            $cart->delete();
            return redirect()->back();
        }


    public function cash_order()
        {
            $user = Auth::user();
            $userid = $user->id;
        
            //need to get all cart items for user
            $cartItems = cart::where('user_id', '=', $userid)->get();
        
            $orders = []; //to store all orders for that user
        
            foreach ($cartItems as $cartItem) {
                $order = new Order;
                $order->user_id = $cartItem->user_id;
                $order->name = $cartItem->name;
                $order->email = $cartItem->email;
                $order->addres = $cartItem->address;
                $order->product_name = $cartItem->product_name;
                $order->product_id = $cartItem->product_id;
                $order->price = $cartItem->price;
                $order->quantity = $cartItem->quantity;
                $order->image = $cartItem->image;
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
                $order->save();
        
                
                $orders[] = $order;
        
                
                $cart = cart::find($cartItem->id);
                $cart->delete();
            }
        
            
            if (count($orders) > 0) {
                Mail::to($user->email)->send(new OrderConfirmationMail($orders));
            }
        
            return redirect()->back()->with('message', 'Order placed successfully');
        }


    
    public function add_comment(Request $request)
    {
        if(Auth::id()){
            $comment=new Comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();

            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }

    public function add_reply(Request $request){

        if(Auth::id()){
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply ->save();
            return redirect()->back();


          }
        else{

           return redirect('login');
        }
    }

    
}