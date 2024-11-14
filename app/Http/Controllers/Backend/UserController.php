<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UserRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function api_user()
    {

        $data = [
            'status' => 200,
            'user' => $this->userRepository->getAllUser(),
        ];

        return response()->json($data, 200);
    }


    public function index()
    {
        session()->flash('active', 'user');


        $users = $this->userRepository->getRecordUser();

        return view('backend.user.index', compact(
            'users',
        ));
    }

    public function create_user()
    {

        return view('backend.user.create');
    }

    public function handle_create_user(UserRequest $request)
    {
        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make(trim($request->password));
        $save->remember_token = Str::random(40);
        $save->status = $request->status;
        $save->save();

//        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect()->route('admin.user.index')
            ->with('success', 'Đã thêm thành công một tài khoản')
            ->with('msg-success', 'Đã thêm thành công một tài khoản');
    }

    public function update_user($id)
    {
        $data = [
            'user' => $this->userRepository->getUserById($id),

        ];

        return view('backend.user.update', $data);
    }

    public function handle_update_user(UserRequest $request, $id)
    {
        $user = $this->userRepository->getUserById($id);

        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->updated_at = date('Y-m-d H:i:s');
        $user->status = $request->status;

        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);


            $user->save();
            return redirect()->route('admin.user.update', $id)
                ->with('msg-success', 'Cập nhật thông tin và mật khẩu thành công');
        }

        $user->save();
        return redirect()->route('admin.user.update', $id)
            ->with('msg-success', 'Cập nhật thông tin thành công');



    }

    public function delete_user($id)
    {
        $user = $this->userRepository->getUserById($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->route('admin.user.index', $id)
            ->with('msg-success', "Xóa tài khoản: $user->email thành công");
    }

}
