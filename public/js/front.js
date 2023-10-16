
function app() {
    return {
        data: null,
        cart:{},
        quantity: 1,
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
        cartGetItems(){
            axios.get('/cart/get').then(response => {
                this.cart.cartcartTotal = response.data.total
                this.cart.cartSubTotal = response.data.items_subtotal
                this.cart.cartTotalQty = response.data.quantities_sum
                this.cart.cartItems = response.data.items
                console.log(response.data)
            }).catch(error => {
                console.error(error);
            });
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
        updateQuantity(rowId, quantity) {
        axios.post('/update-cart', {
            rowId: rowId,
            quantity: quantity
        })
            .then(response => {
                // Handle success, if needed.
            })
            .catch(error => {
                // Handle errors, if needed.
            });
        },

        // Call fetchData when the component is initialized
         init() {
             this.fetchData();
             this.cartGetItems()
        }
    }
}
