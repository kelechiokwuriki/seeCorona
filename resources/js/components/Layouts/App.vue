<template>
    <div>
        <Header></Header>

        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>

        <Footer></Footer>
    </div>
</template>


<script>

</script>


<style>
    .fade-enter, .fade-leave-to {
        opacity: 0;
        transform: translateX(2em);
    }

    .fade-enter-active, .fade-leave-active {
        transition: all .3s ease;
    }
</style>
