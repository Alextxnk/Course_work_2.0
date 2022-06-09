@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-4">
        <h1 class="h3 mb-0 text-gray-800">Posts
            <a class="navbar-brand " href="{{ url('/post') }}">refresh</a>
        </h1>
    </div>
    @if(isset($_GET['search']))
        @if(count ($posts)===1  || count ($posts)===21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдена {{ count($posts) }} запись в таблице</p>
        @elseif(count ($posts)>1 && count ($posts)<=4)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($posts) }} записи в таблице</p>
        @elseif(count ($posts)>4  && count ($posts)<21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($posts) }} записей в таблице</p>
        @elseif(count ($posts)>21)
            <h2>Результаты поиска по запросу <?= $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{ count($posts) }} записи в таблице</p>
        @else
            <h2>По запросу <?= $_GET['search'] ?> ничего не найдено</h2>
            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Отобразить все записи в таблице</a>
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
                        <form method="GET" action="{{ route('post.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="HR">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('post.create') }}" class="btn btn-outline-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Post name</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->post_id }}</th>
                            <td>{{ $post->post_name }}</td>
                            <td>{{ $post->salary }}</td>
                            <td>
                                <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                {{-- форма для удаления должности  --}}
                                <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="POST" onsubmit="if (confirm('Are you sure you want to delete a post?')) { return true } else { return false } ">
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
        {{ $posts->links() }}  {{-- метод links отвечает за пагинацию --}}
        @endif
    </div>
@endsection
