@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions
            <a class="navbar-brand " href="{{ url('/transaction') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']))
        @if(count ($transactions)===1  || count ($transactions)===21 || count ($transactions)===31 || count ($transactions)===41 || count ($transactions)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($transactions) }} запись в таблице</p>
        @elseif(count ($transactions)>1 && count ($transactions)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записи в таблице</p>
        @elseif(count ($transactions)>4  && count ($transactions)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записей в таблице</p>
        @elseif(count ($transactions)>21 && count ($transactions)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записи в таблице</p>
        @elseif(count ($transactions)>24  && count ($transactions)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записей в таблице</p>
        @elseif(count ($transactions)>31 && count ($transactions)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записи в таблице</p>
        @elseif(count ($transactions)>34  && count ($transactions)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записей в таблице</p>
        @elseif(count ($transactions)>41 && count ($transactions)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записи в таблице</p>
        @elseif(count ($transactions)>44  && count ($transactions)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записей в таблице</p>
        @elseif(count ($transactions)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($transactions) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('transaction.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('transaction.index') }}">
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
                        <a href="{{ route('transaction.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Order quantity</th>
                        <th scope="col">Order amount</th>
                        <th scope="col">Purchase quantity</th>
                        <th scope="col">Purchase amount</th>
                        <th scope="col">Appointment</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->transaction_id }}</th>
                            <td>{{ $transaction->order_quantity }}</td>
                            <td>{{ $transaction->order_amount }}</td>
                            <td>{{ $transaction->purchase_quantity }}</td>
                            <td>{{ $transaction->purchase_amount }}</td>
                            <td>{{ $transaction->appointment }}</td>
                            <td>
                                <a href="{{ route('transaction.edit', ['id' => $transaction->transaction_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления сотрудника  --}}
                                <form action="{{ route('transaction.destroy', ['id' => $transaction->transaction_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete an transaction?')) { return true } else { return false } ">
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
        {{ $transactions->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>

@endsection

