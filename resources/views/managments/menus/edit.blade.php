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
                                    <i class="fas fa-edit"></i> Modify the Menu: {{ $menu->title }}
                                </h3>
                                <form action="{{ route("menus.update", $menu->slug) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            class="form-control"
                                            placeholder="Title"
                                            value="{{ $menu->title }}"
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
                                        >{{ $menu->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price (₹)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="price-addon">₹</span>
                                            </div>
                                            <input
                                                type="number"
                                                name="price"
                                                class="form-control"
                                                placeholder="Price"
                                                value="{{ $menu->price }}"
                                                aria-describedby="price-addon"
                                                required
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Current Image</label>
                                        <div class="my-2">
                                            <img src="{{ asset("images/menus/".$menu->image) }}"
                                                width="200"
                                                height="200"
                                                class="img-fluid"
                                                alt="{{ $menu->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-image">New Image (2MB max)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    name="image"
                                                    id="new-image"
                                                    class="custom-file-input"
                                                >
                                                <label class="custom-file-label">
                                                    Choose a new image
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select
                                            name="category_id"
                                            id="category_id"
                                            class="form-control"
                                            required
                                        >
                                            <option value="" disabled>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"
                                                    {{ $category->id === $menu->category->id ? "selected" : "" }}
                                                >
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Save Changes
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
