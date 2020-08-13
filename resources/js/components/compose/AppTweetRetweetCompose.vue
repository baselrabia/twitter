<template>

     <form class="flex" @submit.prevent="submit">

        <img :src="$user.avatar" class="w-12 h-12 rounded-full mr-3" >

        <div class="flex-grow">
           <app-tweet-compose-textarea
                v-model="form.body"
                placeholder="Add a comment"

             />


             <div class="flex justify-between">
                <ul class="flex items-center">

                </ul>

                <div class="flex items-center justify-end">
                    <div class="">
                        <app-tweet-compose-limit
                        class="mr-2"
                        :body="form.body"
                        />
                    </div>
                    <button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none " >Retweet </button>
                </div>
            </div>

        </div>
     </form>
</template>

<script>
import axios from "axios";
import compose from "../../mixins/compose"

    export default {
        mixins: [
            compose
        ],

        methods: {
            async post () {
                await axios.post("/api/tweets", this.form);
            }
        }
    }

</script>
