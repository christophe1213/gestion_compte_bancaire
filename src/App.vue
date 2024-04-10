
<template>
    <affichage></affichage>
    <!-- <Barchart></Barchart> -->
    <PieChart></PieChart>
</template>
<script setup>
    import { RouterLink, RouterView } from 'vue-router'
    import HelloWorld from './components/HelloWorld.vue'
    import affichage from './components/affichage.vue'
    // import graphe from '@/components/graphe.vue'
    import Barchart from '@/components/Barchart.vue'
    import PieChart from '@/components/PieChart.vue'

</script>


<style scoped>

</style>
