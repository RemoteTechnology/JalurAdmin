<?php

namespace App\Http\Services;
use App\Models\User;
use App\Http\Services\Contracts\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\UploadedFile;

class UserService implements UserServiceInterface
{
    private SMSMailingService $_smsMailingService;
    public function __construct(SMSMailingService $smsMailingService)
    {
        $this->_smsMailingService = $smsMailingService;
    }
    public static function generateRandomString($length = 6): string
    {
        $characters =                   '0123456789abcde0123456789fghijklm0123456789nopq0123456789rstuvwxy0123456789zABCDEFGHIJKLMNOP0123456789QRSTUV0123456789WXYZ';
        $charactersLength =             strlen($characters);
        $randomString =                 '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomString               .= $characters[random_int(0, $charactersLength - 1)];
        }
        return '000000';
    }
    public function create(array $user, UploadedFile|null $request_files=null, string $mode="web"): User
    {
        $model =                        new User();
        $model->first_name =            $user["first_name"];
        $model->last_name =             $user["last_name"];
        $model->middle_name =           key_exists("middle_name", $user) ? $user["middle_name"] : null;
        $model->age =                   key_exists("age", $user) ? $user["age"] : null;
        $model->birth_date =            key_exists("birth_date", $user) ? $user["birth_date"] : null;
        $model->role =                  key_exists("role", $user) && $user["role"] != "Клиент" ? $user["role"] : "Клиент";
        $model->gender =                $user["gender"];
        $model->image =                 $request_files ? $request_files->store('uploads', 'public') : $request_files;
        $model->description =           key_exists("role", $user) && $user["role"] == "Тренер" ? $user["description"] : null;
        $model->weight =                key_exists("weight", $user) ? $user["weight"] : null;
        $model->height =                key_exists("height", $user) ? $user["height"] : null;
        $model->size_cloth =            key_exists("size_cloth", $user) ? $user["size_cloth"] : null;
        $model->phone =                 $user["phone"];
        $model->email =                 key_exists("email", $user) ? $user["email"] : null;

        if ($mode == "web" && key_exists("role", $user) && $user["role"] == "Администратор")
        {
            $model->password_admin =    key_exists("password_admin", $user) ? $user["password_admin"] : self::generateRandomString(10);
        }

        $model->save();
        return $model;
    }
    public function show(int $id)
    {
        return User::find($id);
    }
    public function send_code(string $phone): array
    {
        $model = $this->findByPhone($phone);
        $new_password = self::generateRandomString();
        if (!is_null($model))
        {
            $code = Hash::make($new_password);
            $model->code = $code;
            $model->save();
            return ['message' => true];
        }
        // Отправка СМС
        $this->_smsMailingService::send($phone, $new_password);
        return ['message' => false];
    }
    public function auth(User $user, string $secret, string $mode="web"): array
    {
        $returned = ["error" => "Ошибка авторизации!"];
        switch ($mode)
        {
            // Расхэш пароля
            case "web":
                if (Hash::check($secret, $user->password_admin) && $user->role == "Администратор")
                {
                    Auth::login($user);
                    $returned = ["success" => "Добро пожаловать!"];
                }
                break;
            case "mobile":
                if (Hash::check($secret, $user->code))
                {
                    $bearer_token = User::createBearerTocken($user);
                    $returned = [
                        "user" => $user,
                        "access_key"=> $bearer_token
                    ];
                }
                break;
        }
        return $returned;
    }
    public function logout(User $user, string $mode="web"): void
    {
        switch ($mode)
        {
            case "web":
                Auth::logout();
                break;
            case "mobile":
                User::deleteBearerTocken($user);
                break;
        }
    }
    public function update(User $user, array $request, UploadedFile|null $request_files=null): ?User
    {
        $user->first_name       = key_exists('first_name', $request) && !is_null($request["first_name"]) ? $request["first_name"] : $user->first_name;
        $user->last_name        = key_exists('last_name', $request) && !is_null($request["last_name"]) ? $request["last_name"] : $user->last_name;
        $user->middle_name      = key_exists('middle_name', $request) && !is_null($request["middle_name"]) ? $request["middle_name"] : $user->middle_name;
        $user->age              = key_exists('age', $request) && !is_null($request["age"]) ? $request["age"] : $user->age;
        $user->birth_date       = key_exists('birth_date', $request) && !is_null($request["birth_date"]) ? $request["birth_date"] : $user->birth_date;
        $user->role             = key_exists('role', $request) && !is_null($request["role"]) ? $request["role"] : $user->role;
        $user->gender           = key_exists('gender', $request) && !is_null($request["gender"]) ? $request["gender"] : $user->gender;
        $user->image            = $request_files ? $request_files->store('uploads', 'public') : $user->image;
        $user->weight           = key_exists('weight', $request) && !is_null($request["weight"]) ? $request["weight"] : $user->weight;
        $user->height           = key_exists('height', $request) && !is_null($request["height"]) ? $request["height"] : $user->height;
        $user->size_cloth       = key_exists('size_cloth', $request) && !is_null($request["size_cloth"]) ? $request["size_cloth"] : $user->size_cloth;
        $user->description      = key_exists('description', $request) && !is_null($request["description"]) ? $request["description"] : $user->description;
        $user->phone            = key_exists('phone', $request) && !is_null($request["phone"]) ? $request["phone"] : $user->phone;
        $user->email            = key_exists('email', $request) && !is_null($request["email"]) ? $request["email"] : $user->email;
        $user->save();
        return $user;
    }
    public function findById(int $id): ?User
    {
        return User::find($id);
    }
    public function findByPhone(string $phone): ?User
    {
        return User::where("phone","=", $phone)->first();
    }
    public function findByRole(string $role="Клиент"): Collection
    {
        return User::where("role","=", $role)->get();
    }
    public function resetToPassword(User $user): User
    {
        $new_password = self::generateRandomString(12);
        $user->password_admin = Hash::make($new_password);
        // $this->_smsMailingService->smsSend($new_password, $user->phone);
        $user->save();
        return $user;
    }
}
