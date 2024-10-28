# Подключение Xdebug

## 1. Настраиваем интеграцию PHPStorm с Docker

    Идём в Settings > Build, Execution, Deployment > Docker 
    и создаём максимально простую интеграцию через локальное приложение Docker:
![img.png](img.png)!

## 2. Настраиваем выполнение скриптов через удалённый (в контейнере) интерпретатор
    Идём в Settings > PHP > CLI Interpreter > 3 точки справа от него и добавляем такую конфигурацию:
    -----------------------------------------------------------------------------------------------
    Name может быть любым
    Server выбираем тот, который создали шагом ранее
    Configuration files: путь до docker-compose.yml
    Service: контейнер с PHP
    Остальное на ваш вкус, но в графе Lifecycle лучше оставить connect to existing container
![img2.png](img2.png)
```
Теперь, в графе CLI Interpreter вы увидите выбранным только что созданный конфиг:]()
```
![img_1.png](img_1.png)

## 3. Даём PHPStorm знать о том, как мы обращаемся к серверу
    Идём в Settings > PHP > Servers и добавляем новую конфигурацию сервера:
    Прокидываем маппинг для нашего проекта из докера /var/www/html
    Порт берём из своего конфига nginx. В моём случае он поднят в отдельном контейнере и смотрит наружу через 80
    Тут важно запомнить Name, это пригодится чуть позже
![img_2.png](img_2.png)
## 4. Чуть-чуть донастроим интеграцию PHPStorm с XDebug
    Идём в Settings > PHP > Debug > XDebug и добавляем порт 9001:
![img_3.png](img_3.png)

## 5. Меняем название сервера в .env
    в ./docker/local/.env поменять XDEBUG_SERVER_NAME="на свое назавние которое указывали в NAME"


# Возможные исправления что бы заработало
    если xdebug начинает постоянно с index.php, а не breakpoint'а:
        Это случилось, потому что ты нажал на "Break at first line in PHP scripts" в Event log.
        Чтобы отменить:
        Ctrl + Shift + A и напиши "break"
        В окошке поставь переключатель "Run Break at first line in PHP scripts" на OFF  

    Добавление xdebug в phpstorm
![img_4.png](img_4.png)
![img_5.png](img_5.png)
![img_6.png](img_6.png)
