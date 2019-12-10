<?php

namespace App\Helper;
use App\Models\Order;
use App\Models\Country;
use App\Models\Member_reseller_profile;
use App\Models\Member_reseller_transaction_history;
use Mail;

class HelperFunction
{
    public function isJsonString($string)
    {
        if (json_decode($string) == null) {
            return false;
        } else {
            return true;
        }
    }

    public function getCurrentDate()
    {
        $now = new \DateTime("now", new \DateTimeZone('Singapore'));
        $now = $now->format('Y-m-d H:i:s');

        return $now;
    }

    public function invoiceNumberGenerator() //YYYYMMDDXXXX
    {
        try {
            $now = new \DateTime("now", new \DateTimeZone('Singapore'));
            $date = $now->format('Ymd');
    
            $from = date($now->format('Y-m-d' . ' 00:00:00'));
            $to = date($now->format('Y-m-d' . ' 23:59:59'));
    
            $orderCount = Order::whereBetween('created_at', [$from, $to])->count();
            if ($orderCount < 10000) {
                $orderCount = (string) $orderCount + 1;
                while (strlen($orderCount) < 4) {
                    $orderCount = '0' . $orderCount;
                }
            }
    
            $invoiceNumber = (string) $date . $orderCount;
            return $invoiceNumber;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function calculateDimension($qty = 1)
    {
        $height = 15;
        $width = 2;
        $length = 2;

        if ($qty == 2) {
            $width = 4;
        } else if ($qty == 3 || $qty == 4) {
            $width = 4;
            $length = 4;
        } else if ($qty == 5 || $qty == 6) {
            $width = 4;
            $length = 6;
        } else if ($qty == 7 || $qty == 8 || $qty == 9) {
            $width = 6;
            $length = 6;
        } else if ($qty == 10 || $qty == 11 || $qty == 12) {
            $width = 6;
            $length = 8;
        // } else if ($qty == 13 || $qty == 14 || $qty == 15) {
        //     $width = 8;
        //     $length = 8;
        } else {
            $width = 8;
            $length = 8;
        }

        return (object) [
            'height' => $height,
            'width' => $width,
            'length' => $length
        ];
    }

    public function selectJanioServices($destinationCountry = 'Indonesia')
    {
        $service = 1;
        $country = Country::where('name',$destinationCountry)->first();
        if($country->service_id){
            $service = $country->service_id;
        }
        // if ($destinationCountry == 'China' || $destinationCountry == 'Taiwan' || $destinationCountry == 'South Korea' || $destinationCountry == 'Brunei' || $destinationCountry == 'Vietnam' || $destinationCountry == 'HongKong' || $destinationCountry == 'Japan') {
        //     $service = 2;
        // } else if ($destinationCountry == 'Malaysia') {
        //     $service = 26;
        // } else if ($destinationCountry == 'Singapore') {
        //     $service = 10;
        // } else if ($destinationCountry == 'Thailand') {
        //     $service = 17;
        // } else if ($destinationCountry == 'US') {
        //     $service = 56;
        // }
        return $service;
    }

    public function sendEmail ($data,$view) {
        Mail::send($view, $data , function($message)use($data)
        {
            $message->from(
                'no-reply@jyx.shop',
                'JYX Shop'
            );
            $message->to($data['email']);
            $message->subject($data['subject']);
        });    

        return true; 

    }

    public function calculateKylazResellerCommission ($coupon, $order)
    {
        try {
            $member_reseller_profile = Member_reseller_profile::where([
                ['id', '=', $coupon->reseller_id]
            ])->with(['reseller_type', 'member'])->first();
            $reseller_type = $member_reseller_profile->reseller_type;
            $order_details = $order->order_details;

            $subtotal = 0;

            for ($i = 0, $order_detail_length = sizeof($order_details); $i < $order_detail_length; $i++) {
                $current_order_detail = $order_details[$i];

                $is_kylaz_product = false;
                for ($j = 0; $j < sizeof($current_order_detail->product->category); $j++) {
                    $current_product_category = $current_order_detail->product->category[$j];
                    if (\strtolower($current_product_category->name) == 'kylaz') {
                        $is_kylaz_product = true;
                        break;
                    }
                }

                if ($is_kylaz_product) {
                    $subtotal += $current_order_detail->product_variant_original_price - round(($coupon->coupon_amount / 100) * $current_order_detail->product_variant_original_price, 2);
                }
            }

            if ($subtotal > 0) {
                if ($member_reseller_profile->parent_reseller_id) {
                    $parent_commission = new Member_reseller_transaction_history();
                    $parent_commission->reseller_id = $member_reseller_profile->parent_reseller_id;
                    $parent_commission->sales_point = $reseller_type->sales_point_parent_value;
                    $parent_commission->balance = ceil(round(($reseller_type->commission_parent_percentage / 100) * $subtotal, 2));
                    $parent_commission->description = 'You received sales commission from ' . $member_reseller_profile->member->first_name . ' ' . $member_reseller_profile->member->last_name . '.';
                    $parent_commission->save();
                }

                $commission = new Member_reseller_transaction_history();
                $commission->reseller_id = $member_reseller_profile->id;
                $commission->sales_point = $reseller_type->sales_point_value;
                $commission->balance = ceil(round(($reseller_type->commission_percentage / 100) * $subtotal, 2));
                $commission->description = 'You got commission from order number #' . $order->invoice_number;
                $commission->order_id = $order->id;
                $commission->save();
            }

            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function calculateShippingFee ($country, $subtotal)
    {
        try {
            $shipping_fee = null;

            $sea_countries = ['Brunei', 'Indonesia', 'Malaysia', 'Philippines', 'Thailand', 'Vietnam']; // FREE SHIPPING IF SUBTOTAL >= 140
            $asia_countries = ['Japan', 'South Korea', 'Taiwan']; // FREE SHIPPING IF SUBTOTAL >= 180

            if ($country == 'Singapore') {
                if (($subtotal) < 80) {
                    $shipping_fee = 6;
                } else {
                    $shipping_fee = 0;
                }
            } else if (in_array($country, $sea_countries)) {
                if ($subtotal >= 140) {
                    $shipping_fee = 0;
                }
            } else if (in_array($country, $asia_countries)) {
                if ($subtotal >= 180) {
                    $shipping_fee = 0;
                }
            } else if ($country == 'Australia') {
                if ($subtotal >= 150) {
                    $shipping_fee = 0;
                }
            } else if ($country == 'Canada' || $country == 'Spain' || $country == 'UK' || $country == 'US') {
                if ($subtotal >= 220) {
                    $shipping_fee = 0;
                }
            }

            return $shipping_fee;
        } catch (\Exception $e) {
            //dd($e);
            throw $e;
        }
    }

    public function currency($country){
        try {
            $check = Country::where('name',$country)->first();
            if($check->currency){
                $currency = $check->currency;
            }else{
                $currency = 'USD';
            }
            
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.exchangeratesapi.io/latest?base=SGD");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            $server_output = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($status_code >= 400) {
                curl_close($ch);
                throw new \Exception($server_output);
            }

            $data = json_decode($server_output);
            //dd($data);
            if(isset($data->rates->$currency)){
                $result = $data->rates->$currency;
            }else{
                $result = $data->rates->USD;
            }

            $cur['currency'] = $currency;
            $cur['rate'] = $result;
            //dd($result);
            return $cur;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
