@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Purchase Products
            <a class="navbar-brand " href="{{ url('/purchase_product') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']))
        @if(count ($purchase_products)===1  || count ($purchase_products)===21 || count ($purchase_products)===31 || count ($purchase_products)===41 || count ($purchase_products)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($purchase_products) }} запись в таблице</p>
        @elseif(count ($purchase_products)>1 && count ($purchase_products)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записи в таблице</p>
        @elseif(count ($purchase_products)>4  && count ($purchase_products)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записей в таблице</p>
        @elseif(count ($purchase_products)>21 && count ($purchase_products)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записи в таблице</p>
        @elseif(count ($purchase_products)>24  && count ($purchase_products)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записей в таблице</p>
        @elseif(count ($purchase_products)>31 && count ($purchase_products)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записи в таблице</p>
        @elseif(count ($purchase_products)>34  && count ($purchase_products)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записей в таблице</p>
        @elseif(count ($purchase_products)>41 && count ($purchase_products)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записи в таблице</p>
        @elseif(count ($purchase_products)>44  && count ($purchase_products)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записей в таблице</p>
        @elseif(count ($purchase_products)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($purchase_products) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('purchase_product.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('purchase_product.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2"
                                           id="inlineFormInput" placeholder="Gaming mouse">
                                </div>

                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('purchase_product.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Purchase price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($purchase_products as $purchase_product)
                        <tr>
                            <th scope="row">{{ $purchase_product->purchase_product_id }}</th>
                            <td>{{ $purchase_product->product_name }}</td>
                            <td>{{ $purchase_product->purchase_price }}</td>
                            <td>{{ $purchase_product->purchase_quantity }}</td>
                            <td>{{ $purchase_product->purchase_amount }}</td>
                            <td>
                                <a href="{{ route('purchase_product.edit', ['id' => $purchase_product->purchase_product_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления сотрудника  --}}
                                <form action="{{ route('purchase_product.destroy', ['id' => $purchase_product->purchase_product_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete an purchase product?')) { return true } else { return false } ">
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
        {{ $purchase_products->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>

@endsection
