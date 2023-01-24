<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Departments;

class StudentsController extends Controller
{

    public function index()
    {
        $posts = Students::all(); 
	    return view('students.index', [
            'posts' => $posts,
        ]);
    }

   
    public function create()
    {   
        $departments = Departments::all(); 
	    
        return view('students.create',[
            'departments' => $departments,
        ]);
    }

   
    public function store(Request $request)
    {   

        $len = strval($request->student_number);
        $stringLength = Str::length($len);
        if (Students::where('student_number', $request->student_number )->exists()) {   
            return redirect('/students/create/post')->with('warningMsg', 'This student number has already been registered!!');
            

        } 
        elseif(Students::where('email', $request->email )->exists()){
            return redirect('/students/create/post')->with('warningMsg', 'This E-mail address has already been registered!!');
            

        }
        elseif($stringLength > 8 || $stringLength < 8){
            return redirect('/students/create/post')->with('warningMsg', 'The student number must be 8 characters!!');
        }
        else {
       
        $newPost = Students::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'student_number' => $request->student_number,
            'country' => $request->country,
            'email' => $request->email,
            'department_id' => $request->input('departments')
        ]);

        return redirect('students/');
        }

    }


    
   
    public function edit(Students $students)
    {   
        $GLOBALS = $students["student_number"];
        $departments = Departments::all(); 
        return view('students.edit', [
            'post' => $students,
            'departments' => $departments,
            ]);
    }

    
    public function update(Request $request, Students $students)
    {   
        $std = strval($students['id']);
        $len = strval($request->student_number);
        $stringLength = Str::length($len);
        
        $tmp1= $students->student_number;
        $tmp2= $students->email;
        $tmp3=$students->name;
        $tmp4=$students->surname;
        $tmp5=$students->country;
        $tmp6=$students->department_id;
        $students->update([
        'name' => strval($tmp3),
        'surname' => strval($tmp4),
        'student_number' => '00000000',
        'country' => strval($tmp5),
        'email' => '#@gm.com',
        'department_id' => strval($tmp6)]);

        function tmp($students,$tmp1,$tmp2,$tmp3,$tmp4,$tmp5,$tmp6){
            return $students->update([
                'name' => strval($tmp3),
                'surname' => strval($tmp4),
                'student_number' => strval($tmp1),
                'country' => strval($tmp5),
                'email' => strval($tmp2),
                'department_id' => strval($tmp6)]); 
        }


        if (Students::where('student_number', $request->student_number )->exists()){
            tmp($students,$tmp1,$tmp2,$tmp3,$tmp4,$tmp5,$tmp6);
            return redirect('/students/edit/'.$std)->with('warningMsg', 'This student number has already been registered!!');
            

        } 
        elseif(Students::where('email', $request->email )->exists()){
            tmp($students,$tmp1,$tmp2,$tmp3,$tmp4,$tmp5,$tmp6);
            return redirect('/students/edit/'.$std)->with('warningMsg', 'This E-mail address has already been registered!!');
        }
        elseif($stringLength > 8 || $stringLength < 8){
            tmp($students,$tmp1,$tmp2,$tmp3,$tmp4,$tmp5,$tmp6);
            return redirect('/students/edit/'.$std)->with('warningMsg', 'The student number must be 8 characters!!');
        }
        else {
        tmp($students,$tmp1,$tmp2,$tmp3,$tmp4,$tmp5,$tmp6);
        $students->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'student_number' => $request->student_number,
            'country' => $request->country,
            'email' => $request->email,
            'department_id' => $request->input('departments')
        ]);

        return redirect('students/');
        }
    }


    public function destroy(Students $students)
    {
        $students->delete();

        return redirect('/students');
    }
}
