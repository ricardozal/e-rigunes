<template>
    <v-hover v-slot="{ hover }">
        <v-card class="mx-auto">
                <v-img :src="cardImg()" height="30vh" width="100%">
                    <v-expand-transition>
                        <div v-if="hover" class="d-flex transition-fast-in-fast-out v-card--reveal">
                            <v-card-actions>
                                <v-spacer></v-spacer>

                                <v-btn icon>
                                    <v-icon>mdi-heart</v-icon>
                                </v-btn>

                                <v-btn icon>
                                    <v-icon>mdi-bookmark</v-icon>
                                </v-btn>

                                <v-btn icon color="green darken-2">
                                    <v-icon color="green darken-2">mdi-share-variant</v-icon>
                                </v-btn>
                            </v-card-actions>
                        </div>
                    </v-expand-transition>
                </v-img>
            <v-card-title>
                <span class="text-black-light">Botas Chelsea</span>
            </v-card-title>

            <v-card-subtitle>
                <span><b>$400.00</b></span>
            </v-card-subtitle>

        </v-card>
    </v-hover>
</template>

<script>
export default {
    components: {
    },
    props: [
    ],
    data () {
        return {
            show: false,
        }
    },
    mounted () {
    },
    created () {
    },
    computed: {
    },
    methods: {
        cardImg() {
            return '/img/botas1.jpg';
        },
    },
    watch: {
    }
}
</script>

<style scoped lang="scss">
.v-card--reveal {
    align-items: center;
    bottom: 0;
    left: 0;
    right: 0;
    justify-content: center;
    opacity: .5;
    position: absolute;
    background-color: #80CBC4;
}
</style>
