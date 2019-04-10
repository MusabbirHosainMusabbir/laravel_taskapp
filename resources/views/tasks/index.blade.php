@extends('layouts.master')

@section('contant')

<div class="row mt-5">
    <div class="col-md-6">
           {{--  @if ($errors->any())

           @foreach ($errors->all() as $error)
               <div class="alert alert-danger">
                   {{$error}}
               </div>
           @endforeach
        
           @endif  --}}

           @if (session()->has('massage'))

           <div class="alert alert-success">
               {{session()->get('massage')}}
            
           </div>
               
           @endif

        <div class="card">
        <div class="card">
            <div class="card-header">
              Add  Task
            </div>
            <div class="card-body">
                <form action="{{ route('task.create') }}" method="POST">
          @csrf

              <div class="form-group">
                  <label for="task">Task</label>
                  <input id="task" class="form-control {{ $errors->has('title') ? 'is-invalid':''}}" type="text" name="title" placeholder="Task">
                                <div class = "invalid-feedback">
                        {{ $errors->has('title') ? $errors->first('title') : '' }}
                    </div>
              </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                </form>
            </div>
        </div>
        </div>
    </div>
</div>
    


<div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
        <div class="card">
            <div class="card-header">
             Show Task
            </div>
            <div class="card-body">
           <table class="table table-bordered">
               <tbody>
                   <tr>
                       <td>Task</td>
                       <td style="width:2em;" >Action</td>
                   </tr>
@foreach ($tasks as $task)

                      <tr>
                       <td>{{$task->title}}</td>


                    <td>  
                   <form method="post" action="{{route('task.destroy',$task->id)}}">
                        @csrf
                        @method('delete')        
                        
                    <button type="submit" class = "btn btn-danger"> Delete </button>
                        </form> 
                     </td>
                   </tr>
                       
@endforeach
               </tbody>
           </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection