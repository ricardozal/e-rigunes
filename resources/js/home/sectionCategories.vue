<template>
    <v-container fluid class="mt-5 p-0">
        <v-row class="m-md-0 m-1" justify="content-center">
            <v-col sm="8" class="p-0">
                <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
                    <div class="d-flex justify-content-between">
                        <div class="mr-2">
                            <span class="text-black-light">Hombres</span>
                        </div>
                        <div class="mr-2">
                            <span class="text-black-light">Mujeres</span>
                        </div>
                        <div class="mr-2">
                            <span class="text-black-light">Niños</span>
                        </div>
                    </div>

                    <div>
                        <span class="text-black-light">Anterior</span>
                        <span class="text-black-light">Siguiente </span>
                    </div>
                </div>
            </v-col>
            <v-col sm="8" class="p-0">
                <v-row class="m-0 p-0">
                    <v-col sm="12" md="6" lg="3">
                        <card-category></card-category>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
<!--    <div class="container-fluid mt-5 p-0">-->
<!--        <div class="row justify-content-center m-0">-->
<!--            <div class="col-8 p-0">-->
<!--                <div class="d-flex flex-wrap justify-content-between">-->
<!--                    <div class="d-flex justify-content-between">-->
<!--                        <div class="mr-2">-->
<!--                            <span class="text-black-light">Hombres</span>-->
<!--                        </div>-->
<!--                        <div class="mr-2">-->
<!--                            <span class="text-black-light">Mujeres</span>-->
<!--                        </div>-->
<!--                        <div class="mr-2">-->
<!--                            <span class="text-black-light">Niños</span>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div>-->
<!--                        <span class="text-black-light">Anterior</span>-->
<!--                        <span class="text-black-light">Siguiente </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-8 p-0 d-flex flex-row flex-wrap">-->
<!--                <div class="row m-0 p-0">-->
<!--                    <div class="col-lg-3 col-md-6 col-12">-->
<!--                        <card-category></card-category>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-md-6 col-12">-->
<!--                        <card-category></card-category>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-md-6 col-12">-->
<!--                        <card-category></card-category>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-md-6 col-12">-->
<!--                        <card-category></card-category>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
import cardCategory from './cardCategory'
export default {
    components: {
        cardCategory
    },
    props: [
    ],
    data () {
        return {
        }
    },
    mounted () {
    },
    created () {
    },
    computed: {
    },
    methods: {
    },
    watch: {
    }
}
</script>

<style scoped lang="scss">
</style>
