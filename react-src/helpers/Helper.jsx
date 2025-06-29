class Helper{
    static getImageUrl(imagePath) {
        return new URL(`wp-content/plugins/partial-checkout/assets${imagePath}`, partialCheckout?.BASE_URL).href;
    }
}

export default Helper;