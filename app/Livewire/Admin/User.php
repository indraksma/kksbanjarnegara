<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    protected $listeners = ['editData', 'deleteData', 'refresh' => '$refresh'];
    public $user_id, $name, $email, $password, $role_id, $delete_id, $role, $reqpassword = FALSE;

    public function mount()
    {
        $this->role = Role::all();
    }

    public function render()
    {
        return view('livewire.admin.user')->extends('components.layouts.dashboard');
    }

    public function closeModal()
    {
        $this->reset(['user_id', 'name', 'email', 'password', 'role_id', 'delete_id']);
        $this->reqpassword = FALSE;
    }

    public function addUser()
    {
        $this->reqpassword = TRUE;
        $this->dispatch('openModalData');
    }

    public function editData($id)
    {
        $this->dispatch('openModalData');
        $data = UserModel::find($id);
        $this->user_id = $id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->role_id = $data->roles->pluck('name')->first();
        $this->reqpassword = FALSE;
    }

    public function store()
    {
        if ($this->password) {
            $password = Hash::make($this->password);
            $data = UserModel::updateOrCreate(['id' => $this->user_id], [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $password,
            ]);
        } else {
            $data = UserModel::updateOrCreate(['id' => $this->user_id], [
                'name' => $this->name,
                'email' => $this->email,
            ]);
        }
        $data->syncRoles($this->role_id);

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Success!',
            message: 'Data berhasil disimpan!',
            toast: false
        );


        $this->closeModal();
        $this->dispatch('refreshTable')->to('user-table');
        $this->dispatch('closeModalData');
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        $user = UserModel::findorFail($this->delete_id);
        $user->delete();

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Success!',
            message: 'Data berhasil dihapus!',
            toast: false
        );


        $this->closeModal();
        $this->dispatch('refreshTable')->to('user-table');
        $this->dispatch('closeModalDelete');
    }
}
