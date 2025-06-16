<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{
    public function redirectToCheckout(Request $request)
    {
        // $totalPrice = $request->query('totalPrice'); // ← GETパラメータで取得
        $totalPrice = session('total_price');
        // dd($totalPrice);
    if (!$totalPrice || !is_numeric($totalPrice)) {
        abort(400, 'Invalid totalPrice');
    }
        Stripe::setApiKey(config('services.stripe.secret'));

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Flight Booking',
                    ],
                    'unit_amount' => $totalPrice * 100, // Stripe expects the amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($checkoutSession->url);
    }
}

