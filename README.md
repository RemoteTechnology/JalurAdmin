<img src="https://avatars.githubusercontent.com/u/153977186?s=400&u=7268ad55ed694cec25c1467486710abb82bc9ad8&v=4" style="width: 10%">
<h2>Remote-Siberian-Hammer</h2>
<br>
<h3>Используемые технологии:</h3>
<ul>
    <li>
        <a href="#">PHP 8.2 (Laravel 10)</a>
    </li>
    <li>
        <a href="#">PostgreSQL 13</a>
    </li>
    <li>
        <a href="#">JavaScript</a>
    </li>
</ul>
<hr>
<h3>Настройка окружения.</h3>
<ul>
    <li>
        <p>
            <span>Запустить сборку окружения:</span><br/>
            <b style="color: #222;">python3 init.py</b>
        </p>    
    </li>
    <br />
    <li>
        <p>
            <span>Создать/настроить конфиг, как минимум надо настроить подключение к БД:</span><br>
            <b style="color: #222;">(sudo) cp .example.env .env</b><br>
        </p>
    </li>
    <br />
    <li>
        <p>
            <span>Поднять docker:</span><br>
            <b style="color: #222;">(sudo) docker-compose up --build -d</b><br>
            <small>На локалке: (sudo) docker-compose --profile debug up --build -d</small>
        </p>
    </li>
    <br />
    <li>
        <p>
            <span>Создать/настроить конфиг, для работы Laravel:</span><br>
            <b style="color: #222;">cd sources</b><br>
            <b style="color: #222;">(sudo) cp .env.example .env</b><br>
        </p>
    </li>
    <br />
    <li>
        <p>
            <span>Установить зависимости:</span><br>
            <b style="color: #222;">(sudo) docker-compose run php-fpm composer install</b><br>
            <b style="color: #222;">(sudo) docker-compose run node install</b><br>
        </p>
    </li>
    <br />
    <li>
        <span>Создать миграции: <small>(Нужно проверить есть ли база)</small></span><br>
        <b style="color: #222;">(sudo) docker-compose run php-fpm php artisan migrate</b><br>
    </li>
    <br />
    <li>
        <span>Запустить сборку фронтенда:</span><br>
        <b style="color: #222;">(sudo) docker-compose run node run build</b><br>
    </li>
    <br />
    <li>
        <span>Заполнить базу тестовыми данными:</span><br>
        <b style="color: #222;">(sudo) docker-compose run php-fpm php artisan db:seed</b><br>
    </li>
    <br />
    <li>
        <span>Сгенерировать CSRF токен:</span><br>
        <b style="color: #222;">(sudo) docker-compose run php-fpm php artisan key:generate</b><br>
    </li>
    <br />
    <li>
        <span>Установить права и группу на директорию с проектом:</span><br>
        <b style="color: #222;">sudo chmod -R 777 $PWD</b><br>
        <b style="color: #222;">sudo chown -R <MY GROUP>:<MY GROUP> $PWD</b><br>
        <b style="color: #222;">sudo chmod -R 777 sources/storage/framework/cache</b><br>
        <b style="color: #222;">sudo chown -R www-data:www-data sources/storage/framework/cache</b><br>
    </li>
    <br />
    <li>
        <span>Создать ссылку на storage:</span><br>
        <b style="color: #222;">(sudo) docker-compose run php-fpm php artisan storage:link</b><br>
    </li>
</ul>
<hr />
<h3>Дополнительно:</h3>
<div style="padding: 0.7em;background-color: #edf2f7;border-radius: 0.4em;margin-bottom:10px;">
    <p>
        Ссылка на документацию по методам API:<br />
        <a href="https://gold-satellite-925746.postman.co/workspace/JALUR_API~9f475202-1b7c-4a4a-b061-c9e37757b0cf/overview">
            https://gold-satellite-925746.postman.co/workspace/JALUR_API~9f475202-1b7c-4a4a-b061-c9e37757b0cf/overview
        </a><br />
    </p>
</div>
<div style="padding: 0.7em;background-color: #edf2f7;border-radius: 0.4em;margin-bottom:10px;">
    <p>
        Файл schema.drawio можно открыть в приложении <b>draw.io</b> или на сайте:<br />
        <a href="https://app.diagrams.net/">https://app.diagrams.net/</a><br />
    </p>
</div>
<ul>
    <li>
        <p>
            <span>Локально можно заполнить базу фейковыми записями:</span><br>
            <b style="color: #222;">(sudo) docker-compose run php-fpm php artisan app:create-super-user-command 'Гришка' 'Абориген' 'Мужчина' '+7 (000) 000-00-00' 'vuacheslav.mir@gmail.com'</b>
        </p>
    </li>
</ul>