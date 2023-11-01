@extends('layouts.app')

@section("content")
    <div class="container">
        <!-- Home button outside the main content div -->
        <a href="{{ route("home") }}" class="btn btn-secondary my-3">
            <i class="fas fa-home"></i> Home
        </a>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-users-cog"></i> Staffs
                                    </h3>
                                    <a href="{{ route("servants.create") }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add Staff
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servants as $servant)
                                            <tr>
                                                <td>{{ $servant->id }}</td>
                                                <td>{{ $servant->name }}</td>
                                                <td>
                                                    @if ($servant->address)
                                                        {{ $servant->address }}
                                                    @else
                                                        <span class="text-danger">Not available</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ route("servants.edit", $servant->id) }}" class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="delete-form-{{ $servant->id }}" action="{{ route("servants.destroy", $servant->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="deleteServant({{ $servant->id }});"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $servants->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    <script>
        function deleteServant(servantId) {
            if (confirm('Do you want to delete this servant?')) {
                document.getElementById('delete-form-' + servantId).submit();
            }
        }
    </script>
@endsection
