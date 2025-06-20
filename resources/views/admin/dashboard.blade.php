@extends('layouts.admin-mainlayout')

@section('page-title', 'Dashboard')
@section('page-pagination', 'Dashboard')

@section('page-section')
    <section class="section">
        <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Vertical Navbar</h4>
                </div>
                <div class="card-body">
                    <p>Vertical Navbar is a layout option that you can use with Mazer. </p>

                    <p>In case you want the navbar to be sticky on top while scrolling, add <code>.navbar-fixed</code> class alongside with <code>.layout-navbar</code> class.</p>
                </div>
            </div>
        </section>
@endsection