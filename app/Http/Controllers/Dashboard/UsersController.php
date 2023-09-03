<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{  public function index()
{
    return view('dashboard.users.index');
}

    public function data()
    {
        $users = new User();
        if (request()->has('filter')) {
            $filter =  json_decode(request('filter'));
            $users = $users->where(function ($query) use ($filter) {
                $query->where('name', 'LIKE', "%$filter%")
                    ->orWhere('email', 'LIKE', "%$filter%");
            });
           }
        if (request()->has('sort')) {
            $sort = json_decode(request('sort'), true);
            $fieldName = $sort['fieldName'] && strlen($sort['fieldName']) ? $sort['fieldName'] : 'id';
            $order = $sort['order'] && strlen($sort['order']) ? $sort['order'] : 'desc';
            $users = $users->orderBy('name','asc');
        }


        $users = $users->paginate(PER_PAGE);

        return response()->json(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'id' => 'nullable',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
        ], [], [
            'name' => 'الاسم',
            'email' => ' البريد الالكتروني ',
            'password' => 'كلمة المرور',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();


        return response()->json(['message' => trans('messages.saved_successfully')]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.users.form', compact('user'));
    }

    public function update($id, Request $request)
    {

        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ], [], [
            'name' => 'الاسم',
            'email' => ' البريد الالكتروني ',
        ]);

        DB::transaction(function () use ($user, $request) {

            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = $request->password ? bcrypt($request->password) : $user->password;

            $user->save();
        });

        return response()->json(['message' => trans('messages.updated_successfully')]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $message = trans('messages.deleted_successfully');
        return response()->json(compact('message'));
    }
}
