@extends('layouts.app')

@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Barang Masuk
                </h1>
            </div>
        </div>
    </section>

    <barang-masuk-edit :id="{{ $id }}"/>
@endsection
