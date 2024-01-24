<!DOCTYPE html>
<html>
<head>
    <title>SportExperts</title>
</head>
<body>
    <h1>Добро пожаловать в SportExperts!</h1>
    <br>
    <h3>
        <p>Здравствуйте, {{ $_data['first_name'] }}. Вы успешно зарегистрированны.</p>
        <p>
            <b>Ваши данные для входа:</b>
        </p>
        <br>
        <p><b>Логин: </b>{{ $_data['phone'] }}</p>
        <p><b>Пароль: </b>{{ $_data['password_admin'] }}</p>
    </h3>
</body>
</html>
