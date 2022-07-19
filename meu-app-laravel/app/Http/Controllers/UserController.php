<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers(
                    $request->search ?? ''
                );

        return view('users.index', compact('users'));
    }

    public function show($id)
    {

        $user = User::find($id);

        if($user){
            return view('users.show', compact('user'));
        }else{
            throw new UserControllerException('Usuário não encontrado');
        }

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $data['image'] = $request->image->store('users');
        }

        $this->model->create($data);

        //$request->session()->flash('create', 'Usuario Cadastrado com Sucesso!');

        return redirect()->route('users.index')->with('create', 'Usuario Cadastrado com Sucesso!');

    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        if ($request->image) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $data['image'] = $request->image->store('users');
        }

        $user->update($data);

        $request->session()->flash('update', 'Usuario atualizado com Sucesso!');

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();

        $request->session()->flash('destroy', 'Usuario excluido com Sucesso!');

        return redirect()->route('users.index');
    }


    public function admin()
    {
        return view('admin.index');
    }
}