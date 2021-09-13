<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('role','employee');
        return view('employee.index',compact('users'));
        /* $employees = User::all()->where('roll','employee');
        return view('employee.index',compact('employees')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|alphaNum|min:8'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'mobile_no' => $request->get('mobile_no'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password'))
        ]);

        $user->save();
        return redirect()->route('employees.index')->with('success','Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('employee.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('employee.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('employees.index')->with('success','Employee deleted successfully');
    }

    function reset(){
        return view('reset');
    }

    function restore(Request $request){
        $this->validate($request, [
            'current_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);

        if(!Hash::check($data['current_password'], $user->password))
        {
            return back()->with('error','The specified password does not match the database password');
        }

        else{
            $user -> password = Hash::make($data['new_password']);
            $user->save();  
            return view('dashboard.employee');
        }
    }
}
