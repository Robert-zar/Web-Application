<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Организация научных конференций</title>
<link rel="stylesheet" type="text/css"
        href="CSS_conferencia.css">
<meta name="description" content="Веб-приложение для организации научных конференций."/>
        <meta name="keywords" content="наука, конференции" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        
  </head>


  <body>
    
    <header class="header">
     <img class="image" src="./Картинки/shapka2.png" width="100%" height="100%">  

     <nav class="navigator">
      <ul class = "nav_list">
      <li class = "nav_item"><a href="glavnaya.html">Главная</a></li>
      <li class = "nav_item"><a href="#" id="all_conferences">Конференции</a>
        <!-- <ul class="menu_conf">
          <li><a href="#">Каталог событий</a></li>
          <li><a href="#">Каталог принятых статей</a></li>
        </ul> -->
      </li>
      <li class = "nav_item"><a href="registracia.html">Личный кабинет</a></li>
      </ul>
    </nav>
    </header>
  

    <!-- <nav class="navigator_2">
        <ul class = "nav_list_2">
        <li class = "nav_item_2"><a href="#">Каталог событий</a></li>
        <li class = "nav_item_2"><a href="#">Каталог принятых статей</a></li>
        </ul>
      </nav> -->

      <div class="wrapper">
    <h1 id="conf-header">Каталог всех конференций</h1>
    <ul id="conferences_list"></ul>
</div>
        

      

      <!-- <footer class="footer">
        <div class="pad">
        <div class="p1">
          <i class="fa fa-map-marker"></i>
          <p class="p1">г. Краснодар, ул. Ставропольская, 149</p>
        </div>

        <div class="p2">
          <i class="fa fa-phone"></i>
          <p class="p1">+7 (495) 555-55-55</p>
        </div>

        <div class="p3">
          <i class="fa fa-envelope"></i>
          <p class="p1">support@KonFerence.com</p>
        </div>
        </div>
       </footer> -->

  </body>
  
  <style>

html {
  background:url('./Картинки/fon.png') no-repeat center center;

  /* Принудительно указываем высоту равную 100% от высоты окна браузера */
  min-height:100%;
  max-width: 100%;
  /* Магия */
  background-size:cover;
}

body {
    margin: 0;
    padding: 0;
    min-height:100%;
  }
  

  .img1 {
    max-width: 100%;
  }
  .navigator {
    width: 100%;
    height: max-content;
    display: flex;
    justify-content: space-evenly;
    position: absolute;
    z-index: 1;
}

  .header {
    height: 70px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav_list {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}

nav ul li {
    text-transform: uppercase;
    list-style-type: none;
}

nav ul li a {
    font-family: Georgia;
    text-decoration: none;
    color: #ffffff;
    font-size: 21px;

}
  
nav ul li a:hover {
    color: #f5d9af;
  }

  h1 {
    font-size: 36px;
    margin-bottom: 20px;
  }
  
  ul {
    list-style: none;
    margin-bottom: 20px;
  }
  
  ul li a {
    text-decoration: none;
    font-weight: bold;
  }
  
.navigator_2 {
    width: 100%;
    height: max-content;
    display: flex;
    justify-content: space-evenly;
    position: absolute;
    z-index: 1;

	  overflow: hidden;
	
	  border-radius: 10px;
	  box-shadow: 5px 20px 50px #000;
    margin-left: 570px;
    margin-top: 50px;
    background-color: rgba(8, 5, 3, 0.85);

    padding: 15px;
    margin-top: 100px;
    margin-left: -30px;
    border-radius: 9px; 
}
.nav_list_2 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 100%;
}





  .menu_conf {
    background: #273037;
    position: absolute;
    top: 100%;
    z-index: 5;
    width: 350px;
    height: 170px;
    opacity: 0;
    transform: scaleY(0);
    transform-origin: 0 0;
    transition: .5s ease-in-out;
    padding-top: 50px
  }
  .menu_conf a {
    color: white;
    text-align: left;
    padding: 12px 15px;
    font-size: 13px;
    border-bottom: 1px solid rgba(255,255,255,.1);
  }
  .menu_conf li:last-child a { border-bottom: none; }
  .nav_list > li:hover .menu_conf {
    opacity: 1;
    transform: scaleY(1);
  }
.menu_conf a {
    font-size: 17px;
}
.menu_conf ul{
    margin:auto;
}
.menu_conf li {
    margin:0 20px 20px 0; 
    vertical-align:top;
}

 /* .footer {
  background-color: rgb(12, 6, 39);
  padding: 30px 0;
  height: 100%;
  position: relative;
  margin-top: -0.3em;
}
.p1 {
  color: white;
  font-family: Georgia;
  display:  inline-block;
}

.pad {
  display: table;
  object-fit: cover;
  margin-left: 30px
  } */
   
 
.nav {
position : absolute;
top  : 90px;
width  : 100%;

}

.wrapper {
    display: none;
}


/* Оформление списка конференций */
#conferences_list {
  width: 100%;
  list-style: none;
  padding: 0;
  margin: 0;
}

/* Стиль элементов списка */
#conferences_list li {
  margin-bottom: 20px;
  padding: 10px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

/* При наведении на элемент списка */
#conferences_list li:hover {
  background-color: #f5f5f5;
}

/* Заголовок конференции */
#conferences_list li h3 {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
}

/* Описание конференции */
#conferences_list li p {
  margin: 0;
  font-size: 14px;
  color: #888;
}

#conf-header {
  font-size: 36px;
  font-weight: bold;
  text-decoration: underline;
  background-color: #f5d9af;
  padding: 5px 10px;
  border-radius: 5px;
}


  </style>

  <script>
$('#all_conferences').click(function(e) {
  e.preventDefault();
  $.ajax({
    type: "GET",
    url: "full_conferencia.php",
    success: function(response) {
      var conferences = JSON.parse(response);
      $('#conferences_list').empty();
      $.each(conferences, function(i, conference) {
        $('#conferences_list').append('<li>' + conference.title + ' (Добавил: ' + conference.username + ')</li>');
      });
      $('#conf-header').text('Каталог всех конференций');
      $('.wrapper').show();
    },
    error: function() {
      alert('Ошибка при загрузке конференций');
    }
  });
});



  </script>
</html>