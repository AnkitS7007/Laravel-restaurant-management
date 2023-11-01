@extends('layouts.app')

@section("content")
    <div class="container">
        <!-- Home or Back button outside the main content div -->
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
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-th-list"></i> Categories
                                    </h3>
                                    <a href="{{ route("categories.create") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-lg"></i> Add Category
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>
                                                    {{ $category->title }}
                                                </td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ route("categories.edit", $category->slug) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="deleteCategory{{ $category->id }}" action="{{ route("categories.destroy", $category->slug) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="if (confirm('Are you sure you want to delete the category {{ $category->title }}?')) document.getElementById('deleteCategory{{ $category->id }}').submit()"
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
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
