<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubOrder;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
	public function index(){
            $orders = SubOrder::where('seller_id', auth()->id())->get();
            return view('sellers.orders.index', compact('orders'));
        }

        public function show(SubOrder $order){
            $items = $order->items;

            return view('sellers.orders.show', compact('items'));
        }

        public function markDelivered(SubOrder $suborder){
            $suborder->status = 'completed';
            $suborder->save();

            //check if all suborders complete
            $pendingSubOrders = $suborder->order->subOrders()->where('status','!=', 'completed')->count();

            if($pendingSubOrders == 0) {
                $suborder->order()->update(['status'=>'completed']);
            }

            return redirect('/seller/orders')->withMessage('Order marked complete');
        }
}

