<template>
    <div id="modal" class="modal-1">
        <div class="modal-content">
            <div class="form-1">
                <span @click="this.closeModal" style="width:40px; height: 40px;" class="close">&times;</span>
                <div class="input-box">
                    <input data-required="true" v-model="name" type="text" class="input-field" placeholder="Имя">
                </div>
                <div class="input-box">
                    <input data-required="true" v-model="phone" type="text" class="input-field"
                        placeholder="Мобильный телефон">
                </div>
                <div class="input-box">
                    <input data-required="true" type="text" v-model="email" class="input-field"
                        placeholder="Электронная почта">
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
                <div class="input-box">
                    <textarea data-max-length="6" v-model="comment" rows="5" cols="30" type="text" id="part-1"
                        class="input-field" placeholder="Комментарий к заказу"></textarea>
                </div>
                <p class="errors-form">{{ this.errors }}</p>
                <p class="success-message">{{ this.successMessage }}</p>
                <div class="radio">
                    <div class="container-7">
                        <label>
                            <input value="наличные" v-model="type_payment" type="radio" name="radio">
                            <span>Наличными</span>
                        </label>
                        <label>
                            <input type="radio" value="картой" v-model="type_payment" name="radio">
                            <span>Картой</span>
                        </label>
                    </div>
                    <div class="container-10">
                        <div class="time-select">
                            <label class="checkbox" for="checkbox">
                                <input v-model="IsChecked" class="checkbox__inp" type="checkbox" id="checkbox">
                                <span class="checkbox__inner">
                                    Заказать на определенное время
                                </span>
                            </label>
                            <div>
                                <div class="selecter">
                                    <select v-model="time" v-if="IsChecked" placeholder="Выберите время" id="timeSelect">
                                        <option disabled selected hidden class="select-time" value="">Выберите время
                                        </option>
                                        <option v-for="time in timeRange">{{ time }}</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button @click="setNewOrder()" type="submit" class="send-btn">Заказать</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {

    data() {
        return {
            type_form: localStorage.getItem('status_modal_window'),
            type_payment: null,
            IsChecked: false,
            timeRange: [],
            productsInBasket: null,
            type_custumer: null,
            errors: null,
            successMessage: null
        }
    },
    async mounted() {
        this.generateAvailableTimes();
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
            const body = document.getElementsByTagv - model("body")[0];
            body.classList.remove("modal-open");
            body.style.overflow = "visible";
        },
        add15Minutes(time) {
            let [hours, minutes] = time.split(":");
            let date = new Date();
            date.setHours(hours);
            date.setMinutes(minutes);
            date.setMinutes(date.getMinutes() + 15);

            let addedHours = String(date.getHours()).padStart(2, "0");
            let addedMinutes = String(date.getMinutes()).padStart(2, "0");

            return `${addedHours}:${addedMinutes}`;
        },
        generateAvailableTimes() {
            let endTime = "19:00";
            let currentTime = new Date();
            let currentMinutes = currentTime.getMinutes();
            let currentHours = currentTime.getHours();
            let minutesToAdd;
            let startTime;
            console.log(currentHours)
            console.log(currentMinutes)
            if (currentMinutes >= 45) {
                minutesToAdd = 0;
            } else if (currentMinutes >= 30) {
                minutesToAdd = 45;
            } else if (currentMinutes >= 15) {
                minutesToAdd = 30;
            } else {
                minutesToAdd = 15;
            }
            if (currentHours >= 12 && currentHours < 19) {
                if (minutesToAdd == 0) {
                    startTime = `${currentHours}:"00"`;
                }
                else {
                    startTime = `${currentHours}:${minutesToAdd}`;
                }
            }
            if (currentHours < 12 && currentHours > 9) {
                startTime = "12:00";
            }
            while (startTime !== endTime) {
                this.timeRange.push(`${startTime}-${this.add15Minutes(startTime)}`);
                startTime = this.add15Minutes(startTime);
            }
        },
        setNewOrder() {
            this.productsInBasket = localStorage.getItem('card');
            axios.post('http://dlyasvoih.by/api/setorder', {
                'имя': this.name,
                'улица': this.street,
                'электронная почта': this.email,
                'мобильный телефон': this.phone,
                'дом': this.house,
                'квартира': this.flat,
                'тип платежа': this.type_payment,
                'время': this.time,
                'блюда': this.productsInBasket,
                'комментарий': this.comment
            }
            ).then(
                response => {
                    this.errors = null;
                    this.successMessage = "Спасибо за ваш заказ, ваш заказ принят. После получения заказа оставьте отзыв"
                    localStorage.removeItem('card');
                    localStorage.removeItem('status_modal_window')
                    document.getElementById("basket").style.display = "none";
                    document.getElementById("makeOrder").style.display = "none";
                    document.getElementById("footer").style.bottom = "0";
                    document.getElementById("footer").style.left = "0";
                    document.getElementById("empty").style.display = "contents";
                    document.getElementById("title").style.marginBottom = "30px";
                    document.getElementById("footer").style.marginTop = "400px";
                    document.querySelector('.error-message').style.display = "none";
                }

            ).catch(
                error => {
                    if (error.response.status === 422) {
                        let exception = /\(and \d+ more errors\)/;
                        let exception_2 = /\(and \d+ more error\)/;
                        this.errors = error.response.data.message.replace(exception, "");
                        this.errors = this.errors.replace(exception_2, "")
                        this.successMessage = null

                    }
                }
            )
        }
    }
}
</script>
<style scoped>
html {
    box-sizing: border-box;
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
#part-2{
resize:none;
font-size:3vw;
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

.errors-form {
    max-width: 70vw;
    font-size: 13px;
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
@media (min-width:600px){
#part-2{
    padding:5px;
    font-size:2vw;
    padding-right:20px;
}
}
@media (max-width:500px) {
    .selecter{
        margin-top:37px;
    }
}
</style>