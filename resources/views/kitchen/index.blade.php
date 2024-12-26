@extends('layouts.app')

@section('content')
    <div class="container mt-4 container-index">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-flex flex-column flex-lg-row align-items-lg-center search-form-container">
                    <form action="{{ route('kitchen.index') }}" method="GET" class="d-flex flex-grow-1 mb-2 mb-lg-0 me-lg-2">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-dark ms-2">Search</button>
                    </form>
                    <a href="{{ route('kitchen.create') }}" class="btn btn-dark">New Item</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Current Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kitchens as $kitchen)
                        <tr>
                            <td>{{ $kitchen->id }}</td>
                            <td>{{ $kitchen->item_name }}</td>
                            <td>{{ $kitchen->current_quantity }}</td>
                            <td>@include('kitchen.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="d-flex align-items-center">
                <label for="per_page" class="me-2 mb-0 show-label">Row Limit:</label>
                <div class="me-3">
                    <select id="per_page" class="form-select" onchange="location = this.value;">
                        <option value="{{ route('kitchen.index', ['per_page' => 5]) }}" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
                        <option value="{{ route('kitchen.index', ['per_page' => 10]) }}" {{ request('per_page', 5) == 10 ? 'selected' : '' }}>10</option>
                        <option value="{{ route('kitchen.index', ['per_page' => 25]) }}" {{ request('per_page', 5) == 25 ? 'selected' : '' }}>25</option>
                        <option value="{{ route('kitchen.index', ['per_page' => 50]) }}" {{ request('per_page', 5) == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center">
                {{ $kitchens->links('vendor.pagination.bootstrap-5') }} <!-- Use your custom pagination view -->
            </div>
        </div>
    </div>
@endsection
