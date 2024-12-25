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
                    <form action="{{route('backend.payments.update',$payment->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$payment->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="true">Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image" type="button" role="tab" aria-controls="new_image" aria-selected="false">New Image</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                                <img src="{{$payment->logo}}" class="w-35 h-35 my-3" alt="">
                                <input type="hidden" name="old-image" value="{{$payment->logo}}">
                            </div>
                            <div class="tab-pane fade" id="new_image" role="tabpanel" aria-labelledby="new_image-tab">
                            <input type="file" class="form-control  @error('logo') is-invalid @enderror my-3" accept="image/*" id="logo" name="logo" value="{{old('logo')}}">
                            </div>
                        </div>
                           
                            @error('logo')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection