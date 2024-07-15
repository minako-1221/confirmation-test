@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('button')
<nav class="header-nav">
    <ul>
        <li class="header-nav__item">
            <form class="header-nav__form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
            </form>
        </li>
    </ul>
</nav>
@endsection

@section('content')
<div class="admin__content">
    <div class="article__title">
        <h1>Admin</h1>
    </div>
    <form action="/admin/search" class="search-form" method="get">
        @csrf
        <div class="search-form__item">
            <input type="text" name="keyword" value="{{old('keyword')}}" class="search-form__item-input" placeholder="名前やメールアドレスを入力してください">
            <select name="gender" class="search-form__item-gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
            </select>
            <select name="category_id" class="search-form__item-category">
                @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                @endforeach
            </select>
            <select name="date"  class="search-form__item-date">
                <option value="">年/月/日</option>
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit--reset" type="submit">リセット</button>
        </div>
    </form>
    <div class="admin-table">
        <div class="admin-table__export-button">
            エクスポート
        </div>
        <div class="admin-table__pagination">
            <button class="admin-table__pagination-button">&lt;</button>
            <button class="admin-table__pagination-button">1</button>
            <button class="admin-table__pagination-button">2</button>
            <button class="admin-table__pagination-button">3</button>
            <button class="admin-table__pagination-button">4</button>
            <button class="admin-table__pagination-button">5</button>
            <button class="admin-table__pagination-button">&gt;</button>
        </div>
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">
                    <span class="admin-table__header-span">お名前</span>
                </th>
                <th class="admin-table__header">
                    <span class="admin-table__header-span">性別</span>
                </th>
                <th class="admin-table__header">
                    <span class="admin-table__header-span">メールアドレス</span>
                </th>
                <th class="admin-table__header">
                    <span class="admin-table__header-span">お問い合わせの種類</span>
                </th>
                <th class="admin-table__header"></th>
            </tr>
            @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                        <span class="admin-table__item-span">{{$contact->firstname}} {{$contact->lastname}}</span>
                    </td>
                    <td class="admin-table__item">
                        <span class="admin-table__item-span" value="{{$contact->gender}}">
                            @if($contact->gender == 1)
                                男性
                            @elseif($contact->gender == 2)
                                女性
                            @else
                                その他
                            @endif
                        </span>
                    </td>
                    <td class="admin-table__item">
                        <span class="admin-table__item-span">{{$contact->email}}</span>
                    </td>
                    <td class="admin-table__item">
                        <span class="admin-table__item-span" value="{{$contact['category_id']}}">{{$category['content']}}</span>
                    </td>
                    <td class="admin-table__item">
                        <button class="admin-table__button-submit" type="submit">詳細</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection