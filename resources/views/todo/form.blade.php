@extends('layouts.app')

@section('content')

    <div class="container p-4">
        <form  method="POST" action="@if(!$data->exists) {{route('todo.store')}} @else {{route('todo.update',$data->id)}} @endif">
            @csrf
            @if(!$data->exists) 
                @method('POST') 
                <h5>
                    <strong>New Data</strong>
                </h5>
            @else 
                @method('PUT') 
                <h5>
                    <strong>Edit Data {{$data->name}}</strong>
                </h5>
            @endif
            <br>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" required autocomplete="off" name="name" value="{{old('name',$data->name)}}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control">{!!old('description',$data->description)!!}</textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-control form-control-sm" required>
                    @foreach($category as $category_row)
                        <option @if($data->exists && $data->category_id == $category_row->id) selected @endif value="{{$category_row->id}}">
                            {{$category_row->name}}
                        </option>
                    @endforeach
                </select>

            </div>
            
            @if($data->exists) 
                
                <label for="">Status</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="status_0" name="status" class="custom-control-input" value="0" @if($data->status == 0) checked @endif>
                    <label class="custom-control-label" for="status_0">Pending</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="status_1" name="status" class="custom-control-input" value="1" @if($data->status == 1) checked @endif>
                    <label class="custom-control-label" for="status_1">Progress</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="status_2" name="status" class="custom-control-input" value="2" @if($data->status == 2) checked @endif>
                    <label class="custom-control-label" for="status_2">Done</label>
                </div>
                <br>
                Created at : {{date('d M Y H:i:s', strtotime($data->created_at))}}
                <br> <br>
            @endif



            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-success">Save Data</button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-block btn-danger">Reset Data</button>
                </div>
            </div>


        </form>
    </div>

@endsection