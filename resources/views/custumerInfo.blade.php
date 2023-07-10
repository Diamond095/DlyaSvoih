@include('layouts.header')
<div class="custumer">
@isset($custummer->entrance)
<h1 class="place">Квартира</h1>
@endisset
@empty($custummer->entrance)
<h1 class="place">Павильон</h1>
@endempty
<h1>Имя: {{$custumer->name}}</h1>
<h1>Телефон: {{$custumer->phone}}</h1>
<h1>Улица: {{$custumer->street}}<span>,Дом: {{$custumer->house}}</span><h1>
@isset($custummer->entrance)
<h1>Квартира: {{$custumer->flat}}</h1>
@endisset
@empty($custummer->entrance)
<h1>Павильон: {{$custumer->flat}}</h1>
@endempty
@isset($custumer->entrance)
<h1>Подъезд: {{$custumer->entrance}}<span>,Домофон: {{$custumer->intercom}}</span></h1>
@endisset

<style>
h1{
    font-size:5vw;
    margin-bottom:10px;
}
.place{
    color:red;
}
.custumer{
    margin:auto;
}
.custumer{
    padding-bottom:350px;
}
</style>