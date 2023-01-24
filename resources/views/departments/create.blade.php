@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/departments" class="btn btn-outline-primary btn-sm">Departments Panel</a>
                
                
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Department</h1>
                    

                    <hr>

            

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-md-9">
                                <label class="col-md-3" for="title">Department Name:</label>
                                <input class="col-md-6" type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Department Name" required>
                            </div>
                        
                        
                        
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Department
                                </button>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection