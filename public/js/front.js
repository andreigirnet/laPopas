
function app() {
    return {
        data: null,
        allLangData: null,
        cartData: null,
        cart:{},
        cartTotal: 0,
        cartTotalBefore: 0,
        discount:'',
        productCartName: '',
        quantity: 1,
        hoveredProduct: null,
        cartHovered: null,
        cartPath: ["/images/icons/grayCart.png","/images/icons/yellowCart.png"],
        currentLanguage: "",
        // Function to make the Axios request
        async fetchData() {
            try {
                let lang = localStorage.getItem('lang');
                this.currentLanguage = lang
                let cartDataResponse;

                cartDataResponse = await axios.get('data/cart.json');
                this.cartData = cartDataResponse.data[lang]

                const response = await axios.get('data/data.json');
                this.allLangData = response.data
                this.data = response.data[lang];
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        chooseLanguage(string) {
            this.currentLanguage = string
            localStorage.setItem('lang',  string);
            this.currentLanguage = localStorage.getItem('lang');
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
                console.log(response.data.original)
                this.cartTotal = response.data.original.total
                this.cartTotalBefore = response.data.original.totalBefore
                this.setDiscount()
            })
        },
         setDiscount(){
            console.log(this.cartTotal)
            if(this.cartTotalBefore > 100 && this.cartTotalBefore < 200){
                this.discount = '5%'
                console.log(this.discount)
            }else if(this.cartTotalBefore > 200){
                this.discount = '10%'
                console.log(this.discount)
            }else{
                this.discount = ''
                console.log(this.discount)
            }
        },
        // Call fetchData when the component is initialized
         init() {
             this.fetchData();
             this.getCartTotal();
        }
    }
}
