@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Products
            <a class="navbar-brand " href="{{ url('/product') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']))
        @if(count ($products)===1  || count ($products)===21 || count ($products)===31 || count ($products)===41 || count ($products)===51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($products) }} запись в таблице</p>
        @elseif(count ($products)>1 && count ($products)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записи в таблице</p>
        @elseif(count ($products)>4  && count ($products)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записей в таблице</p>
        @elseif(count ($products)>21 && count ($products)<=24)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записи в таблице</p>
        @elseif(count ($products)>24  && count ($products)<31)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записей в таблице</p>
        @elseif(count ($products)>31 && count ($products)<=34)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записи в таблице</p>
        @elseif(count ($products)>34  && count ($products)<41)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записей в таблице</p>
        @elseif(count ($products)>41 && count ($products)<=44)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записи в таблице</p>
        @elseif(count ($products)>44  && count ($products)<51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записей в таблице</p>
        @elseif(count ($products)>51)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($products) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('product.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('product.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Gaming mouse">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Purchase price</th>
                        <th scope="col">Selling price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->product_id }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->purchase_price }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->product_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления пользователя  --}}
                                <form action="{{ route('product.destroy', ['id' => $product->product_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete a product?')) { return true } else { return false } ">
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
        {{ $products->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>
@endsection
