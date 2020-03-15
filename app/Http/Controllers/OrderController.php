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

        // фильтрация (Просроченные)

        $count = 0;
        $past_due = Array();

        foreach ($orders as $key=>$value) {

            if($count > 50) {break;}

            if($value['status'] == 10  and strtotime($value['delivery_dt']) < time()) {

                $past_due[$key] = $value;
                $count +=1;
            }
        }

        uasort($past_due, function ($a, $b) {
            if (strtotime($a['delivery_dt']) > strtotime($b['delivery_dt'])) return -1;
            if (strtotime($a['delivery_dt']) < strtotime($b['delivery_dt'])) return 1;
            return(0);
        });

        // фильтрация (Текущие)

        $current = Array();
        foreach ($orders as $key=>$value) {

            if($value['status'] == 10  and (strtotime($value['delivery_dt']) - time()) > 0 and  (strtotime($value['delivery_dt']) - time()) < 1 * 24 * 60 * 60 )  {

                $current[$key] = $value;
            }
        }

        uasort($current, function ($a, $b) {
            if (strtotime($a['delivery_dt']) > strtotime($b['delivery_dt'])) return 1;
            if (strtotime($a['delivery_dt']) < strtotime($b['delivery_dt'])) return -1;
            return(0);
        });

        // фильтрация (Новые)

        $new = Array();
        $count = 0;
        foreach ($orders as $key=>$value) {

            if($count > 50) {break;}

            if($value['status'] == 0  and (strtotime($value['delivery_dt']) > time()))  {

                $new[$key] = $value;
                $count +=1;
            }
        }

        uasort($new, function ($a, $b) {
            if (strtotime($a['delivery_dt']) > strtotime($b['delivery_dt'])) return 1;
            if (strtotime($a['delivery_dt']) < strtotime($b['delivery_dt'])) return -1;
            return(0);
        });

        // фильтрация (Выполненные)

        $completed = Array();
        $count = 0;
        foreach ($orders as $key=>$value) {

            if($count > 50) {break;}

            if($value['status'] == 20  and (date("d-m-Y",strtotime($value['delivery_dt'])) == date("d-m-Y",time())) )  {

                $completed[$key] = $value;
                $count +=1;
            }
        }

        uasort($completed, function ($a, $b) {

            if (strtotime($a['delivery_dt']) > strtotime($b['delivery_dt'])) return -1;
            if (strtotime($a['delivery_dt']) < strtotime($b['delivery_dt'])) return 1;
            return(0);
        });

        return view('orders', ['orders' => $orders, 'past_due' => $past_due, 'current' => $current, 'new' => $new, 'completed' => $completed ]);

    }

    public function show(Request $request)
    {
        $order_id = $request->get('order_id');

    if( ($request->post('email') != null) and $request->post('partner') != null and $request->post('partner')!= null and $request->post('status')!= null ) {

        $order = Order::GetOrders ($order_id );

        // если ордер переходит в статус "завершен"
        if($request->post('status') == 20 and $order[$order_id]['status'] != 20)  {

            // список продуктов в заказе

            $product_list = "";
            $vendor_email_list = [];

            $count = 0;

            foreach ($order[$order_id]['composition'] as $key=>$row) {

                $count +=1;
                $vendor_email_list[$row->vnd_email] = $row->vnd_name;
                $product_list .= $count.". ".$row->prod_name." (".$row->vnd_name.") ".$row->quantity."X".$row->price." = ".$row->quantity*$row->price."\n";

            }

            $body = "Здравствуйте! Заказ №".$order_id." завершен.\n
            Состав заказа:\n".$product_list."
            Стоимость заказа: ".$order[$order_id]['summ'];

            $data = array("body" => $body);

            // return view('orders', ['data' => $body]);  // альтернативный вывод сообщения на экран монитора

            /*
             * ### отправка почты (закомментировал, т.к. у меня не настроено почтовое окружение)
             *

            Mail::send('emails', $data, function ($message) use ($order, $vendor_email_list) {

                $message->from('sender@test.com', 'Sender');
                $message->to($order['partner_email'], $order['partner_name'])->subject("Заказ №".$order['id']." завершен");
                $message->bcc($vendor_email_list);

            });
            */
        }

        $order = Order::find($order_id);
        $order->client_email = $request->post('email');
        $order->status = $request->post('status');
        $order->partner_id = $request->post('partner');
        $order->save();
    }

        $order = Order::GetOrders ($order_id );

        //return view('orders', ['data' => $order]);

        $partners = Partner::GetAllPartners();

        return view('orders', ['order' => $order,'partners' => $partners]);
    }

}
