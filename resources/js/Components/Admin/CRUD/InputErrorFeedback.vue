<script>
export default {
    name: "InputErrorFeedback",
    props: ['error']
}
</script>

<template>
    <div style="height: 15px" class="text-red-500 mt-1">
        <div v-if="Boolean(error)">{{ error }}</div>
    </div>
</template>

<style scoped>

</style>
