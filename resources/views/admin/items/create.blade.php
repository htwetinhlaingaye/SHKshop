@extends('layouts.admin')
@section('content')

        <div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Items</h3>
                <a href="{{route('backend.items.create')}}" class="btn btn-primary float-end">Create Item</a>
            </div>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="posts.php">Items</a></li>
                <li class="breadcrumb-item active">Items</li>

            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Posts list
                </div>
                <div class="card-body">
                    <form action="{{route('backend.items.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code_no" class="form-label ">Code No</label>
                            <input type="text" class="form-control @error('code_no') is-invalid @enderror" id="title" name="code_no" value="{{old('code_no')}}">
                            @error('code_no')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control form-control form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control form-control form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control form-control form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{old('description')}}">
                            @error('discount')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="InStock">InStock</label>
                            <select class="form-select form-control form-control @error('in_stock') is-invalid @enderror" id="InStock" name="in_stock" value="{{old('in_stock')}}">
                                <option value="yes">Yes</option>> 
                                <option value="no">No</option>
                            </select>
                            @error('in_stock')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select class="form-select form-control form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category) 
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id?'selected':''}}>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" accept="image/*" class="form-control @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message}}</div>
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