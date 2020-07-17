@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naujo vartotojo registracija:</div>
 
                <div class="card-body">

                    <form action="{{route('account.store')}}" method="post">

                        <div class="form-group">
                            <label>Vardas: </label>
                            <input class="form-control" type="text" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Pavarde: </label>
                            <input class="form-control" type="text" name="surname" required>
                        </div>

                        <div class="form-group">
                            <label> Saskaitos Numeris: </label>
                            <input class="form-control" type="text" name="account" required>
                        </div>

                        <div class="form-group">
                            <label> Asmens kodas: </label>
                            <input class="form-control" type="number" name="ak" required>
                        </div>

                        @csrf

                        <button type="submit" class="btn btn-primary">Prideti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection
 