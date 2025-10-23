@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
    <h1>Forgot Password</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Forgot Password</h5>
                    @if(!$errors->isEmpty())
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Forgot Password</button>
                        </div>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection('content')