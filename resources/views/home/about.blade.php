<?php
    use App\Models\Classes\StudentClass;

    /* @var $student StudentClass */
?>

@extends('layouts.main')

@section('title', 'О нас')

@section('content')
<div class="text-center">
    <h1 class="display-4">Добро пожаловать в iStudent</h1><br>
</div>
<div class="text-left">
    <p>
        <b>K& Kolibri - это лучшая команда по ПД 2021 года.</b><br>
        У нас закрыты все требуемые для нашего проекта позиции, каждый участник имеет бесценный опыт и наработки в своём направлении. Кастет команды состоит из симбиоза flutter разработчиков уровня стажёров и джунов и backend разработчиков с огромным опытом и наработками, и все это подкрепляет обаятельная и невероятно крутая дизайнер.
    </p>

    <b>
        Здесь реализован интерфейс взаимодействия студентов.<br>
        Что тут можно делать?<br>
    </b>
    <ol>
        <li>Смотреть оценки через сервис БРС</li>
        <li>Переходить в личный кабинет студента</li>
        <li>Смотреть расписание в любой день или полное расписание</li>
        <li>Смотреть список каждой группы (зарегистрированной)</li>
        <li>Смотреть некоторую информацию о студентах</li>
        <li>Добавлять уведомления на определённые даты</li>
    </ol>
    <b>
        Если ты - староста, то ты можешь: <br>
    </b>
    <ol>
        <li>Добавлять уведомления к определённым парам</li>
        <li>Добавлять или удалять студентов из группы</li>
        <li>Добавлять уведомления студентам своей группы или всей группе</li>
    </ol>
</div>
@if ($student == null)
<div class="text-center">
    <h2 class="display-6">Чтобы полноценно работать с сайтом, вторизуйтесь или зарегистрируйтесь</h2>
</div>
@endif

@stop
