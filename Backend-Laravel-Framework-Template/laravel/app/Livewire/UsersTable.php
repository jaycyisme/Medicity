<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $users_deleted;
    public function mount() {
        $this->users_deleted = User::onlyTrashed()->get();
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrfail($id);

        $user->restore();

        return redirect()->route('users.index')->with('success','User is restored successfully');
    }

    public function forceDelete($id) {
        $user = User::withTrashed()->findOrfail($id);

        $user->forceDelete();

        return redirect()->route('users.index')->with('success','User is deleted permanently');
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::orderBy('id','ASC')->where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
