function app() {
    return {
        data: null,
        hoveredProduct: null,
        cartHovered: null,
        cartPath: ["/images/icons/grayCart.png","/images/icons/yellowCart.png"],
        currentLanguage: "en",
        // Function to make the Axios request
        async fetchData() {
            try {
                let lang = this.currentLanguage;
                const response = await axios.get('data/data.json');
                this.data = response.data[lang];
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        chooseLanguage(string) {
            this.currentLanguage = string
            this.fetchData();
        },

        // Call fetchData when the component is initialized
        async init() {
            await this.fetchData();
        }
    }
}
