@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"></i> Add a Menu
                                </h3>
                                <form action="{{ route("menus.store") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            class="form-control"
                                            placeholder="Title"
                                            required
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea
                                            name="description"
                                            id="description"
                                            rows="5"
                                            class="form-control"
                                            placeholder="Description"
                                            required
                                        ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price (₹)</label>
                                        <input
                                            type="number"
                                            name="price"
                                            id="price"
                                            class="form-control"
                                            placeholder="Price"
                                            required
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image (2MB max)</label>
                                        <input
                                            type="file"
                                            name="image"
                                            id="image"
                                            class="form-control-file"
                                            required
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="" disabled selected>Choose a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Confirm
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
