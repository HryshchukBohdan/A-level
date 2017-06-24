## 1. Создать базу данных (два варианта)
- используя "дамп" в архиве(репозитории)
- с помощью  команд в терминале

### Создание БД
```bash
CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
```
### Добавление индекса
```mysql
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);
```
### Добавление автоинкремента
```mysql
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
```
## 2. Создания виртуальный хост

Директория для файлов сайта находится в /var/www. Необходимы права root для доступа к этой папке. Но вы можете изменить права на нее командой
```bash
sudo chown -R $USER:$USER /var/www 
```
Для примера мы создадим новый сайт в папке /home/user/public_html/ :

Создаем копию стандартного конфиг-файл сайта и переименуем его
```bash
sudo cp /etc/apache2/sites-available/default /etc/apache2/sites-available/map-hr 
```
Отредактируем новый конфиг-файл в текстовом редакторе выполнив в консоли sudo nano или gksudo gedit, например:
```bash
gksudo gedit /etc/apache2/sites-available/map-hr
```
Добавляем строчку с параметром ServerName. Для примера, ServerName map-hr
Добавляем строчку с параметром ServerAlias. Для примера, ServerAlias www.map-hr
Изменяем параметр DocumentRoot на новое месторасположение сайта. Для примера, /home/user/public_html/
Изменяем параметр Directory, заменив <Directory /var/www/> на <Directory /home/user/public_html/>
Вы можете иметь раздельные log-файлы для ваших сайтов. Для этого измените ErrorLog и CustomLog параметры.
Сохраняем файл.

Осталось только перезапустить Apache2:
```bash
sudo /etc/init.d/apache2 restart
```
Если вы не создали папку /home/user/public_html/, то получите сообщение с предупреждением об этом.
Внесем имя сайта в список хостов сервера:
```bash
sudo gedit /etc/hosts
```
Дописать в строчку 127.0.0.1 localhost через пробел mysite www.map-hr Перезапустить Apache2
```bash
sudo /etc/init.d/apache2 restart
```

    Настройки вашего сервера могут отличаться от дефолтный настроек Apache2 для Ubuntu 16.04
## 3. Распаковываем содержимое в созданную папку для нового хоста
## 4. Откриваем браузер и переходим по адресу указаному для нового хоста
