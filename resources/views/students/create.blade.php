@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/students" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Register a New Student</h1>
                    <p>Fill and submit this form to register a student</p>

                    <hr>

                    @if(session()->has('warningMsg'))
                        <div class="alert alert-warning">
                            {{ session()->get('warningMsg') }}
                        </div>
                    @endif



                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                        
                                                                      
                    
                        <label for="cars">Choose a department: </label>

                        <select name="departments" id="departments">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{ ucfirst($department->title) }}</option>
                            @endforeach
                        </select> 
                            <div class="control-group col-12">
                                <label for="title">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter Name" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="surname">Surname</label>
                                <input type="text" id="surname" class="form-control" name="surname"
                                       placeholder="Enter Surname" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="student_number">Student Number</label>
                                <input type="number" id="student_number" class="form-control" name="student_number"
                                       placeholder="Enter Student Number" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="country">Country</label>
                                <input type="text" id="country" class="form-control" name="country"
                                       placeholder="Enter Country" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" class="form-control" name="email"
                                       placeholder="Enter E-mail" required>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Register 
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection