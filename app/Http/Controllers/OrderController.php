<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Order;
use App\Partner;

class OrderController extends Controller
{

    public function getAll()
    {

        $orders = Order::GetOrders ();
        return view('orders', ['orders' => $orders]);

    }

    public function show(Request $request)
    {
        $order_id = $request->get('order_id');

    if( ($request->post('email') != null) and $request->post('partner') != null and $request->post('partner')!= null ) {

            $order = Order::find($order_id);

        $order->client_email = $request->post('email');
        $order->status = $request->post('status');
        $order->partner_id = $request->post('partner');
        $order->save();
        /*
        $data['order_id'] = $order_id;
        $data['email'] = $request->post('email');
        $data['partner_id'] = $request->post('partner');
        $data['status'] = $request->post('status');
        return view('orders', ['data' => $data]);
        */
    }

        $order = Order::GetOrders ($order_id );

        $partners = Partner::GetAllPartners();

        return view('orders', ['order' => $order,'partners' => $partners]);
    }

    public function edit(Request $request){

        $data = Array();

        $order_id = $request->get('order_id');

        $data['order_id'] = $order_id;
        $data['email'] = $request->post('email');
        $data['partner_id'] = $request->post('partner');
        $data['status'] = $request->post('status');

        $order = Order::find($order_id);

        $order->client_email = $request->post('email');
        $order->status = $request->post('status');

        $order->save();

        $order = Order::GetOrders ($order_id);

        $partners = Partner::GetAllPartners();

        //return view('orders', ['order' => $order,'partners' => $partners ]);
        return view('orders', ['data' => $data]);

    }

}
