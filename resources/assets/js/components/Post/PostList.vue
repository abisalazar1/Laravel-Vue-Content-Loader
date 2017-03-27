<template>
    <div>
        <app-post v-for="post in ProcessData.data" :post="post"></app-post>
        <app-content-loader ContentType="Post" ></app-content-loader>
    </div>
</template>

<script>

    export default{
        data : function () {
            return{
                ProcessData : [],
            }
        }
    }
</script>
