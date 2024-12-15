@extends('layouts.admin')
@section('content')
                    <div class="container-fluid px-4">
                        <div class=""my-3>
                            <h1 class="mt-4">Items</h1>
                            <a href="{{route('backend.items.create')}}" class="btn btn-primary float-end">Create Item</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Items</li>
                        </ol>         
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>CodeNo</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>InStock</th>
                                            <th>Category</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>CodeNo</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>InStock</th>
                                            <th>Category</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $i =1;
                                        @endphp
                                        @foreach($items as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->code_no}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->in_stock}}</td>
                                            <td>{{$item->category_id}}</td>
                                            <td>
                                                <a href="{{route('backend.items.edit',$item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{$item->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$items->links()}}
                            </div>
                        </div>
                    </div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" id="deleteform" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('tbody').on('click','.delete',function(){
                // alert('hello');
                let id = $(this).data('id');
                $('#deleteform').attr('action',`items/${id}`);
                $('#deleteModal').modal('show');
                // console.log(id);
                
            })
        })
    </script>
@endsection
