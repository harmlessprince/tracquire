<template>
<!--    <ul>-->
<!--        <li v-for="post in posts" >-->
<!--            {{post}}-->
<!--        </li>-->
<!--    </ul>-->
    <ul class=" list-reset flex flex-col">
        <li class=" rounded-t relative -mb-px block border p-4 border-grey" v-for="post in posts">{{post}}</li>
    </ul>
</template>

<script>
export default {
    // name: "Posts",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        axios.get('/posts').then((resp) => {
            this.posts = resp.data;
        }).catch((error) => {
            console.log(error)
        });
        window.Echo.channel('post_created').listen('PostCreatedEvent', (event) => {
            this.posts.push(event.post.attributes.description);
        });
    },
    methods: {}
}
</script>

<style scoped>

</style>
