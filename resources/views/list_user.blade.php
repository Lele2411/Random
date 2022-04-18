@extends('layout')
@section('content')
    <div class="wrapper">
        <div class="left">
            <h3 class="title">3. RESULT</h3>
            <div class="list-group">
                <div class="group">
                    <span>group 1</span>
                    <ul class="item-group">
                        <li>A</li>
                        <li>B</li>
                        <li>C</li>
                        <li>D</li>
                        <li>D</li>
                        <li>D</li>
                        <li>D</li>
                        <li>D</li>
                    </ul>
                </div>
                <div class="group">
                    <span>group 1</span>
                    <ul class="item-group">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="group">
                    <span>group 1</span>
                    <ul class="item-group">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="group">
                    <span>group 1</span>
                    <ul class="item-group">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="middle">
            <h3 class="title">2. CONTROLLER</h3>
            <form action="" class="form-controller" method="POST">
                @csrf
                <div id="item-1" class="form-item">
                    <label for="choose-type">Balance gender distribution</label>
                    <span class="choose_input"><i class="fa-solid fa-check"></i></span>
                </div>
                <div id="item-2" class="form-item">
                    <label for="choose-type">Random to one group</label>
                    <button type="button" class="choose-type"></button>
                    <input id="single" name="number_one_group" type="number" class="choose_input d-none" min="1">
                    <input type="hidden" id="single_url" value="{{ route('user.sort.one.group') }}">
                </div>
                <span>OR (Set either one)</span>
                <div id="item-3" class="form-item">
                    <label for="choose-type">Random to many group</label>
                    <button type="button" class="choose-type"></button>
                    <input id="many" type="number" class="choose_input d-none" min="1">
                    <input type="hidden" id="many_url" value="{{ route('user.sort.many.group') }}">
                </div>
                <button type="submit" class="btn-sdm-controller">START</button>
            </form>
        </div>
        <div class="right">
            <div class="text-title">
                <h3>NHAP DANH SACH</h3>
            </div>
            <div class="main">
                <div class="wrapper-right">
                    <div class="header-main d-flex">
                        <div class="header-left d-flex align-items-center">
                            <h3 class="title">1. INPUT</h3><span class="total">{{ empty($users) ? 0 : count($users) }}</span>
                        </div>
                        <div class="header-right">
                            <ul class="d-flex">
                                <li><a href=""><i class="fa-regular fa-folder"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-list"></i></i></a></li>
                                <li><a href="" class="more"><i class="fa-solid fa-ellipsis"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <form class="form-add" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <input type="text" name="user_name">
                        <button type="submit"><i class="fa-solid fa-plus"></i></button>
                    </form>
                    <hr>
                    @if (!empty($users))
                    <div class="list-user">
                        <table class="table">
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user['user_name'] }}</td>
                                <td><ul class="d-flex">
                                    <li><a href="" class="active"><i class="fa-solid fa-mars-and-venus"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-mars"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-venus"></i></a></li>
                                    <li><a class="remove" href="{{ route('user.delete', ['id' => $key]) }}"><i class="fa-solid fa-xmark"></i></a></li>
                                </ul></td>
                            </tr>
                            @endforeach
                        </table>
                    </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection