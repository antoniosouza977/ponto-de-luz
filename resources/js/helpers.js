
export default function maskCurrency(value) {

    return Number(value).toLocaleString("pt-BR", { minimumFractionDigits: 2 });
}
