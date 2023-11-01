@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12"> 
            <a href="{{ route("home") }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-home"></i> Home
                                </a>
                                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-2">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-bars"></i> Report
                                    </h3>
                                   
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mx-auto">
                                                <form action="{{ route("reports.generate") }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="from">Start Date</label>
                                                        <input type="date" name="from" id="from" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="to">End Date</label>
                                                        <input type="date" name="to" id="to" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary">
                                                            View Report
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @isset($total)
                                    <h4 class="text-primary mt-4 mb-3 font-weight-bold">
                                        Report from {{ $startDate }} to {{ $endDate }}
                                    </h4>
                                    <table class="table table-hover table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Menu</th>
                                                <th>Tables</th>
                                                <th>Staff Members</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{ $sale->id }}</td>
                                                    <td>
                                                        @foreach($sale->menus()->where("sales_id", $sale->id)->get() as $menu)
                                                            <div class="menu-item">
                                                                <h5>{{ $menu->title }}</h5>
                                                                <p>{{ $menu->price }} DH</p>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($sale->tables()->where("sales_id", $sale->id)->get() as $table)
                                                            <div class="table-item">
                                                                <h5>{{ $table->name }}</h5>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $sale->servant->name }}</td>
                                                    <td>{{ $sale->quantity }}</td>
                                                    <td>{{ $sale->total_received }}</td>
                                                    <td>{{ $sale->payment_type === "cash" ? "Cash" : "Bank card" }}</td>
                                                    <td>{{ $sale->payment_status === "paid" ? "Paid" : "Unpaid" }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="text-danger text-center font-weight-bold">
                                        Total: {{ $total }} DH
                                    </p>
                                    <form action="{{ route("reports.export") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="from" value="{{ $startDate }}">
                                        <input type="hidden" name="to" value="{{ $endDate }}">
                                        <div class="text-center mt-3">
                                            <button class="btn btn-danger">
                                                Generate the Excel Report
                                            </button>
                                        </div>
                                    </form>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
