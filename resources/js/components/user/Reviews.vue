<template>
    <div class="container">
        <form-review />
        <p class="middle-rate">Средняя оценка:{{ Math.floor(this.middle_rate * 10) / 10 }}</p>
        <div :class="['review-card', { 'expanded': review.text.length > 20 }]" v-for="review in reviews">
            <div class="top">
                <div class="name">{{ review.name }}</div>
                <div class="date">{{ review.created_at }}</div>
                <div class="rating">
                    <div v-for="star in review.rate" :key="star" class="rating" style="color:gold;">★</div>
                    <div v-for="emptyStar in (5 - review.rate)" :key="emptyStar" class="star">★</div>
                </div>
            </div>

            <div class="bottom">
                <div class="text">Отзыв:</div>
                <p>{{ review.text }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Form from './Form_Reviews.vue';
export default {
    components: {
        'form-review': Form
    },
    computed: {
        emptyStars(rate) {
            return 5 - rate;
        },
    },
    data() {
        return {
            reviews: null,
            middle_rate: null
        }
    },
    mounted() {
        this.getReviews()
    },
    methods: {
        getReviews() {
            axios.get('http://dlyasvoih.by/api/reviews').
                then(res => {
                    this.reviews = res.data
                    this.reviews.forEach(element => {
                        this.middle_rate = this.middle_rate + element.rate;
                        
                    });
                    for(let i=0; i<this.reviews.length; i++){
                        if(i<this.reviews.length/2){
                        let temp=this.reviews[i];
                        this.reviews[i]=this.reviews[this.reviews.length-i-1];
                        this.reviews[this.reviews.length-i-1]=temp;
                        }}
                        for(let i = 0; i < this.reviews.length; i++){
                            const dateObj = new Date(this.reviews[i].created_at);
                            const year = dateObj.getFullYear();
                            const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                            const day = dateObj.getDate().toString().padStart(2, '0');
                             this.reviews[i].created_at = `${year}-${month}-${day}`;   
                    } 
                    this.middle_rate = this.middle_rate / this.reviews.length;
                });
        }
    }
}
</script>

<style scoped>
.container {
    margin: auto;
    max-width: 80vw;
}

.review-card {
    width: 80vw;
    border: 2px solid green;
    border-radius: 10px;
    padding: 10px;
    margin: 0 auto;
    margin-bottom: 20px;
    max-width: 80vw;
}

.review-card.expanded {
    height: auto;
    width: auto;
    max-width: 80vw;
}

#text {
    max-width: 80vw;
}

.review-card p {
    margin: 0;
}

.rating {
    display: flex;
    min-width: 20px;
}

.star {
    min-width: 20px;
}

.top {
    display: flex;
    justify-content: space-between;

}

.rating {
    color: black;
}

.name {
    font-weight: bold;
}

.bottom {
    margin-bottom: 10px;
}
</style>