<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    /**
     * Display a listing of the user wallets.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user()->id;
        $user = User::find($user);
        if ($wallets = $user->wallets) {
            return response($wallets, 200)->header('Content-Type', 'application/json');
        } else {
            return response(json_encode(['errors' => ['failed to fetch wallets']]), 200)
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Show the form for creating a new wallet.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'wallet_name' => 'required|string|unique:wallets,wallet_name'
        ]);

        $reponse = Http::withBody(json_encode([
            'wallet_name' => $fields['wallet_name']
        ]), 'application/json')->post('localhost:5000/wallet/create');

        if ($reponse->status() == 200) {
            $user = $request->user();
            $w = $reponse->body();
            $c = $user->wallets()->create([
                'wallet_name' => $fields['wallet_name'],
                'network' => 'btc'
            ]);
            if ($c) {
                return response($w,200)->header('Content-Type','application/json');
            }else{
                return response(json_encode(['errors'=>['failed to add wallet to db']]),500)->header('Content-Type','appliation/json');
            }
        }else{
            return response($reponse->body(),500);
        }
    }

    /**
     * Display the specified wallet.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $fields = $request->validate([
            'wallet_name' => 'nullable|string'
        ]);

        $reponse = Http::withBody(json_encode([
            'wallet_name' => $fields['wallet_name'] ?? ''
        ]),'application/json')->get('localhost:5000/wallet/get-wallet-info');

        if($reponse->status() == 200){
            return response($reponse->body(),200)->header('Content-Type','application/json');
        }else{
            return response($reponse->body(),500)->header('Content-Type','application/json');
        }
    }
}
