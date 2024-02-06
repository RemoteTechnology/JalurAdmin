<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAuthentificationWebRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserFilterRequest;
use App\Http\Requests\User\UserResetToPasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Services\UserFilterService;
use App\Http\Services\UserService;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFormController extends Controller
{
    private UserService $_userService;
    private UserFilterService $_userFilterService;
    public function __construct(UserService $userService, UserFilterService $userFilterService)
    {
        $this->_userService = $userService;
        $this->_userFilterService = $userFilterService;
    }
    public function registration(Request $request_files, UserCreateRequest $request)
    {
        $user = $request->validated();
        $user['birth_date'] = str_split($user['birth_date'])[0];
        $this->_userService->create($user, $request_files["image"] ? $request_files->file('image') : null);
        return redirect()
            ->route("user.index")
            ->with("success","Пользователь успешно добавлен!");
    }
    public function auth(UserAuthentificationWebRequest $request)
    {
        $user = $request->validated();
        $this->_userService->auth(
            $this->_userService->findByPhone($user["phone"]),
            $user["password_admin"],
            "web"
        );
        return redirect()->route("home");
    }
    public function logout()
    {
        if (Auth::check() && !is_null(Auth::id()))
        {
            $this->_userService->logout(
                $this->_userService->findById(Auth::id())
            );
            return redirect()->route("user.login");
        }
        return redirect()->route("user.login");
    }
    public function update(Request $request_files, UserUpdateRequest $request)
    {
        $user = $request->validated();
        $user['birth_date'] = str_split($user['birth_date'])[0];
        try
        {
            if ($this->_userService->update(
                    $this->_userService->findById($user["id"]),
                    $user,
                    $request_files["image"] ? $request_files->file('image') : null
            ))
            {
                return back()->with("success"," Данные пользователя успешно обновлены!");
            }
            else
            {
                return back()>with("error","Ошибка обновления данных!");
            }
        }
        catch (UniqueConstraintViolationException)
        {
            return back()>with("error","Номер телефона уже используется!");
        }
    }
    public function filter(UserFilterRequest $request)
    {
        $request = $request->validated();
        $users = $this->_userFilterService->filter($request);
        if (key_exists('is_schedule', $request))
        {
            return redirect('user')
                ->with('schedules', $this->_userFilterService->filter_records($users));
        }
        return redirect('user')
            ->with('users', $users);
    }
    public function reset(UserResetToPasswordRequest $request)
    {
        $request = $request->validated();
        $user = $this->_userService->findByPhone($request['phone']);
        if(!is_null($user) && $user->role == "Администратор")
        {
            // TODO: Сделать отправку СМС
            $this->_userService->resetToPassword($user);
            return redirect()->route("user.login")->with('success', 'Пароль успешно обновлён!');
        }
        return redirect()->route("user.login")->with('error', 'Ошибка обновления пароля, возможно вы не являетесь админисратором!');
    }
}
