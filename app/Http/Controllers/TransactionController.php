<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    public $btc_base = "http://localhost:5000/";
    /**
     * Display a listing of the resource.
     * get all transactions
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        global $btc_base;
        $fields = $request->validate([
            'wallet_name' => 'nullable|string',
            'label' => 'nullable|string',
            'count' => 'numeric|nullable',
            'skip' => 'nullable|numeric'
        ]);

        $response = Http::withBody(json_encode([
            'wallet_name' => $fields['wallet_name'] ?? '',
            'label' => $fields['label'] ?? '*',
            'count' => (int) $fields['count'] ?? 100,
            'skip' => (int) $fields['skip'] ?? 0
        ]),'application/json')->get('http://localhost:5000/wallet/tx/list');

        if($response->status() == 200){
            return response($response->body(),200)->header('Content-Type', 'application/json');
        }else{
            return response($response->body(),500)->header('Content-Type', 'application/json');
        }
    }

    /**
     * send a transction
     */
    public function send(Request $request){
        global $btc_base;
        $fields = $request->validate([
            'wallet_name' => 'nullable|string',
            'receiver_address' => 'required|string',
            'amount' => 'required|string',
            'rx_name' => 'nullable|string',
            'tx_desc' => 'nullable|string',
            'subtract_fee' => 'nullable',
        ]);

        $response = Http::withBody(json_encode([
            'wallet_name' => $fields['wallet_name'] ?? '',
            'receiver_address' => $fields['receiver_address'],
            'amount' => $fields['amount'],
            'receiver_name' => $fields['rx_name'] ?? '',
            'description' => $fields['tx_desc'] ?? '',
            'subtract_fee' => $fields['subtract_fee'] ?? false,
            'passphrase' => 'just anchor glance brown person liquid pair joy word clip effort broccoli'
        ]),'application/json')->post('http://localhost:5000/wallet/send');

        if($response->status() == 200){
            //$tx = Transaction::create($response->body());
            return response($response->body(),200)->header('Content-Type', 'application/json');
        }else{
            return response($response->body(),500)->header('Content-Type', 'application/json');
        }
    }

    public function receive(Request $request){
        if($request->ajax()){
            $fields = $request->validate([
                'wallet_name' => 'nullable|string',
                'label' => 'nullable|string'
            ]);

            $response = Http::withBody(json_encode([
                'wallet_name' => $fields['wallet_name'] ?? '',
                'label' => $fields['label'] ?? ''
            ]),'application/json')->get('localhost:5000/wallet/get-address');

            if($response->status() == 200){
                return response($response->body(),200)->header('Content-Type','application/json');
            }else{
                return response($response->body(),200)->header('Content-Type','applicaion/json');
            }
        }else{
            $fields = $request->validate([
                'wallet_name' => 'nullable|string',
                'label' => 'nullable|string'
            ]);

            $response = Http::withBody(json_encode([
                'wallet_name' => $fields['wallet_name'] ?? '',
                'label' => $fields['label'] ?? ''
            ]),'application/json')->get('localhost:5000/wallet/get-address');

            if($response->status() == 200){
                return view('recieve',json_decode($response->body()));
            }else{
                return view('recieve',json_encode($response->body()));
            }
        }
    }

    public function tx_status(Request $request){
        $fields = $request->validate([
            'wallet_name' => 'nullable|string',
            'tx_id' => 'required|string'
        ]);

        $response = Http::withBody(json_encode([
            'wallet_name' => $fields['wallet_name'] ?? '',
            'tx_id' => $fields['tx_id']
        ]),'application/json')->get("localhost:5000/wallet/tx/status");

        if($response->status() == 200){
            return response($response->body(),200)->header('Content-Type','application/json');
        }else{
            return response($response->body(),200)->header('Content-Type','application/json');
        }
    }

    public function receive_form(){
        return view('recieve');
    }

    public function send_form(){
        return view('send');
    }


}
