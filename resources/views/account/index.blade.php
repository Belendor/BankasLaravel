@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <div class="row-cell action-box">
                                    <form action="{{route('account.destroy', [$account])}}" method="post">
                                        <button class="d-block btn btn-danger" type="submit">Delete <i class="icon-trash"></i></button>
                                        @csrf
                                    </form>
                                    <form action="{{route('account.add', [$account])}}" method="get">
                                        <button class="d-block btn btn-success" type="submit">Add <i class="icon-plus"></i></button>
                                        @csrf
                                    </form>
                                    <form action="{{route('account.subtract', [$account])}}" method="get">
                                        <button class="d-block btn btn-warning" type="submit">Subtract <i class="icon-minus"></i></button>
                                        @csrf
                                    </form>
                                    <form action="{{route('account.change', [$account])}}" method="get">
                                        <button class="btn btn-secondary" type="submit">Change <i class="icon-usd"></i></button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 