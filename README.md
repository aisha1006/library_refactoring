# Stage 2, 3
[Mind Map](Phase 3/mindmap.pdf)
Objective of the project:
Make an online catalog of books for the library of the SDU University
Automate internal processes (work) of the library and librarians
User service: a service for issuing books
Problems and solutions:
Unavailability of the book catalog during quarantine
Make an online catalog for users with a list of all books and resources from the library
Routine work of librarians:
Buying books and registering them
Entering book information into the database
Issuance and control of books
Process reports, books
Automate processes (picking, cataloging)

Scope and functions of the project:
Starting from 1.07.2020 to the current date, the project is under development
The project consists of modules such as:
Landing
Administration
Cataloging
Picking
Service
Reports
Functions:
Landing
Provide complete information about books
Title, authors, year of issue, image, description, etc.
Search for books by keywords
Simple search
Advanced Search
Search for resources and other materials other than books
Filtering by languages, dates, types of materials
Administration
Cataloging
Book registration:
Filling in information about incoming books
Fill in all fields according to the format and standard MARC21
Checking for the correctness of the entered data
Picking
CRUD operations and search for:
Batch of books (Batch)
Instance and copy (Item)
Publisher (Publisher)
The supplier (Supplier)
Service
Finding Users and Customers (Students and Staff)
Displaying user data
Issuing books to users
Control of the period of issue and the date of return of books
Reports
Output of reports in .pdf, .csv format
Inventory books
Frequently read books
Attendance (Virtual and Offline)
History of books
KSU and Stat. report

Interface and reasons for choosing:
Project interface - Web application
We decided to make it a web application, since quarantine measures against covid-19 are currently underway around the world. To access the library remotely, the web version of the project is the most suitable option for both users and librarians.

Programming language and database
Programming language:
Backend part - PHP, Laravel
Front end part - JS, Vue js
Database - Oracle database
Описание:
We chose this stack for project implementations, since all projects within the university have the same stacks.
Database: University uses Oracle database
The database server works separately from the server where the project is deployed
Database connections go through hostname / ip-address: port: sid using username, password, database name.
Since the project is implemented on the Laravel framework, we use the ready-made yajra / oracle-oci8 library and php oci8 extension to connect to the Oracel database and build sql queries using the ORM built into the framework itself (Query builder, Eloquent builder)

Stage 3
Questions:
What information does our library contain about books?
[dataset1.csv](Phase 3/dataset1.csv)
Are there other types of materials besides books in the library?
[dataset2.csv](Phase 3/dataset2.csv)
[dataset3.csv](Phase 3/dataset3.csv)
How are the books themselves and copies of books stored?
[dataset4.csv](Phase 3/dataset4.csv)
What keywords are used to search for books?
Title
Author
ISBN/ISSN
Publisher
Call Number
What are Book Batches?
[dataset5.csv](Phase 3/dataset5.csv)
How are logs saved from each action in the library?
[dataset6.csv](Phase 3/dataset6.csv)
How is attenuation controlled in the library?
[dataset7.csv](Phase 3/dataset7.csv)
Library service: Book lending
[dataset8.csv](Phase 3/dataset8.csv)
What are copies of books?
[dataset4.csv](Phase 3/dataset4.csv)
What is the difference between batches and instances?
A batch of books is the book itself with additional. information. A copy is a copy of a book. For example: The library received one batch of books with 100 copies.
What reports does the library have?
[dataset9.csv](Phase 3/dataset9.csv)
What are book publishers?
[dataset10.csv](Phase 3/dataset10.csv)
What are book providers?
[dataset11.csv](Phase 3/dataset11.csv)
Who are our users?
Students
Employees
What roles and accesses (permissions) does the library have?
User (Only has access to Landing)
Admin - Librarian (Has access to the Admin)



### Stage 2
[Mind Map](Phase 3/mindmap.pdf)
1. Цель проекта:
    1. Сделать онлайн каталог книг для библиотеки университета СДУ
    2. Автоматизировать внутренние процессы (работу) библиотеки и библиотекаршей
    3. Обслуживание пользователей: сервис для выдачи книг
2. Проблемы и их решения:
    1. Недоступность каталога книг во время карантина
        1. Сделать онлайн каталог для пользователей со списком всех книг и ресурсов из библиотеки
    2. Рутинная работа библиотекаршей:
        - Покупка книг и их регистрация
        - Внесение информаций о книгах в базу данных
        - Выдача и контроль книг
        - Отчеты о процессах, книг
        1. Автоматизировать процессы (комплектование, каталогизация)

---

