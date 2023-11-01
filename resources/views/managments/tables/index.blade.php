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
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-3">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-chair"></i> Tables
                                    </h3>
                                    <a href="{{ route("tables.create") }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add Table
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Available</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tables as $table)
                                            <tr>
                                                <td>{{ $table->id }}</td>
                                                <td>{{ $table->name }}</td>
                                                <td>
                                                    @if ($table->status)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route("tables.edit", $table->slug) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="{{ $table->id }}" action="{{ route("tables.destroy", $table->slug) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="event.preventDefault(); if (confirm('Do you want to delete table {{ $table->name }}?')) document.getElementById({{ $table->id }}).submit();"
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
                                    {{ $tables->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
