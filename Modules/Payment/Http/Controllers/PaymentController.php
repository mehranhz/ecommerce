<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Cart\Services\Cart;
use Modules\Order\Entities\Order;
use Modules\Payment\Entities\Payment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{

    public function addPayment(Request $request)
    {
        Cart::flush();
        $order = Order::find($request->order);
        $cart = Cart::all();


        // Create new invoice.
        $invoice = (new Invoice)->amount(1000);
        // Purchase and pay the given invoice.
        // You should use return statement to redirect user to the bank page.
        return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function ($driver, $transactionId) use ($invoice, $order) {
            // Store transactionId in database as we need it to verify payment in the future.
            $order->payments()->create([
                'resnumber' => $invoice->getUuid(),
                'price' => 100
            ]);
        })->pay()->render();
    }

    public function callback(Request $request)
    {
        // You need to verify the payment to ensure the invoice has been paid successfully.
// We use transaction id to verify payments
// It is a good practice to add invoice amount as well.
        try {
            $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();
            $receipt = ShetabitPayment::amount(1000)->transactionId($request->clientrefid)->verify();

            // You can show payment referenceId to the user.

            $payment->update([
                'status' => 1
            ]);

            $payment->order()->update([
                'status' => 'paid'
            ]);

            alert()->success('پرداخت شما موفق بود');
            return redirect('/product/shop');

        } catch (\Exception $exception) {
            /**
             * when payment is not verified, it will throw an exception.
             * We can catch the exception to handle invalid payments.
             * getMessage method, returns a suitable message that can be used in user interface.
             **/

            $errors =$exception->getMessage();

                        alert()->error($errors);
                        return redirect(route('order.payment',['order'=>$payment->order->id]));
        }

    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('payment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('payment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('payment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('payment::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
