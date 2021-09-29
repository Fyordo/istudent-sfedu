<?php
use App\Models\Classes\GroupClass;

/* @var $groups array */
/* @var $group GroupClass */

?>

@extends('layouts.main')

@section('title', 'Заполнение данных')

@section('content')
    <div class="text-center">
        <h1 class="display-4">Заполнение обязательных данных</h1>
        <p>Ток по честному пиши плез</p>
    </div>
    <br>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('loginAdd') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="newPassword">Введите новый пароль</label>
            <input type="password" name="newPassword" placeholder="Введите новый пароль" id="newPassword" />
        </div>
        <br>
        <div class="form-group">
            <label for="confirmNewPassword">Подтвердите новый пароль</label>
            <input type="password" name="confirmNewPassword" placeholder="Подтвердите новый пароль" id="confirmNewPassword" />
        </div>
        <br>
        <div class="form-group">
            <label for="groupId">Выберите свою группу</label>
            <select name="groupId" id="groupId" >
                @foreach($groups as $group)
                    @if ($group->id != 0)
                        <option value="{{$group->id}}">{{ $group->groupCourse . '.' . $group->groupNumber}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="isHeadman">Я староста</label>
            <input type="checkbox" name="isHeadman" id="isHeadman" />
        </div>
        <br>
        <button type="submit" class="btn btn-success">Закончить регистрацию</button>
    </form>
@stop
