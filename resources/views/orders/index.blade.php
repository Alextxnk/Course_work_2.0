@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Orders
            <a class="navbar-brand " href="{{ url('/order') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']) && $from_len===0 && $to_len===0)
        @if(count ($orders)===1  || count ($orders)===21 || count ($orders)===31 || count ($orders)===41 || count ($orders)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($orders) }} запись в таблице</p>
        @elseif(count ($orders)>1 && count ($orders)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>4  && count ($orders)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>21 && count ($orders)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>24  && count ($orders)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>31 && count ($orders)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>34  && count ($orders)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>41 && count ($orders)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>44  && count ($orders)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('order.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
        @endif
    @endif
    @if(isset($_GET['from']) && isset($_GET['to']) && $from_len!==0 && $to_len!==0)
        @if(count ($orders)===1  || count ($orders)===21 || count ($orders)===31 || count ($orders)===41 || count ($orders)===51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдена {{ count($orders) }} запись в таблице</p>
        @elseif(count ($orders)>1 && count ($orders)<=4)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>4 && count ($orders)<21)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>21 && count ($orders)<=24)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>24  && count ($orders)<31)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>31 && count ($orders)<=34)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>34  && count ($orders)<41)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>41 && count ($orders)<=44)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @elseif(count ($orders)>44  && count ($orders)<51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записей в таблице</p>
        @elseif(count ($orders)>51)
            <h2>Результаты поиска по запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?></h2>
            <p class="lead">Всего найдено {{ count($orders) }} записи в таблице</p>
        @else
            <h2>По запросу с <?= $_GET['from'] ?> по <?= $_GET['to'] ?> ничего не найдено</h2>
            <a href="{{ route('order.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('order.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Tatiana">
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
                        <a href="{{ route('order.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Buyer's Last name</th>
                        <th scope="col">Buyer's First name</th>
<!--                        <th scope="col">Employer's Post Name</th>-->
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->order_id }}</th>
                            <td>{{ $order->last_name }}</td>
                            <td>{{ $order->first_name }}</td>
                            {{-- <td>{{ $order->post_name }}</td> --}}
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('order.edit', ['id' => $order->order_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления сотрудника  --}}
                                <form action="{{ route('order.destroy', ['id' => $order->order_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete an order?')) { return true } else { return false } ">
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
        {{ $orders->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>

@endsection

