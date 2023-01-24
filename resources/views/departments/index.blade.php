@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Departments Panel</h1>
                        
                    </div>
                    <div class="col-4">
                        <p>Create new Departments</p>
                        <a href="/departments/create/post" class="btn btn-primary btn-sm">Add Department</a>
                        <a href="/students" class="btn btn-primary btn-sm">Student Control Panel</a>
                    </div>
                    <br><br>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                         <th scope="col">Departments</th>
                         <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                         <td class="align-middle">{{ ucfirst($post->title) }}</td>
                         <td class="align-middle">
                            <form action="/departments/delete/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                               <div class="justify-content=md-end"> <button type="submit" class="btn btn-danger">Delete</button></div>
                            </form>
                        </td>
                        </tr>
                        @empty
                        <p class="text-warning">There is no department</p>
                        @endforelse
                    </tbody>
                    </table>
                    </div>                
                
            </div>
        </div>
    </div>
@endsection