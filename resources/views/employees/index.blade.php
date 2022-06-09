@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Employees
            <a class="navbar-brand " href="{{ url('/employee') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']) && $from_len===0 && $to_len===0)
        @if(count ($employees)===1  || count ($employees)===21 || count ($employees)===31 || count ($employees)===41 || count ($employees)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($employees) }} запись в таблице</p>
        @elseif(count ($employees)>1 && count ($employees)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>4  && count ($employees)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>21 && count ($employees)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>24  && count ($employees)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>31 && count ($employees)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>34  && count ($employees)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>41 && count ($employees)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>44  && count ($employees)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('employee.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
        @endif
    @endif

    @if(isset($_GET['from']) && isset($_GET['to']) && $from_len!==0 && $to_len!==0)
        @if(count ($employees)===1  || count ($employees)===21 || count ($employees)===31 || count ($employees)===41 || count ($employees)===51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдена {{ count($employees) }} запись в таблице</p>
        @elseif(count ($employees)>1 && count ($employees)<=4)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>4 && count ($employees)<21)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>21 && count ($employees)<=24)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>24  && count ($employees)<31)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>31 && count ($employees)<=34)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>34  && count ($employees)<41)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>41 && count ($employees)<=44)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @elseif(count ($employees)>44  && count ($employees)<51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записей в таблице</p>
        @elseif(count ($employees)>51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($employees) }} записи в таблице</p>
        @else
            <h2>По запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?> ничего не найдено</h2>
            <a href="{{ route('employee.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
        @endif
    @endif
    <div class="row">
        <div class="card  mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('employee.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2"
                                           id="inlineFormInput" placeholder="Tatiana">
                                </div>

                                <div class="col">
                                    <label style="display: flex; margin-bottom: 2px; align-items: center">
                                        <div style="margin-right: 5px">
                                            От
                                        </div>
                                        <input type="date" name="from" class="form-control mb-2"
                                                     id="inlineFormInput">
                                    </label>
                                </div>

                                <div class="col">
                                    <label style="display: flex; margin-bottom: 2px; align-items: center">
                                        <div style="margin-right: 5px">
                                            До
                                        </div>
                                        <input type="date" name="to" class="form-control mb-2"
                                                     id="inlineFormInput">
                                    </label>
                                </div>

                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('employee.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Last name</th>
                        <th scope="col">First name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Birth date</th>
                        <th scope="col">Date hired</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->employee_id }}</th>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->birthdate }}</td>
                            <td>{{ $employee->date_hired }}</td>
                            <td>
                                <a href="{{ route('employee.edit', ['id' => $employee->employee_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления сотрудника  --}}
                                <form action="{{ route('employee.destroy', ['id' => $employee->employee_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete an employee?')) { return true } else { return false } ">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-4 mr-2">
        @if(!isset($_GET['search'])) {{-- если мы не производим поиск, то нам нужна пагинация --}}
        {{ $employees->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>

@endsection
