@extends('layouts.app')

@section('content')

    <div class="container p-4">
        <img src="/img/ava.jpg" alt="" class="img-rounded mb-4">
        
        <h3>
            <b>Hi, Anindya!</b>
        </h3>
        <p>
            Have a nice day
            <br>
            {{date('d M Y')}}
        </p>

        <div class="mt-4 mb-4">

            <a href="/" class="btn btn-default border">
                All
            </a>
            @foreach ($category as $row_category)
                <a class="btn btn-sm {{$row_category->btn}}" href="/?category={{$row_category->id}}">
                    {{$row_category->name}}
                </a>
            @endforeach
            
        </div>

        <hr>

        <div class="mt-4 mb-4 text-dark">
                <a href="{{route('todo.create')}}" class="btn btn-block btn-success text-white mb-2">
                    + Add New
                </a>

                @foreach ($todo as $row_todo)
                    
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>
                                            <strong>
                                                {{$row_todo->name}}
                                            </strong>
                                            <p>
                                                {{$row_todo->description}}
                                            </p>
                                        </h5>
                                    </div>
                                    <div class="col-6 text-right">
                                        
                                        <form action="{{route('todo.destroy',$row_todo->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{route('todo.edit',$row_todo->id)}}" class="btn btn-warning btn-sm text-white">Edit</a>
                                                <button class="btn btn-danger btn-sm">
                                                        Delete
                                                </button>
                                        </form>

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!!$row_todo->category ? $row_todo->category->name : "" !!}
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        {{$row_todo->getStatus()}}
                                    </div>

                                </div>
                    
                            </div>
                        </div>
                   
                @endforeach

                {{ $todo->appends(\Request::query())->links() }}

                @if($todo->count() < 1)
                    Data is empty
                @endif
            
        </div>



    </div>

@endsection