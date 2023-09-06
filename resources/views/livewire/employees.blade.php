<div class="container mt-5">
    <h1 class="text-danger text-center mb-5 border-bottom border-danger">Livewire CRUD</h1>
    <div class="row">
        <div class="col-md-4">
            <form class="form" wire:submit.prevent={{ $edit ? 'updateEmployee' : 'saveEmployee' }}>
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 text-primary">{{ $edit ? 'Update Employee' : 'Enter Employee Details' }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="first-name"><strong>First Name:</strong></label>
                            <input type="text" wire:model="first_name" id="first-name" class="form-control"
                                placeholder="Enter first name ...">
                            <div>
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="first-name"><strong>Last Name:</strong></label>
                            <input type="text" id="first-name" class="form-control" placeholder="Enter last name ..."
                                wire:model="last_name">
                            <div>
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="first-name"><strong>Phone:</strong></label>
                            <input type="text" id="first-name" class="form-control" placeholder="Enter phone ..."
                                wire:model="phone">
                            <div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-end">
                        <div class="form-check form-switch me-3">
                            <input wire:model="status" type="checkbox" class="form-check-input" id="status">
                            <label for="status" class="form-check-label">Active?</label>
                            <div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-outline-success">{{ $edit ? 'Update' : 'Save Details' }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="car-header bg-primary text-white">
                    <h4 class="card-title mb-0 p-2">All Employees</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $emp)
                                <tr>
                                    <td>{{ $emp->id }}</td>
                                    <td>{{ $emp->first_name }}</td>
                                    <td>{{ $emp->last_name }}</td>
                                    <td>{{ $emp->phone }}</td>
                                    <td><span
                                            class="badge  {{ $emp->status ? 'bg-success' : 'bg-secondary' }}">{{ $emp->status ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            wire:click='editEmp({{ $emp->id }})'>Edit</button>
                                        <button type="button" onclick="confirm('Are you sure you want to delete this employee??')  || event.stopImmediatePropagation()" wire:click='deleteEmp({{$emp->id}})' class="btn btn-danger">Delete</button>
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
