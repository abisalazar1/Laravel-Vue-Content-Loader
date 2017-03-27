<template>
    <div>
        <div v-show="ShowButton">
            <button class="__LoadContentBtn" @click="LoadContent" :disabled="isDisable">{{ LoadBtnText }}</button>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['ContentType', 'SingleItem'],
        data : function () {
            return{
                Page: null,
                LoadBtnText : this.$root.ContentLoaderConfig.LoadBtnText,
                isDisable: false
            }
        },
        computed: {
            PageChecker : function () {
              this.Page = (this.$root.ContentLoaderConfig.AutoLoadContent)?  0 : 1;
            },
             ShowButton : function () {
                return this.ShowButton = (this.Page >= this.$parent.ProcessData.last_page)? false : true ;
            }

        },
        methods : {
            LoadContent : function () {
               this.Page ++;
               this.DisableBtn();
               axios({
                    method: 'GET',
                    url: '/load?page=' + this.Page,
                    params: {
                    ContentType: this.ContentType,
                    SingleItem: this.SingleItem,
                  }
                }).then(function (response) {
                    if(this.Page < 2){
                        this.$parent.ProcessData = response.data;
                    }else{
                        this.$parent.ProcessData.data = this.$parent.ProcessData.data.concat(response.data.data);
                    }
                    this.EnableBtn();
                }.bind(this)).catch(function (error) {
                    console.log(error);
                     this.EnableBtn();
                });

            },
            DisableBtn : function () {
                this.LoadBtnText = "Loading";
                this.isDisable = true;
            },
            EnableBtn : function () {
                 this.LoadBtnText = this.$root.ContentLoaderConfig.LoadBtnText;
                 this.isDisable = false;
            }
        },
        created: function () {
            if(this.$root.ContentLoaderConfig.AutoLoadContent){
                this.LoadContent();
            }
        }
    }
</script>
