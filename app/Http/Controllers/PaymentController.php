<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function purchase_items(Request $request)
    {
        echo "<pre>"; print_r($_POST);exit;
    }
}
