<template>
    <button @click="this.openModal" class="button-45">Оставить отзыв</button>
    <div id="modal" class="modal-1">
        <div class="modal-content">
            <div class="form-1">
                <span @click="this.closeModal" style="width:40px; height: 40px;" class="close">&times;</span>
                <div class="info-message">Адрес и имя нужны для того, чтобы узнать делали ли вы заказ раньше у нас или нет</div>
                <div class="input-box">
                    <input data-required="true" v-model="name" type="text" class="input-field" placeholder="Имя">
                </div>
                <div class="input">
                    <div class="input-box">
                        <input data-max-length="6" type="text" v-model="street" class="input-field" placeholder="Улица">
                    </div>
                    <div class="input-box">
                        <input data-max-length="6" type="text" v-model="house" id="part" class="input-field"
                            placeholder="Дом">
                    </div>
                    <div class="input-box">
                        <textarea data-required="true" v-model="flat" data-max-length="6" id="part-2" data-min-length="2"
                            type="text" class="input-field" placeholder="Квартира Павильон"></textarea>
                    </div>
                </div>
                <div id="app">
  <div class="rating">
    <span class="star" v-for="star in 5" :class="{ selected: star <= rating }" @click="rate(star)">&#9733;</span>
  </div>
</div>

                <div class="input-box">
                    <textarea data-max-length="6" v-model="review" rows="5" cols="30" type="text" id="part-1"
                        class="input-field" placeholder="Ваш отзыв"></textarea>
                </div>
                <p class="errors-form">{{ this.error }}</p>
                <p class="success-message">{{ this.successMessage }}</p>
                <button @click="setNewReview()" type="submit" class="send-btn">Заказать</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
        rating:0,
        successMessage:'',
        error:''
        }
    },
    methods: {
        openModal() {
   var modal = document.getElementById("modal");
   modal.style.display = "block";
},
 closeModal() {
   var modal = document.getElementById("modal");
   modal.style.display = "none";
},
rate(value) {
      this.rating = value;
    },
    setNewReview(){
      axios.post('http://dlyasvoih.by/api/set/review', { 
        'оценка сервиса': this.rating,
        'имя':this.name,
        'квартира':this.flat,
        'улица': this.street,
        'дом': this.house,
        'отзыв':this.review,
         })
        .then(response => {
          this.successMessage = "Отзыв успешно отправлен!";
        })
        .catch(error => {
            if (error.response.status === 422) {
                        let exception = /\(and \d+ more errors\)/;
                        let exception_2 = /\(and \d+ more error\)/;
                        this.error = error.response.data.message.replace(exception, "");
                        this.error = this.error.replace(exception_2, "")
                        this.successMessage = null
            }
        });
    }
  }
}
</script>
<style scoped>
html {
    box-sizing: border-box;
}
#modal{
display:none;
}
p.errors-form {
    color: red
}

.success-message {
    color: rgb(0, 203, 24);
    font-size: 20px;
}

#part-1 {
    height: 150px;
    columns: 30;
    resize: none;
}


.timeSelect {
    width: 20px;
}

@media (max-width) {
    .modal-content {
        min-width: 95vw;
    }
}

.close {
    font-size: 25px;
}

.modal-1 {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}
.rating{
    margin-left:10px;
}
.errors-form {
    max-width: 70vw;
    font-size: 13px;
}
.star {
  font-size: 24px;
  cursor: pointer;
}

.selected {
  color: gold;
}


.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 0px 20px 20px 20px;
    border: 5px solid #a0cb9b;
    border-radius: 11px;
    width: 80vw;
    top: -45px;
}
.info-message{
    margin-bottom:10px;
}
.radio {
    display: flex;
}

*,
*::before,
*::after {
    box-sizing: inherit;
}

.input {
    display: flex;

}

.middle {
  text-align: center;
  margin: 10px 0;
}
.input-box {
    margin-left: 5px;
    margin-right: 5px;
}

a {
    color: inherit;
    text-decoration: none;
}

img {
    max-width: 100%;
}

body {
    font-family: Arial, Verdana, sans-serif;
}

.container-7 {
    width: 130px;
    margin-right: 0px;
    padding: 40px 15px;
}

.form-1 {
    display: block;
}

.input-field {
    display: block;
    width: 100%;
    border: 1px solid rgb(88, 152, 14);
    border-radius: 10px;
    padding: 20px 28px;
    margin-bottom: 10px;
    font-size: 20px;
}

.send-btn {
    border: 2px solid;
    border-color: #1ca800;
    padding: 20px 28px;
    background-color: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    margin-top: 10px;
    font-size: 16px;
    display: flex;
    margin: 0 auto;
    border-radius: 10px;
    cursor: pointer;

    transition: background-color .2s;
}

.send-btn:hover {
    background-color: rgb(21, 206, 37);
    border-color: #9cc69a;
}




.error .input-field {
    border-color: red;
}

.time {
    width: 300px;
}

.error-label {
    display: block;
    color: red;
    margin-bottom: 10px;
}

.container-7 {
    padding: 0 0;
    margin-left: 5px;
}

.container-7 label {
    display: flex;
    cursor: pointer;
    font-weight: 500;
    position: relative;
    overflow: hidden;
}

