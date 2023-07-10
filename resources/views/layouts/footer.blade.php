<link rel="stylesheet" href="http://dlyasvoih.by/public/css/style_footer.css">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

  <footer id="footer"  class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Страницы Сайта</h4>
  	 			 <ul>
        @guest
		 <li><a href="{{route('main')}}">Главная</a></li>
        <li><a href="{{route('basket')}}">Корзина</a></li>
        <li><a href="{{route('dostavka')}}">Доставка</a></li>
        <li><a href="{{route('aboutus')}}">О нас</a></li>
        @endguest
        @auth
        <li><a href="">Заказы</a></li>
        @endauth
        <li><a href="{{asset('review')}}">Отзывы</a></li>
      </ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Контакты</h4>
  	 			<ul>
  	 				<li><a href>+375291825317</a></li>
  	 				<li><a href>+375296500034</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Сайт создан и поддерживается</h4>
  	 			 <ul>
            
        <li><a href="https://t.me/vanish00">@vanish00</a>
         <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(39, 223, 255)" height="20px" width="20px" viewBox="0 0 496 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/></svg>
        </li>
      </ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Социальные сети</h4>
  	 			<div class="social-links">
  	 				<a href="https://instagram.com/dlya_svoih_cafe?igshid=MTIzZWMxMTBkOA=="><i class="fab fa-instagram"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
</div>
</body>
</html>

<script>
const elementToShow = document.getElementById('footer');
const buttonToHide = document.querySelector('.fa-bars');

buttonToHide.addEventListener("click", () => {
  elementToShow.style.display='none';
});
const exit=document.querySelector('.fa-times');
exit.addEventListener('click',()=>{
    elementToShow.style.display="block";
      if(window.location.pathname.split('/')[1]=='category' && document.querySelector('.card')==null){
 document.querySelector('.footer').style.marginTop='250px';
}
})



</script>
