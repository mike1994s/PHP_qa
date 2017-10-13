 1) Описать подход и ориентировочный алгоритм решения задачи. Клиенту необходимо запросить отчет в личном кабинете сервиса за последние 10 лет единым документом.
 Время формирования отчета не менее 5 минут. Как организовать процесс так, чтобы клиент не ждал эти 5 минут загрузки страницы и остался “доволен” результатом.
 Какие принципы и технологии обычно используются? Привести примеры.
 
 Мой ответ:
 (При условии что пользователь не захочет уйти со страницы) Использовать технологию ajax и 
 загружать в созданный специально для отчета iframe(это нужно для того чтобы после окончания формирования отчета, 
 вдруг неожиданно для пользователя не произошло перекидывание на другую страницу).
 Например такой сценарий:
 Делаем на странице кнопку "СФормировать отчет", по нажатию на эту кнопку создаем ajax(POST метод) запрос на формирование отчета, 
 вместо кнопки появляется загрузка(прогресс бар например)
При этом пока формируется отчет страница не блокируется и пользователь может продолжать пользоваться ею. Сформированный отчет сохраняем на диск в папку доступную из web с уникальным именем 
 и ссылку на файл с отчетом отправляем в ответ AJAX запроса, на клиенте получаем ссылку вставляем её в созданный iframe и файл скачивается после скачивания файла iframe удаляем. 
 Чтобы файлы на диске на сервере не занимали слишком много места удаляем старые файлы(например там все файлы старшего какого то n(10 минут к примеру)) запускать такой скрипт можно посредством  cron  
 
 В итоге получаем: Пока отчет формируется страница доступна для пользования, сформированный отчет скачивается как только готов.
 
 
 2) Имеется проблемная страница сайта с временем загрузки 10 секунд. Опишите ориентировочную последовательность действий, подход, сервисы, инструменты необходимые для решения проблемы в целом. Что наиболее приоритетно, что менее приоритетно? Задачу можно разбить по специалистам в условной команде, если требуется.
 
 Первым делом проверяем сервисом pagespeed, по возможности стараемся исправить(Этот раздел включает минификацию css, js; gzip, использование спрайтов по возможности и другие)
 Также просим дизайнеров использовать прогрессивные jpeg'и если много больших фотографий на странице.
 
 Если ещё не используем nginx для отдачи статики начинаем делать это.(в nginx настраиваем также кэширование)
 
 Также изучаем логическую структуру страницы. Возможно некоторые элементы вынести в отдельные "сервисы" которые вызывать асинхронно(через ajax), например при первичной загрузке загружать только 
 минимально необходимый контент, а остальной подгружать уже после загрузки основного контента страницы. 
 Рассмотрим например страницу содержащую приветствие, текущую погоду , последние новости, и случайную цитату известного человека. В таком случае основным контентом будет приветствие, а как 
 только приветствие загрузится, асинхронно (ajax) начинаем делать запросы на сервер отдельно для получения погоды, отдельно для получения новостей, отдельно для получения случайной цитаты. 
 В таком подходе мы плюсом получаем легкость масштабирования горизонтального, то есть можем вообще вынести  Сервисы цитат, новостей, и погоды вынести в отдельные поддомены(например quote.example.com, weather.example.com,news.example.com),  которые будут запускаться на других
 физических машинах и могут быть написаны на других языках.

 Про приритеты: я думаю  что первоначально надо оптимизировать работу сайта используя сервис pageSpeed и внедрение nginx, и желательно изначально продумать сервисную архитектуру. а уже добавлять и разносить по физическим машинам, это только если сайт вырастет или никак не получается соптимизировать работу.
 

 3) В Yii2 каждый файл конфигурации хранится в двух видах. Зачем так сделано и как эти файлы ведут себя в git?
 
 Первый вид глобальный(там описаны настройки глобальные для всего проекта там обычно бывает описано то что используется для всего проекта в целом, например какая библиотека для отправки электронной почты) этот вид конфигурации сохраняется в репозиторий. 
 Второй вид локальный( в нем хранятся специфичные настройки для каждого разработчика, например пароль к БД) Этот файл не сохраняется в общий репозиторий.


4) Представим сервис, на котором постоянно происходит много регистраций по указанному email. Как наиболее корректно и достоверно проверять указанный email на валидность?

Сначала проверять почту регулярным выражением, если регулярное выражение прошло проверку, отправляем пользователю на указанный адрес код(напримерный четырехзначный), который просим чтобы он ввел, чтобы закончить процесс регистрации.
 
 


1. Используя Yii2 необходимо реализовать форму регистрации пользователя с условием типа физ./юр. лицо. Для физ. лица необходимо заполнить: почту, фио и в случае ИП - инн, а для юр. лица: почту, фио, название организации и инн.
Внешний вид значения не имеет.

Решение находится в папке practice_1/authorization/ (Сделано наскорую руку текст захардкодил - лучше бы было бы вынести в файлкики и вызывать через Yii::t, для легкости локализации) 
