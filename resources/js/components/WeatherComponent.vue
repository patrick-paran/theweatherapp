<template>
    <div class="container grid  place-items-center mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form @submit.prevent=getWeather()>
                       <div class="flex justify-center">
                          <div class="mb-3 xl:w-96">
                            
                            <label for="exampleSearch2" class="form-label inline-block mb-2 text-gray-700">Search</label>
                            <input
                              type="search"
                              v-model="city"
                              class="
                                form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                              "
                              id="exampleSearch2"
                              placeholder="City"
                            />
                          </div>
                         
                        </div>
                         <button type="submit" class="mt-4  bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                      Display Weather {{message}}
                    </button>
                   
                     </form>

                    </div>
                </div>
            </div>

             
        </div>
    </div>
    <div class="mt-5 p-6" v-if= 'weatherData' >
                        {{weatherData}}
            </div>
</template>

<script>
    export default {

        data(){
            return{
                city :'',
                invoices:null,
                weatherData:'',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            getWeather(){ 
               fetch("https://api.openweathermap.org/data/2.5/weather?q="+this.city+"&APPID=71575634a4b0744557175bcfa620377d")
                .then(res => res.json())
                .then(data =>  this.weatherData = data) 

                console.log(self.weatherData);
                
             
            }
        }
    }
</script>
