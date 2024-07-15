<?php

namespace Musie\LaravelChapa\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Musie\LaravelChapa\Facades\Chapa;

class ChapaController extends Controller
{
    public function initializePayment(Request $request)
    {
        $data = [
            'amount' => $request->amount,
            'currency' => 'ETB',
            'tx_ref' => uniqid(),
            'redirect_url' => route('chapa.callback'),
            'customer' => [
                'email' => $request->email,
                'name' => $request->name,
            ],
        ];

        $response = Chapa::initializePayment($data);

        return redirect($response['data']['checkout_url']);
    }

    public function handleCallback(Request $request)
    {
        return view('chapa::callback', ['status' => $request->status]);
    }

    public function verifyPayment($tx_ref)
    {
        $response = Chapa::verifyPayment($tx_ref);

        return response()->json($response);
    }
}
