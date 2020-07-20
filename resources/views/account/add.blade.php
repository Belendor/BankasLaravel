@extends('layouts.app')

 @section('content')
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
                                <form id="form" action="{{route('account.add', [$account])}}" method="post">
                                    <input class="form-control" id="sum-input" type="number" name="sum" step="0.01" min="0">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Prideti Lesas</button>
                                    <select class="form-control" id='select1' name="currency">
                                        <option name="eur-input" value="eur">EUR</option>
                                        <option name="usd-input" value="usd">USD</option>
                                    </select>
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
 