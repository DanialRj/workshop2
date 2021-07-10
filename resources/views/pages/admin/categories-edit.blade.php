@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-10">
                        <b>{{ __('Categories Edit Page') }}</b>
                    </div>
                    <div class="col-md-2 float-right">
                        <a href="{{ route('admin.categories') }}" class="btn btn-danger btn-sm">Cancel</a>
                     </div>
                  </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.categories.edit', $category->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Category Name" value="{{ $category->name }}">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
