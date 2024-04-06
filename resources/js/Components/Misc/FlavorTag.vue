<script>
export default {
    name: "FlavorTag",
    props: ['flavor', 'display_full']
}
</script>

<template>
    <span v-if="display_full"
        class="inline-block mt-1 border px-2 font-medium mr-1 rounded-lg"
        :style="'background-color: #' + flavor.tag_color + ';' + 'color: #' + flavor.text_color + ';'">
                                                  {{ flavor.name }}
                                              </span>
    <div v-else class="inline-block font-medium mr-3">
        <div class="flex border rounded">
            <div class="px-1">{{ flavor.name }}</div>
            <div class="rounded-r" style="width: .8rem"
                 :style="'background-color: #' + flavor.tag_color + ';'"></div>
        </div>
    </div>
</template>

<style scoped>

</style>
