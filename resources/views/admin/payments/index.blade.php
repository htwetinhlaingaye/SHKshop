@extends('layouts.admin')
@section('content')
                    <div class="container-fluid px-4">
                        <div class=""my-3>
                            <h1 class="mt-4">Payment</h1>
                            <a href="{{route('backend.payments.create')}}" class="btn btn-primary float-end">Create Payment</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment</li>
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
                                            <th>name</th>
                                            <th>logo</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>name</th>
                                            <th>logo</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $i =1;
                                        @endphp
                                        @foreach($payments as $payment)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$payment->name}}</td>
                                            <td><img src="{{$payment->logo}}" width="60" height="100"  alt=""></td>
                                            <td>
                                                <a href="{{route('backend.payments.edit',$payment->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <button href="" class="btn btn-sm btn-danger delete" data-id="{{$payment->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$payments->links()}}
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
                // console.log(id);
                $('#deleteform').attr('action',`payments/${id}`);
                $('#deleteModal').modal('show');
                
            })
        })
    </script>
@endsection



