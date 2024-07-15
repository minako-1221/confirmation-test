@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form action="/confirm" class="form" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-name">
                    <input type="text" name="firstname" placeholder="例：山田" value="{{old('firstname')}}">
                    @error('firstname')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                    <input type="text" name="lastname" placeholder="例：太郎" value="{{old('lastname')}}">
                    @error('lastname')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-radio">
                    <input type="radio" id="male" name="gender" value="1" {{ old('gender', $contact['gender'] ?? '') === '1' ? 'checked' : '' }} checked>
                    <label for="male">男性</label>
                    <input type="radio" id="female" name="gender" value="2" {{ old('gender', $contact['gender'] ?? '') === '2' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" id="other" name="gender" value="3" {{ old('gender', $contact['gender'] ?? '') === '3' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                    @error('gender')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
                    @error('email')
                        <div class="form__error">
                                {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-tel">
                    <input type="tel" name="phone1" placeholder="例：090" value="{{old('phone1')}}">
                    <span>-</span>
                    <input type="tel" name="phone2" placeholder="例：1234" value="{{old('phone2')}}">
                    <span>-</span>
                    <input type="tel" name="phone3" placeholder="例：5678" value="{{old('phone3')}}">
                    @error('phone1')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                    @error('phone2')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                    @error('phone3')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1−2−３" value="{{old('address')}}">
                    @error('address')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select name="category_id" >
                        <option value="{{$category['id']}}">{{$category['content']}}</option>
                    </select>
                    @error('category_id')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" value="">{{old('detail')}}</textarea>
                    @error('detail')
                        <div class="form__error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>


@endsection