<table>
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
        <tr>
            <td colspan="5">Report of {{ $from }} to {{ $to }}</td>
            <td>{{ $total }} DH</td>
        </tr>
    </tbody>
</table>
