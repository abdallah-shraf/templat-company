<?php

namespace App\Http\Controllers;


use App\Emplyee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $emp= Emplyee::all();
        return view("employee.index" , compact('emp'));
    }

    public function create()
    {
        return view("employee.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            'empName'=>'required|min:3|max:60',
            'empSalary'=>'required',

        ]);

        $emp=new Emplyee();
        $emp->name=$request->input('empName');
        $emp->salary = $request->input('empSalary');
        $img=$request->file('image_Data');
        $img_name=$img->getClientOriginalName();
        $img->move(public_path() . '/imgs/' , $img_name);
        $emp->Image=$img_name;

        $emp->save();
        return redirect('employee')->with("done","Done Insert To DataBase");

    }

    public function show($id)
    {

        $emp = Emplyee::find($id);
        return view('employee.show', compact('emp'));
    }

    public function edit($id)
    {
        $emp=Emplyee::find($id);


       return view('employee.edit', compact('emp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empName' => 'required|min:3|max:60',
            'empSalary' => 'required',
            'image_Data'=>'required'
        ]);

        $emp =Emplyee::find($id);
        $emp->name = $request->input('empName');
        $emp->salary = $request->input('empSalary');
        $img = $request->file('image_Data');
        $img_name = $img->getClientOriginalName();
        $img->move(public_path() . '/imgs/', $img_name);
        $emp->Image = $img_name;
        $emp->save();
        return redirect('employee')->with("done", "Done Ubdate To DataBase");

    }

    public function destroy($id)
    {
        $emp = Emplyee::find($id);
        $emp->delete();
        return redirect('employee')->with("done", "Done Delet To DataBase");

    }
}
