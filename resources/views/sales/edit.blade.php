@extends('layouts.app')

@section("content")
    <div class="container">
        <form id="add-sale" action="{{ route("sales.update",$sale->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/payments" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tables as $table)
                                    <div class="col-md-3">
                                        <div class="card p-3 mb-3 text-center table-card">
                                            <input type="checkbox" name="table_id[]"
                                                id="table{{ $table->id }}"
                                                checked
                                                value="{{ $table->id }}"
                                            >
                                            <i class="fas fa-chair fa-5x table-icon"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->name }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        @foreach($menus as $menu)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 menu-card">
                                    <div class="card-body text-center">
                                        <input type="checkbox" name="menu_id[]"
                                            id="menu{{ $menu->id }}"
                                            checked
                                            value="{{ $menu->id }}"
                                        >
                                        <img src="{{ asset("images/menus/". $menu->image) }}" alt="{{ $menu->title}}"
                                            class="img-fluid rounded-circle menu-image"
                                        >
                                        <h5 class="font-weight-bold mt-2 menu-title">
                                            {{ $menu->title }}
                                        </h5>
                                        <h5 class="text-muted menu-price">
                                            ₹{{ $menu->price }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <select name="servant_id" class="form-control">
                                    <option value="" selected disabled>Staff</option>
                                    @foreach ($servants as $servant)
                                        <option value="{{ $servant->id }}" {{ $servant->id === $sale->servant_id ? "selected" : "" }}>
                                            {{ $servant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Quantity</div>
                                </div>
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{ $sale->quantity }}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                                <input type="number" name="total_price" class="form-control" placeholder="Price" value="{{ $sale->total_price }}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                                <input type="number" name="total_received" class="form-control" placeholder="Total" value="{{ $sale->total_received }}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                                <input type="number" name="change" class="form-control" placeholder="Pending" value="{{ $sale->change }}">
                            </div>
                            <div class="form-group">
                                <select name="payment_type" class="form-control">
                                    <option value="" selected disabled>Mode Of Payment</option>
                                    <option value="cash" {{ $sale->payment_type === "cash" ? "selected" : "" }}>Cash</option>
                                    <option value="card" {{ $sale->payment_type === "card" ? "selected" : "" }}>Bank Card</option>
</select>
</div>
<div class="form-group">
<select name="payment_status" class="form-control">
<option value="" selected disabled>Payment status</option>
<option value="paid" {{ $sale->payment_status === "paid" ? "selected" : "" }}>Paid</option>
<option value="unpaid" {{ $sale->payment_status === "unpaid" ? "selected" : "" }}>Unpaid</option>
</select>
</div>
<div class="form-group">
<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('add-sale').submit();">Confirm</button>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
@endsection
