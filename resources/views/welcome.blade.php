@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Візитна картка</div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('images/1.png') }}" class="rounded img-thumbnail float-left">
                            <div class="row float-right">
                                <div class="alert ">Ім'я</div>
                                <div class="alert alert-info">Марія</div>
                            </div>
                            <div class="row float-right">
                                <div class="alert ">Прізвище</div>
                                <div class="alert alert-info">Годерзашвілі</div>
                            </div>
                            <div class="row float-right">
                                <div class="alert ">Телефон</div>
                                <div class="alert alert-info">+380661574878</div>
                            </div>
                            <div class="row float-right">
                                <div class="alert ">Почта</div>
                                <div class="alert alert-info">mpshvili97@gmail.com</div>
                            </div>

                            <div class="row float-right">
                                <a href="{{ asset('images/2.png') }}" class="btn btn-block btn-info" download>
                                    <h3>Завантажити Резюме</h3>
                                </a>
                            </div>

                            <div class="row float-right mt-3">
                                <button
                                    class="btn btn-block btn-success"
                                    data-toggle="modal"
                                    data-target="#questionsModal">Питання для батьків
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($posts as $post)
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row col-md-12">
                                <div class="col-md-4 text-center">{{ substr($post->created_at, 0, 10) }}</div>
                                <div class="col-md-4 text-center" style="color: darkgreen">{{ $post->title }}</div>
                                <form id="deletePost{{ $post->id }}" hidden method="post" action="{{ route('delete-post', ['id' => $post->id]) }}">
                                    @method('delete')
                                    @csrf
                                </form>
                                <div class="col-md-4 text-right">
                                    <button
                                        class="btn btn-danger"
                                        onclick="document.getElementById('deletePost{{ $post->id }}').submit()">X
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                {{ $post->text }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block btn-success" data-toggle="modal" data-target="#postModal">
                            Додати пост
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center text-center">
            @if (count($posts) > 0)
                {{ $posts->links() }}
            @endif
        </div>
    </div>

    <div id="postModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-post') }}" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Заголовок поста" name="title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Зміст" name="text"></textarea>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">Додати пост</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
                </div>
            </div>
        </div>
    </div>

    <div id="questionsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-post') }}" method="post">
                        <div class="form-group">
                            <label>Чи читаєте ви народні казки дітям?</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Чи чемні ви зі своєю дитиною?</label>
                            <input class="form-control" name="text">
                        </div>
                        <div class="form-group">
                            <label>Чи розпитуєте ви у дитини, як вона провела день у дитячому садочку?</label>
                            <input class="form-control" name="text">
                        </div>
                        <div class="form-group">
                            <label>Чи просите ви вибачення у дитини, коли не праві?</label>
                            <input class="form-control" name="text">
                        </div>
                        <div class="form-group">
                            <label>Ваше ім'я</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Ваше прізвище</label>
                            <input class="form-control" name="text">
                        </div>
                        {{ csrf_field() }}
                        <button
                            type="submit"
                            class="btn btn-success"
                            data-toggle="modal"
                            data-target="#credentialModal">Надіслати
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
                </div>
            </div>
        </div>
    </div>
@endsection
