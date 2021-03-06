<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Тестовое задание</h1>
    <br>
</p>

Система на бэкенде использует REST API и обрабатывает запросы с сайта.
В рамках задания мы добавляем новый метод расчёта стоимости корзины пользователя.
Необходимо предусмотреть сл. логику работы метода:
1. Эндпойнт получает на вход объект "Корзина" (JSON)
   1.1. массив товаров
- id товара (int)
- количество товаров (int).

На выходе объект "Расчитанная корзина"
1. массив товаров
- id товара (int)
- количество товаров (int)
- сумма по позиции (float)
2. общая сумма (float)

2. Метод API для расчёта цен использует внешний микросервис (по http)
3. Система хранит информацию о ценах товаров в кэше, если нет информации в кэше, то берёт информацию из внешнего микросервиса и кладёт их в кэш

Необходимо спроектировать и реализовать эту логику с учетом вашего опыта и лучших практик.
Возможно, в условии есть неточности, какое-то поведение не указано и тд.
Нужно самостоятельно принять решение как быть и явно это обозначить - либо в комментарии к методу, либо в файле типа readme.
В этом же файле напишите, что бы вы сделали по-другому, будь у вас больше времени;
Какие у вас были соображения, как в целом должен выглядеть этот код, к чему вы стремились.

# Пожелания к реализации
Yi2, php 7.2-7.4.

Функционал отправки запросов, хранения данных в кэше реализовывать не надо, вместо них достаточно сделать заглушки.
Ваша оосновная цель - показать подход к проектированию и разработке, а не сделать production-ready код.
Не нужно реализовывать трудоёмкие технические детали.
Вместо этого важнее применить свой опыт, показать как вы декомпозировали предметную область, как выглядят ваши классы, куда вы поместили логику.

DIRECTORY STRUCTURE
-------------------

      docker/                docker
      project/               project files
         assets/             contains assets definition
         commands/           contains console commands (controllers)
         config/             contains application configurations
         controllers/        contains Web controller classes
         mail/               contains view files for e-mails
         models/             contains model classes
         services/           contains services
         runtime/            contains files generated during runtime
         tests/              contains various tests for the basic application
         vendor/             contains dependent 3rd-party packages
         views/              contains view files for the Web application
         web/                contains the entry script and Web resources
