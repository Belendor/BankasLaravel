<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('surname')->get();

        return view('account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $account = new Account;


    
        $account->name = $request->name;
        $account->surname = $request->surname;
        $account->account = $request->account;
        $account->ak = $request->ak;
        $account->eur = 0;
        $account->usd = 0;

        $account->save();

        return redirect()->route('account.create')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    public function add(Account $account, Request $request)
    {
        if(isset($_POST['sum'])){
            if($request->currency == 'eur'){

                $account->eur += $request->sum;
                $account->save();

            }elseif ($request->currency == 'usd'){
                $account->usd += $request->sum;
                $account->save();
            }

            return redirect()->route('account.add', [$account])->with('success_message', 'Pinigai prideti sėkminai.');

        }else{
            return view('account.add', ['account' => $account]);
        }
    }
    public function change(Account $account, Request $request)
    {

        return view('account.change', ['account' => $account]);

    }

    public function subtract(Account $account, Request $request)
    {
        if(isset($_POST['sum'])){

            if($request->currency == 'eur'){

                $account->eur -= $request->sum;
                $account->save();

            }elseif ($request->currency == 'usd'){
                $account->usd -= $request->sum;
                $account->save();
            }

            return redirect()->route('account.subtract', [$account])->with('success_message', 'Pinigai atimti sėkminai.');

        }else{
            return view('account.subtract', ['account' => $account]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('account.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
