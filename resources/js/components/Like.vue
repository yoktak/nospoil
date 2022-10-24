<template>
    <div>
        <i class="bi bi-heart-fill before" v-if="!liked" type='button' @click="like(postId)">
            {{ likeCount }}
        </i>
        <i class="bi bi-heart-fill after" v-else type='button' @click="unlike(postId)" style='color: red'>
            {{ likeCount }}
        </i>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultLiked', 'defaultCount'],
        
        data(){
            return{
                liked: false,
                likeCount: 0,
            }
        },
        created(){
            this.liked = this.defaultLiked
            this.likeCount = this.defaultCount
        },
        
        methods: {
            like(postId){
                let url = `/api/like/${postId}`
                
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = true
                    this.likeCount = response.data.likeCount
                })
                .catch(error=>{
                    alert(error)
                });
            },
            unlike(postId){
                let url = `/api/unlike/${postId}`
                
                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = false
                    this.likeCount = response.data.likeCount
                })
                .catch(error=>{
                    alert(error)
                });
            }
        }
     }
</script>
