<?php

namespace App\Http\Controllers;

use App\Account;
use App\Picture;
use App\Change;

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

    public function upload(Account $account, Request $request)
    {

        $picture = new Picture;

        $picture->fname = $request->file('avatar');
        dd($_FILES['avatar']['name']);
        $arrays[] =  (array) $request->avatar;
      // dd( $arrays[0][0]);
        foreach($arrays[0] as $a){
            $ar[] =  (array) $a;
      
           // echo   ($ar);
            foreach ($ar as $u){
                echo  $u[0];
            }
        
        }
        $picture->account_id = $account->id;
 
        //dd($request->avatar);
        dd($request->attributes['basename']);

        $picture->save();

        return redirect()->route('account.index');
    }

    public function add(Account $account, Request $request)
    {
        if(isset($_POST['sum'])){

            if($request->currency == 'eur'){

                $account->eur += $request->sum;
                $account->save();

            }elseif ($request->currency == 'usd'){

                $account->usd += $request->sum;
                $account->eur = 0;

                $account->save();

            }

            return redirect()->route('account.add', [$account])->with('success_message', 'Pinigai prideti sėkminai.');

        }else{
            return view('account.add', ['account' => $account]);
        }
    }

    public function change(Account $account, Request $request)
    {
        if(isset($request->changefirst)){

            $EURtoUSD = number_format(Change::getEURtoUSD(), 4);
            $USDtoEUR = number_format(Change::getUSDtoEUR(), 4);
            
            if($request->currency == 'eur' && $request->currency2 == 'usd'){

                if($account->eur < $request->changefirst){

                    return redirect()->route('account.change', [$account])->with('failure_message', 'Nepakankamai pinigų operacijai įvykdyt.');

                }else{

                    $account->usd += $request->changefirst * $EURtoUSD;
                    $account->eur -= $request->changefirst;

                    $account->save();

                    return redirect()->route('account.change', [$account])->with('success_message', 'Operacija įvykdyda sėkmingai.');
                }

            }else if ($request->currency == 'usd' && $request->currency2 == 'eur'){

                if($account->usd < $request->changefirst){

                    return redirect()->route('account.change', [$account])->with('failure_message', 'Nepakankamai pinigų operacijai įvykdyt.');

                }else{

                    $account->usd -= $request->changefirst;
                    $account->eur += $request->changefirst * $USDtoEUR;

                    $account->save();

                    return redirect()->route('account.change', [$account])->with('success_message', 'Operacija įvykdyda sėkmingai.');
                }

            }else{
                return redirect()->route('account.change', [$account])->with('failure_message', 'Operacijos įvykdydi negalima.');
            }
        }else{

            return view('account.change', ['account' => $account]);
        }


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
