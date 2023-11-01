@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <a href="{{ route("payments.index") }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-left"></i> Back
                                </a>
                                <br>
                                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-3">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-credit-card"></i> Sales
                                    </h3>
                                    <a href="{{ route("payments.index") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Menu</th>
                                                <th>Tables</th>
                                                <th>Staff Members</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Payment Type</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{ $sale->id }}</td>
                                                    <td>
                                                        @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                                                            <div class="menu-item">
                                                                <img src="{{ asset("images/menus/". $menu->image) }}" alt="{{ $menu->title}}" class="menu-item-image">
                                                                <div class="menu-item-details">
                                                                    <h5 class="menu-item-title">{{ $menu->title }}</h5>
                                                                    <p class="menu-item-price">{{ $menu->price }} DH</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                                                            <div class="table-item">
                                                                <i class="fa fa-chair"></i>
                                                                <p class="table-name">{{ $table->name }}</p>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $sale->servant->name }}</td>
                                                    <td>{{ $sale->quantity }}</td>
                                                    <td>{{ $sale->total_received }}</td>
                                                    <td>{{ $sale->payment_type === "cash" ? "Cash" : "Bank Card" }}</td>
                                                    <td>{{ $sale->payment_status === "paid" ? "Paid" : "Unpaid" }}</td>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <a href="{{ route("sales.edit", $sale->id) }}" class="btn btn-warning mr-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form id="{{ $sale->id }}" action="{{ route("sales.destroy", $sale->id) }}" method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button onclick="event.preventDefault(); if(confirm('Voulez-vous supprimer la vente {{ $sale->id }} ?')) document.getElementById({{ $sale->id }}).submit()" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
