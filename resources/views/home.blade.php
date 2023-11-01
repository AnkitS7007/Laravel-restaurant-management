@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-sm-4 mb-4">
                            <i class="fa fa-cog fa-5x text-danger" aria-hidden="true"></i>
                            <h3 class="mt-3">Manage Restaurant</h3>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">
                                Get Started
                            </a>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <i class="fa fa-shopping-bag fa-5x text-primary" aria-hidden="true"></i>
                            <h3 class="mt-3">Sales Info</h3>
                            <a href="{{ route('payments.index') }}" class="btn btn-success btn-lg">
                                Explore Sales
                            </a>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <i class="fa fa-clipboard-list fa-5x text-success" aria-hidden="true"></i>
                            <h3 class="mt-3">Reports</h3>
                            <a href="{{ route('reports.index') }}" class="btn btn-info btn-lg">
                                View Reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="fixed-bottom">
    <div class="container">
        <p class="copyright">&copy; {{ date('Y') }} Restaurant Management System. All rights reserved.</p>
    </div>
</footer>

<style>
    footer {
        text-align: center;
        background-color: #333;
        color: #fff;
        padding: 10px 0;
    }

    .copyright {
        font-size: 12px;
    }

    body {
        overflow-x: hidden; /* Hide horizontal scrollbar */
    }
</style>
@endsection
