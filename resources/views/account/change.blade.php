@extends('layouts.app')

 @section('content')

 <div class="change-container">
    <div class="change-box">
        <p><img  src="https://www.seekpng.com/png/full/836-8364774_euro-flag-round-europe-flag.png" alt="EUR">1 EUR = <span id="EURtoUSD">{{number_format(App\Change::getEURtoUSD(), 4)}}</span>  USD <img class="usd"  src="http://yachtregistration.net/wp-content/uploads/2019/07/united_states_of_america_640.png" alt="USD"></p> 
        <p><img class="usd"  src="http://yachtregistration.net/wp-content/uploads/2019/07/united_states_of_america_640.png" alt="USD">1 USD = <span id="USDtoEUR">{{number_format(App\Change::getUSDtoEUR(), 4)}}</span>  EUR <img  src="https://www.seekpng.com/png/full/836-8364774_euro-flag-round-europe-flag.png" alt="EUR"></p>
        <p>Duomenys atnaujinti pries {{time() - session('timestamp')}}  sekundziu</p>
    </div>
</div>

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Prideti lesas {{$account->name}} {{$account->surname}}:</div>
 
                <div class="card-body">
                    <div class="table">
                        <div class="table-row table-row-main">
                            <div class="row-cell account-box">Saskaita</div>
                            <div class="row-cell ak-box">Asmens kodas</div>
                            <div class="row-cell eur-box">Eurai</div>
                            <div class="row-cell usd-box">Doleriai</div>
                            <div class="row-cell action-box">Veiksmai</div>
                        </div>

                        <div class="table-row">
                            <div class="row-cell account-box">{{$account->account}}</div>
                            <div class="row-cell ak-box">{{$account->ak}}</div>
                            <div class="row-cell name-box">{{$account->eur}}</div>
                            <div class="row-cell surname-box">{{$account->usd}}</div>
                            <div class="row-cell action-box count-box">
                                <form id="form" action="{{route('account.change', [$account])}}" method="post">
                                    
                                    <select class="form-control selector" id='select1' name="currency">
                                        <option name="eur-input" value="eur">EUR</option>
                                        <option name="usd-input" value="usd">USD</option>
                                    </select>

                                    <input class="form-control change-input" id="change-first" type="number" name="changefirst" step="0.01" min="0" placeholder="Iš">
                                    <br>
                                    <select class="form-control selector" id='select2' name="currency2">
                                        <option name="eur-input" value="eur">EUR</option>
                                        <option name="usd-input" value="usd">USD</option>
                                    </select>
                                    <input class="form-control change-input" id="change-second" type="number" name="changesecond" step="0.01" min="0" placeholder="Į" disabled>

                                    @csrf
                                    <button class="btn btn-secondary change" type="submit">Keisti</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 