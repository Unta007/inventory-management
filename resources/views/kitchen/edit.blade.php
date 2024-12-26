@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('kitchen.update', ['kitchen' => $kitchen->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Kitchen</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="item_name" class="form-label">Item Name</label>
                            <input class="form-control @error('item_name') is-invalid @enderror" type="text"
                                name="item_name" id="item_name"
                                value="{{ $errors->any() ? old('item_name') : $kitchen->item_name }}"
                                placeholder="Enter Item Name">
                            @error('item_name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="current_quantity" class="form-label">Current Quantity</label>
                            <input class="form-control @error('current_quantity') is-invalid @enderror" type="text"
                                name="current_quantity" id="current_quantity"
                                value="{{ $errors->any() ? old('current_quantity') : $kitchen->current_quantity }}"
                                placeholder="Enter Current Quantity">
                            @error('current_quantity')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('kitchen.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@vite('resources/js/app.js')
</body>
</html>
