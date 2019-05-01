<template>
   
       
                    

                  
                        <form class="form-horizontal" action="newchat" method="post" @submit.prevent="newchating">
        <div class="row">
          <div class="col-sm-10 col-xs-8">
            <input type="text" class="form-control" id="" v-model="message" placeholder="Message" />
             
            
          </div>
          <div class="col-sm-2 col-xs-4">
            <button type="submit" class="btn btn-block" style="background-color: #F2633A; color: #fff;">Send</button>
          </div>
        </div>
      </form>
                  
</template>

<script>
    export default {
     props: ['modeldata'],
    data(){
    return{

    
    
    message: '',
    groupid: modeldata

    }

    },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
        newchating(){
        axios.post('newchat',{message:this.message});
        
        }
        }

    }
</script>
