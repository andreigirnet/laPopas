
function app() {
    return {
        data: null,
        allLangData: null,
        cartData: null,
        singleProduct: null,
        singlePageData:null,
        cart:{},
        categoryIndex: null,
        productIndex: null,
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
                cartDataResponse = await axios.get('/data/cart.json');
                this.cartData = cartDataResponse.data[lang]

                let singlePageResponse = await axios.get('/data/single.json');
                this.singlePageData = singlePageResponse.data[lang]

                const response = await axios.get('/data/data.json');
                this.allLangData = response.data
                this.data = response.data[lang];

                let currentPath = window.location.pathname;
                this.singleItem(currentPath)
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        singleItem(path){
            let newPath = this.decodePath(path)
            let keys = newPath.split("/")
            let slicedArray = keys.slice(2)
            if (this.categoryIndex === null && this.productIndex === null) {
                let categoryKeys = Object.keys(this.data.products)
                let productsKeys = Object.keys(this.data.products[slicedArray[0]])
                this.categoryIndex = categoryKeys.indexOf(slicedArray[0])
                this.productIndex = productsKeys.indexOf(slicedArray[1])
            }
            console.log(this.categoryIndex, this.productIndex)
            const productsKeys = Object.keys(this.data.products);
            let keyToDisplay = productsKeys[this.categoryIndex]
            const productsItems = Object.keys(this.data.products[keyToDisplay]);
            let itemToDisplay = productsItems[this.productIndex]
            this.singleProduct = this.data.products[keyToDisplay][itemToDisplay]
            this.singleProduct['name'] = itemToDisplay
        },
        decodePath(encodedPath) {
        try {
            const parts = encodedPath.split('/').map(part => decodeURIComponent(part));
            const decodedPath = parts.join('/');
            return decodedPath;
        } catch (error) {
            // Handle any potential decoding errors
            console.error("Error decoding path:", error);
            return null;
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
                this.cartTotal = response.data.original.total
                this.cartTotalBefore = response.data.original.totalBefore
                this.setDiscount()
            })
        },
         setDiscount(){
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
