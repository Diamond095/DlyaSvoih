<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="resources/css/style_of_form_order.css">

 @include('layouts.header')
<form action="" method="post">
<div class="form-group">
    <label for="phone-input">Имя<span>Фамилия</span></label>
</div>
<div class="form">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Введите ваше имя">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Введите вашу фамилию">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="phone-input">Телефон</label>
    <input type="tel" class="form-control" id="phone-input" placeholder="Введите номер мобильного телефона">
</div>

<div class="form-group">
    <label for="email-input">Электронная почта</label>
    <input type="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="Введите адрес электронной почты">
</div>
<div>
    <div class="form-group">
        <label for="phone-input">Улица<span>Дом</span><span>Квартира</span></label>
    </div>
</div>
<div class="form">
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="">
        </div>
    </div>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">
        Картой
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
        Наличные
    </label>
</div>

<button type="submit" class="btn btn-primary">Заказать</button>
</form>
@include('layouts.footer')