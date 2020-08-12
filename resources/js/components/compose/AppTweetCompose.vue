<template>

     <form class="flex" @submit.prevent="submit">

        <img :src="$user.avatar" class="w-12 h-12 rounded-full mr-3" >

        <div class="flex-grow">
           <app-tweet-compose-textarea
                v-model="form.body"
             />


            <app-tweet-image-preview
                    :images="media.images"
                    v-if="media.images.length"
                />

            <app-tweet-video-preview
                    :video="media.video"
                    v-if="media.video"
                />


             <div class="flex justify-between">
                <ul class="flex items-center">
                    <li class="mr-4">
                        <app-tweet-compose-media-button
                        id="media-compose"
                        @selected="handleMediaSelected"
                        />
                    </li>
                </ul>

                <div class="flex items-center justify-end">
                    <div class="">
                        <app-tweet-compose-limit
                        class="mr-2"
                        :body="form.body"
                        />
                    </div>
                    <button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none " >Tweet </button>
                </div>
            </div>

        </div>
     </form>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                form:{
                    body : '',
                    media: []
                },

                media:{
                    images : [],
                    video : null
                },

                mediaTypes:{

                }
            }
        },
        methods: {
            async submit () {
                await axios.post('/api/tweets',this.form)
            },
            async getMediaTypes(){
               let response = await axios.get('/api/media/types')
               this.mediaTypes = response.data.data
            },
            handleMediaSelected(files){
                Array.from(files).slice(0, 4).forEach((file) => {
                    if (this.mediaTypes.image.includes(file.type)) {
                    this.media.images.push(file)
                    }

                    if (this.mediaTypes.video.includes(file.type)) {
                    this.media.video = file
                    }
                })

                if (this.media.video) {
                    this.media.images = []
                }
            }
        },
        mounted () {
            this.getMediaTypes()
        }

    }

</script>
