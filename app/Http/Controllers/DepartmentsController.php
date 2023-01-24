<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Students;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    
    public function index()
    {
        $posts = Departments::all(); 
	    return view('departments.index', [
            'posts' => $posts,
        ]);
    }

    
    public function create()
    {
        return view('departments.create');
    }

   
    public function store(Request $request)
    {
        $newPost = Departments::create([
            'title' => $request->title,
        ]);

        return redirect('departments/');
    }

 

   
    public function destroy(Departments $departments)
    {   
        

        $students = Students::all();
        
        $student = Students::where('department_id', $departments['id']);
        
        $student->delete();
        $departments->delete();
        
       
        return redirect('/departments');
    }
}


