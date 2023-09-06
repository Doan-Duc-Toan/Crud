<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Employee;

class Employees extends Component
{
    #[Rule('required|string')]
    public $first_name;
    #[Rule('required|string')]
    public $last_name;
    #[Rule('required|string')]
    public $phone;
    #[Rule('nullable')]
    public $status = 0;
    public $emp_id;
    public $edit = false;
    public function saveEmployee()
    {
        $validate = $this->validate();
        Employee::create($validate);
        $this->reset('first_name', 'last_name', 'status', 'phone');
        session()->flash('message', 'Employee saved successfully');
    }
    public function editEmp($id)
    {
        $this->emp_id = $id;
        $this->edit = true;
        $emp = Employee::find($id);
        $this->first_name = $emp->first_name;
        $this->last_name = $emp->last_name;
        $this->phone = $emp->phone;
        $this->status = $emp->status;
    }
    public function updateEmployee()
    {
        $validate = $this->validate();
        $emp = Employee::find($this->emp_id);
        $emp->update($validate);
        $this->reset('first_name', 'last_name', 'status', 'phone', 'edit', 'emp_id');
        session()->flash('message', 'Employee updated successfully');
    }
   
    public function deleteEmp($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee deleted successfully');
        $this->dispatch('hide:modal');
    }
    public function render()
    {
        $employees = Employee::all();
        return view('livewire.employees', compact('employees'));
    }
}