1. Масштаб и функции проекта:
    1. Начиная с 1.07.2020 по текущей дате проект в процессе разработки
    2. Проект состоит из таких модулей как:
        1. Landing
        2. Administration
            1. Каталогизация
            2. Комплектование
            3. Обслуживание
            4. Отчеты
    3. Функции:
        1. Landing
            1. Предоставить полную информацию о книгах
                - Название, авторы, год выпуска, изображение, описание и тд.
            2. Поиск книг по ключевым словам
                1. Простой поиск
                2. Расширенный поиск
            3. Поиск ресурсов и других материалов кроме книг
            4. Фильтрация по языкам, датам, типам материалов
        2. Administration
            1. Каталогизация
                1. Регистрация книг:
                    1. Заполнение информаций о поступающих книгах
                    2. Заполнить все поля по формату и стандарту MARC21
                    3. Проверка на правильность вносимых данных
            2. Комплектование
                1. CRUD операции и поиск для:
                    1. Партия книг (Batch)
                    2. Экземпляр и копия (Item)
                    3. Издатель (Publisher)
                    4. Поставщик (Supplier)
            3. Обслуживание
                1. Поиск пользователей и клиентов (Студенты и сотрудники)
                2. Вывод данных о пользователей
                3. Выдача книг пользователям
                4. Контроль период выдачи и даты возврата книг
            4. Отчеты
                1. Вывод отчетов в формате .pdf, .csv
                    1. Инвентарные книги
                    2. Часто читаемые книги
                    3. Посещаемость (Виртуальный и оффлайн)
                    4. История книг
                    5. КСУ и Стат. отчет

---

1. Интерфейс и причины выбора:
    - Интерфейс проекта - Web application

    Мы решили сделать это веб приложением, так как в данный момент по миру ведутся карантинные меры против codiv-19. Для доступа к библиотеке удаленно, веб версия проекта - самый подходящий вариант и для пользователей и для библиотекарши.

---

2. Язык программирования и база данных

- Язык программирования:
    - Backend part - PHP, Laravel
    - Front end part - JS, Vue js
- База данных - Oracle database

Описание:

- Мы выбрали этот стек для реализаций проекта, так как все проекты внутри университета имеют такие же стеки
- База данных: в университете используют базу данных Oracle
1. Сервер базы данных работает отдельно от сервера в котором развернут проект
    - Подключения на базу данных идет через hostname/ip-address:port:sid с использованием username, password, database name.
    - Так как проект реализован на фрэймворке Laravel, мы используем готовую библиотеку yajra/oracle-oci8 и php oci8 extension для подключения к базе данных Oracel и строения sql запросов используя ORM встроенную в сам фреймворк (Query builder, Eloquent builder)

---

### Stage 3

Вопросы:

1. Какую информацию содержит о книгах наша библиотека ?

    [dataset1.csv](Phase 3/dataset1.csv)

2. Есть ли другие типы материалов кроме книг в библиотеке ?

    [dataset2.csv](Phase 3/dataset2.csv)

    [dataset3.csv](Phase 3/dataset3.csv)

3. Как хранятся сами книги и копии книг ?

    [dataset4.csv](Phase 3/dataset4.csv)

4. По каким ключевым словам идет поиск книг ?
    1. Title
    2. Author
    3. ISBN/ISSN
    4. Publisher
    5. Call Number
5. Что такое партии книг ?

    [dataset5.csv](Phase 3/dataset5.csv)

6. Как сохраняются логи с каждого действия в библиотеке ?

    [dataset6.csv](Phase 3/dataset6.csv)

7. Как контралируется аттенденс в библиотеке ?

    [dataset7.csv](Phase 3/dataset7.csv)

8. Обслуживание в библотеке: Выдача книг

    [dataset8.csv](Phase 3/dataset8.csv)

9. Что такое экземпляры книг ?

    [dataset4.csv](Phase 3/dataset4.csv)

10. В чем разница между партиями и экземплярами ?

    Партия книг это сама книга с доп. информацией.
    Экземляр это копия книги.
    Например: В библиотеку поступила одна партия книг с 100 экземплярами.

11. Какие отчеты есть в библиотеке ?

    [dataset9.csv](Phase 3/dataset9.csv)

12. Что такое издатели книг ?

    [dataset10.csv](Phase 3/dataset10.csv)

13. Что такое поставщики книг ?

    [dataset11.csv](Phase 3/dataset11.csv)

14. Кто наши пользователи ?
    1. Студенты
    2. Сотрудники
15. Какие роли и доступы (разрешения) есть в библиотеке ?
    1. Пользователь (Имеет доступ только к Landing)
    2. Админ - Библиотекарша (Имеет доступ к Админке)
