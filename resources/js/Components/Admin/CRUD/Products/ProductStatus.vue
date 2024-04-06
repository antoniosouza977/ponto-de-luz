<script>
export default {
    name: "ProductStatus",
    props: ['product'],
    methods: {
        getStatusLabel(status) {
            const status_label = {
                available: {
                    label: 'Disponível',
                    text_color: 'success',
                },
                promotion: {
                    label: 'Promoção',
                    text_color: 'warning',
                },
                unavailable: {
                    label: 'Indisponível',
                    text_color: 'danger',
                },
                'out-of-stock': {
                    label: 'Sem estoque',
                    text_color: 'danger',
                },
            }

            return status_label[status];
        }
    }
}
</script>

<template>
    <div class="md:1/2 w-full">Status:
        <Tag style="font-size: .9rem" :severity="this.getStatusLabel(product.status).text_color" :value="this.getStatusLabel(product.status).label"></Tag>
    </div>
</template>