.container-7 label input {
    position: absolute;
    left: -9999px;
}

.container-7 label input:checked+span {
    background-color: #418143;
    color: white;
}

.container-7 label input:checked+span:before {
    box-shadow: inset 0 0 0 0.4375em #054f00;
}

.container-7 label span {
    display: flex;
    align-items: center;
    padding: 0.375em 0.75em 0.375em 0.375em;
    border-radius: 99em;
    transition: 0.25s ease;
    color: #418141;
}

.container-7 label span:hover {
    background-color: #d8e5d6;
}

.container-7 label span:before {
    display: flex;
    flex-shrink: 0;
    content: "";
    background-color: #fff;
    width: 1.5em;
    height: 1.5em;
    border-radius: 50%;
    margin-right: 0.375em;
    transition: 0.25s ease;
    box-shadow: inset 0 0 0 0.125em #005c02;
}

.container-10 {
    padding: 0;
    margin: 0 auto;
}

.checkbox {
    margin-top: 10px;
    display: inline-block;
    border-style: 4px solid;

}

.checkbox__inp {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
    appearance: none;
}

.checkbox__inner {
    display: inline-block;
    position: relative;
    font-size: 18px;
    padding-left: 74px;
}

.checkbox__inner:before {
    display: block;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 25px;
    border-radius: 18px;
    background-color: rgb(173, 173, 173);
    transition: background-color .3s;
}

.checkbox span.checkbox__inner {
    color: #418141;
    padding-bottom: 10px;
}

@media (min-width:600px) {
    .checkbox__inner {
        font-size: 15px;
    }
}

.checkbox__inner::after {
    display: block;
    content: "";
    position: absolute;
    width: 19.5px;
    height: 19.5px;
    border-radius: 15px;
    background-color: rgb(0, 98, 3);
    left: 3px;
    top: 3px;
    transition: background-color .3s, left .3s;
}

.checkbox__inp:checked+.checkbox__inner::before {
    background-color: rgb(1, 91, 4);
}

.checkbox__inp:checked+.checkbox__inner::after {
    background-color: white;
    left: 27px;
}

.checkbox__inp:focus+.checkbox__inner:before {
    outline: 1px solid gray;
    outline-offset: 3px;
}

.checkbox {
    margin-left: 20px;
}

#timeSelect {
    width: 150px;
    height: 40px;
    border: solid rgb(88, 152, 14);
    margin: auto;
    display: flex;
    border-radius: 10px;
    margin-bottom: 20px;
}

.radio {
    max-width: 80vw;
    min-height: 100px;
    flex-wrap: wrap;
    min-height: 150px;
}

.container-10 {
    width: calc(80vw - 200px);
    justify-content: center;
}

@media (min-width:675px) {
    .time-select {
        margin-left: calc(80vw - 200px - 311px);
    }
}

@media (min-width:769px) {
    .modal-content {
        width: 80vw;
    }
}

@media(max-width:600px) {
    .input-field {
        height: 50px;
        font-size: 3.5vw;
        padding: 5px;
    }

    .container-7 {
        width: 24vw;
    }

    .container-7 label {
        width: 24vw;
    }

    .container-7 span {
        font-size: 2.8vw;
    }

    .container-10 {
        margin: 0;
        width: 40vw;
    }

    .checkbox {
        margin-left: 10px;
    }

    .checkbox__inner {
        font-size: 3vw;
        padding-left: 50px;
        max-height: 10px;
    }

    .checkbox__inner::before {
        width: 40px;
        height: 20px;
    }

    .checkbox__inner::after {
        width: 15px;
        height: 15px;
    }

    .checkbox__inp:checked+.checkbox__inner::after {
        left: 23px;
    }
}



.button-45 {
  margin-top:30px;
  margin-bottom:30px;
  align-items: center;
  background-color: #e7ffe8;
  background-position: 0 0;
  border: 1px solid #6afa7d;
  border-radius: 11px;
  box-sizing: border-box;
  color: #0c9308;
  cursor: pointer;
  display: flex;
  font-size: 1rem;
  font-weight: 700;
  line-height: 33.4929px;
  list-style: outside url(https://www.smashingmagazine.com/images/bullet.svg) none;
  padding: 2px 12px;
  text-align: left;
  text-decoration: none;
  text-shadow: none;
  text-underline-offset: 1px;
  transition: border .2s ease-in-out,box-shadow .2s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  word-break: break-word;
}

.button-45:active,
.button-45:hover,
.button-45:focus {
  outline: 0;
}


.button-45:active {
  background-color: #37d32c;
  box-shadow: rgba(0, 0, 0, 0.12) 0 1px 3px 0 inset;
  color: #ffffff;
}

.button-45:hover {
  background-color: #e3ffe5;
  border-color: #a4faaf;
}

.button-45:active:hover,
.button-45:focus:hover,
.button-45:focus {
  background-color: #2cd334;
  box-shadow: rgba(0, 0, 0, 0.12) 0 1px 3px 0 inset;
  color: #FFFFFF;
}
#part-2 {
    resize: none;
    font-size:2.9vw;
    max-height:74px;
}
.button-45{
    margin-right:0px;
}
@media (min-width:600px){
#part-2{
    padding:5px;
    font-size:2vw;
    padding-right:20px;
}
}
</style>