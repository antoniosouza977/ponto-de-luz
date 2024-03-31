<script>
export default {
    name: "ProductStatus",
    props: ['product'],
    methods: {
        getStatusLabel(status) {
            const status_label = {
                available: {
                    label: 'Disponível',
                    text_color: 'text-success',
                },
                promotion: {
                    label: 'Promoção',
                    text_color: 'text-warning',
                },
                unavailable: {
                    label: 'Indisponível',
                    text_color: 'text-danger',
                },
                'out-of-stock': {
                    label: 'Sem estoque',
                    text_color: 'text-danger',
                },
            }

            return status_label[status];
        }
    }
}
</script>

<template>
    <div class="col-xl-5 col-gl-6 col-12 p-0">Status:
        <span class="fw-bold" :class="this.getStatusLabel(product.status).text_color">{{ this.getStatusLabel(product.status).label }}</span>
    </div>
</template>

