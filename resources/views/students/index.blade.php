@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Student Control Panel</h1>  
                    </div>
                    <div class="col-4">
                        <a href="/students/create/post" class="btn btn-primary btn-sm">Add Student</a>
                        <a href="/departments" class="btn btn-primary btn-sm" >Department Panel</a>
                    </div>
                    <br><br><br>
                </div>         
                <div>       
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                         <th scope="col">Name</th>
                         <th scope="col">Surname</th>
                         <th scope="col">Student Number</th>
                         <th scope="col">Country</th>
                         <th scope="col">E-mail</th>
                         <th scope="col">Department</th>
                         <th scope="col">Edit</th>
                         <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                         <td class="align-middle">{{ucfirst($post->name) }}</td>
                         <td class="align-middle">{{ucfirst($post->surname) }}</td>
                         <td class="align-middle">{{ucfirst($post->student_number) }}</td>
                         <td class="align-middle">{{ucfirst($post->country) }}</td>
                         <td class="align-middle">{{ucfirst($post->email) }}</td>
                         <td class="align-middle">{{ucfirst($post->department->title)}}</td>
                         <td class="align-middle"><a href="/students/edit/{{ $post->id }}" class = "btn btn-danger">Edit</a></td>
                         <td class="align-middle">
                            <form action="/students/delete/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button></form>
                        </td>
                        
                        </tr>
                        @empty
                    <p class="text-warning">There is no registration, please create a department and student registration</p>
                @endforelse
                    </tbody>
                </table>
                
                
                </div>
            </div>
        </div>
    </div>
@endsection