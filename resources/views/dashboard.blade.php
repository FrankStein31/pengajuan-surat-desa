@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        Selamat datang, <strong>{{ auth()->user()->name }}</strong>!
    </div>

    <div class="row">
        <!-- Card Data Users -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Pengguna</div>
                <div class="card-body">
                    <h3 class="card-title">100</h3>
                </div>
            </div>
        </div>

        <!-- Card Data Surat -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Surat Diajukan</div>
                <div class="card-body">
                    <h3 class="card-title">250</h3>
                </div>
            </div>
        </div>

        <!-- Card Data Surat Disetujui -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Surat Disetujui</div>
                <div class="card-body">
                    <h3 class="card-title">150</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
