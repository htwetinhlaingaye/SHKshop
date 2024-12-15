@extends('layouts.admin')
@section('content')

        <div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Payments</h3>
                <a href="{{route('backend.payments.create')}}" class="btn btn-primary float-end">Create Payment</a>
            </div>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="posts.php">Payments</a></li>
                <li class="breadcrumb-item active">Pyaments</li>

            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Payment list
                </div>
                <div class="card-body">
                    <form action="{{route('backend.payments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control  @error('logo') is-invalid @enderror" accept="image/*" id="logo" name="logo" value="{{old('logo')}}">
                            @error('logo')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection