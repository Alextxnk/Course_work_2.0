@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Buyers
            <a class="navbar-brand " href="{{ url('/buyer') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']))
        @if(count ($buyers)===1  || count ($buyers)===21 || count ($buyers)===31 || count ($buyers)===41 || count ($buyers)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($buyers) }} запись в таблице</p>
        @elseif(count ($buyers)>1 && count ($buyers)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записи в таблице</p>
        @elseif(count ($buyers)>4  && count ($buyers)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записей в таблице</p>
        @elseif(count ($buyers)>21 && count ($buyers)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записи в таблице</p>
        @elseif(count ($buyers)>24  && count ($buyers)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записей в таблице</p>
        @elseif(count ($buyers)>31 && count ($buyers)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записи в таблице</p>
        @elseif(count ($buyers)>34  && count ($buyers)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записей в таблице</p>
        @elseif(count ($buyers)>41 && count ($buyers)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записи в таблице</p>
        @elseif(count ($buyers)>44  && count ($buyers)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записей в таблице</p>
        @elseif(count ($buyers)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($buyers) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('buyer.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('buyer.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Tatiana">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('buyer.create') }}" class="btn btn-outline-primary mb-2">Create</a>
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
                        <th scope="col">Phone</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($buyers as $buyer)
                        <tr>
                            <th scope="row">{{ $buyer->buyer_id }}</th>
                            <td>{{ $buyer->last_name }}</td>
                            <td>{{ $buyer->first_name }}</td>
                            <td>{{ $buyer->address }}</td>
                            <td>{{ $buyer->phone }}</td>
                            <td>
                                <a href="{{ route('buyer.edit', ['id' => $buyer->buyer_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления пользователя  --}}
                                <form action="{{ route('buyer.destroy', ['id' => $buyer->buyer_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete a buyer?')) { return true } else { return false } ">
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
        {{ $buyers->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>
@endsection
