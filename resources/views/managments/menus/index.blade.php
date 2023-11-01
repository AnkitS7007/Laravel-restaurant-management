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
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-clipboard-list"></i> Menu
                                    </h3>
                                    <a href="{{ route("menus.create") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i> Add Menu
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>
                                                    {{ $menu->id }}
                                                </td>
                                                <td>
                                                    {{ $menu->title }}
                                                </td>
                                                <td>
                                                    {{ \Illuminate\Support\Str::limit($menu->description, 100) }}
                                                </td>
                                                <td>
                                                    {{ number_format($menu->price, 2) }} DH
                                                </td>
                                                <td>
                                                    {{ $menu->category->title }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset("images/menus/" . $menu->image) }}" alt="{{ $menu->title }}"
                                                        class="img-fluid rounded" width="60" height="60">
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route("menus.edit", $menu->slug) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $menu->id }}" action="{{ route("menus.destroy", $menu->slug) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Are you sure you want to delete the menu: {{ $menu->title }}?'))
                                                                document.getElementById({{ $menu->id }}).submit()
                                                            "
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $menus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
