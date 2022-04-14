<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        ul {
            margin: 0;
            height: 35%;
        }
        li {
            padding: 10px;
            list-style: none;
        }
        .wrapper {
            min-width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .right,.left {
            width: 40%;
            height: 82%;
            border: 5px solid black;
            margin: 0px auto;
        }
        .title {
            margin: 10px 0px;
            font-size: 1.5rem;
            text-align: center;
        }
        .title p {
            font-size: 1rem;
            font-weight: 400;
        }
        .main {
            width: 90%;
            height: 70%;
            margin: auto;
            border: 2px solid black;
            padding: 10px;
        }
        .list-user {
            margin-left: 0px;
            border-bottom: 1px dashed black;
        }
        .list-user {
            overflow-y: auto;
        }
        .text-insert textarea {
            height: 35%;
            width: 100%;
            border: none;
            padding: 5px;
            outline: none;
            font-size: 1.2rem;
        }
        .btn-handle {
            margin: 10px auto;
            width: 90%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-handle button {
            width: 49%;
            height: 50px;
        }
        .btn-handle .btn-cancel {
            background-color: red;
            border: red;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        .btn-handle .btn-add {
            background-color: orange;
            border: orange;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="left">
            <div class="border border-dark align-items-center">
                <strong> 1. INPUTS : </strong> <button> {{ $users->count() }}</button>
                <form action="{{ route('user.store') }}" method="POST" style="padding-bottom: 5px;">
                    @csrf
                    <label for="name">
                        <input type="text" name="name" placeholder="Input here..." required>
                    </label>
                    <button type="submit"><span><strong>&#43;</strong></span></button>
                </form>
                <hr style=" border-top: 3px dashed; width: 50%; margin: auto; padding-bottom: 5px;" />
                <div class="list-user">
                    <ul class="list">
                        @foreach($users as $user)
                            <li>{{ $user->id }})&nbsp;{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h4>View/Add List</h4>
                <p>(one input/line) (Existing inputs are none-editable)</p>
            </div>
            <div class="main">
                <div class="list-user">
                    <ul class="list">
                        @foreach($users as $user)
                            <li>{{ $user->name }} </li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-insert">
                    <textarea name="" id="" cols="30" rows="10" style="resize: none;"></textarea>
                </div>
            </div>
            <div class="btn-handle">
                <button class="btn-cancel">CANCEL</button>
                <button class="btn-add">ADD LIST</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
