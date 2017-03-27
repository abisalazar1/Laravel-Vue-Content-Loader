<template>
    <div>
        <app-user v-for="user in ProcessData.data" :user="user"></app-user>
        <app-content-loader ContentType="User" ></app-content-loader>
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
