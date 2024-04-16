export function maskCurrency(value) {

    return Number(value).toLocaleString("pt-BR", {minimumFractionDigits: 2});
}

export function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    const windowWidth = window.innerWidth || document.documentElement.clientWidth;

    const isVerticallyVisible = rect.top <= windowHeight && rect.bottom >= 0;
    const isHorizontallyVisible = rect.left <= windowWidth && rect.right >= 0;

    return  isVerticallyVisible && isHorizontallyVisible;
}
