@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Vartotoju sarasas:</div>
 
                <div class="card-body">
                    <div class="table">
                        <div class="table-row table-row-main">
                            <div class="row-cell name-box">Vardas</div>
                            <div class="row-cell surname-box">Pavarde</div>
                            <div class="row-cell account-box">Saskaita</div>
                            <div class="row-cell ak-box">Asmens kodas</div>
                            <div class="row-cell action-box">Veiksmai</div>
                        </div>
                        @foreach ($accounts as $account)

                            <div class="table-row">
                                <div class="row-cell name-box">{{$account->name}}</div>
                                <div class="row-cell surname-box">{{$account->surname}}</div>
                                <div class="row-cell account-box">{{$account->account}}</div>
                                <div class="row-cell ak-box">{{$account->ak}}</div>
                                <div class="row-cell action-box">Delete | ADD | REDUCE</div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 