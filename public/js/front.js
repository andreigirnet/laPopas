
function app() {
    return {
        data: null,
        cartData: null,
        cart:{},
        cartTotal: 0,
        quantity: 1,
        hoveredProduct: null,
        cartHovered: null,
        cartPath: ["/images/icons/grayCart.png","/images/icons/yellowCart.png"],
        currentLanguage: "en",
        // Function to make the Axios request
        async fetchData() {
            try {
                let lang = this.currentLanguage;
                let location = window.location.pathname;
                let cartDataResponse;
                if (location === '/cart'){
                    cartDataResponse = await axios.get('data/cart.json');
                    this.cartData = cartDataResponse.data[lang]
                    console.log(this.cartData);
                }
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
        addToCart(item, key){
            axios.post('api/cart/add/', {
                id: item.id,
                name: key,
                price: parseFloat(item.price),
                quantity: 1,
                lang: this.currentLanguage
            })
                .then(response => {
                    window.location.replace("http://127.0.0.1:8000/cart");
                })
                .catch(error => {
                    console.log(error)
                });
        },
        updateQuantity(rowId) {
        let quantity = document.getElementById('quantity_' + rowId)
            axios.put('/update-cart', {
                rowId: rowId,
                quantity: quantity.value
            })
            .then(response => {
                this.getCartTotal()
            })
            .catch(error => {
                // Handle errors, if needed.
            });
        },
        applyDiscount(){
            axios.post('/discount')
                .then(response => {
                    console.log('Discount applied')
                })
                .catch(error => {
                    console.log(error)
                });
        },
        getCartTotal() {
            axios.get('/cartTotal')
            .then(response =>{
                this.cartTotal = response.data
            })
        },

        // Call fetchData when the component is initialized
         init() {
             this.fetchData();
             this.getCartTotal()
        }
    }
}
