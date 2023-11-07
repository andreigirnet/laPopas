
function app() {
    return {
        data: null,
        finalName: "",
        finalSubmitError: "",
        counterSingleError: 0,
        counterSingleSalatError: 0,
        counterSingleSauceError:0,
        selectedMeatItems: [],
        selectedVeggieItems: [],
        selectedCartofItems: '',
        selectedSalatItems: '',
        selectedSauceItems: '',
        errorMessageProduct: "",
        errorMessageProductBelow: "",
        allLangData: null,
        serviceData: null,
        deliveryData: null,
        cartData: null,
        contactData: null,
        singleProduct: null,
        singlePageData:null,
        bulkPrice: null,
        checkoutData: null,
        platouSize: "2",
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
                if (window.location.pathname === '/cart') {
                    let cartDataResponse;
                    cartDataResponse = await axios.get('/data/cart.json');
                    this.cartData = cartDataResponse.data[lang]
                }
                if (window.location.pathname === '/service') {
                    let serviceResponse;
                    serviceResponse = await axios.get('/data/service.json');
                    this.serviceData = serviceResponse.data[lang];
                }
                if (window.location.pathname === '/contact') {
                    let contactResponse;
                    contactResponse = await axios.get('/data/contacts.json');
                    this.contactData = contactResponse.data[lang];
                }
                if (window.location.pathname === '/delivery') {
                    let deliveryResponse;
                    deliveryResponse = await axios.get('/data/delivery.json');
                    this.deliveryData = deliveryResponse.data[lang];
                }
                if (window.location.pathname === '/checkout') {
                    let checkoutResponse;
                    checkoutResponse = await axios.get('/data/checkout.json');
                    this.checkoutData = checkoutResponse.data[lang];
                    console.log(this.checkoutData);
                }
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
            const productsKeys = Object.keys(this.data.products);
            let keyToDisplay = productsKeys[this.categoryIndex]
            const productsItems = Object.keys(this.data.products[keyToDisplay]);
            let itemToDisplay = productsItems[this.productIndex]
            this.singleProduct = this.data.products[keyToDisplay][itemToDisplay]
            this.singleProduct['name'] = itemToDisplay
            let idsToCheck = [77,78,79,80,81,82,83,84]
            if (idsToCheck.includes( this.singleProduct.id)){
                this.bulkPrice = this.singleProduct.bulkPrice[0]
            }

        },
        updatePrice(value){
            this.bulkPrice = this.singleProduct.bulkPrice[value]
            this.platouSize = this.singleProduct.person[value]
        },
        setName(){
            if (this.singleProduct['id'] === 77) {
                if (this.singleProduct.name && this.selectedMeatItems[0] && this.selectedMeatItems[1] && this.selectedMeatItems[2] && this.selectedCartofItems && this.selectedSalatItems && this.selectedSauceItems) {
                    this.finalSubmitError = ""
                    this.finalName = this.singleProduct.name + "(" + this.selectedMeatItems[0] + '/' + this.selectedMeatItems[1] +  "/" + this.selectedMeatItems[2]+ ")"+ "(" + this.selectedCartofItems + ")"+ "(" + this.selectedSalatItems + ")" + "(" + this.selectedSauceItems + ")" + " • For " + this.platouSize + " people";
                } else {
                    this.finalNamePlatou = ''
                    if (this.currentLanguage === 'en') {
                        this.finalSubmitError = "Please choose from all select fields as required"
                    } else if (this.currentLanguage === 'ro') {
                        this.finalSubmitError = "Alege atent din toate selectiile conform instructiunilor"
                    } else {
                        this.finalSubmitError = "Выберите 3 товара из всеx раздела"
                    }
                }
            }else if(this.singleProduct['id'] === 78){
                if (this.singleProduct.name && this.selectedMeatItems[0] && this.selectedMeatItems[1] && this.selectedMeatItems[2] && this.selectedMeatItems[3] && this.selectedMeatItems[4] && this.selectedVeggieItems[0]  && this.selectedVeggieItems[1]) {
                    this.finalSubmitError = ""
                    this.finalName = this.singleProduct.name + "(" + this.selectedMeatItems[0] + '/' + this.selectedMeatItems[1] +  "/" + this.selectedMeatItems[2]+ ")"+ "("+ this.selectedVeggieItems[0] + "/" + this.selectedVeggieItems[1] + ")";
                } else {
                    this.finalNamePlatou = ''
                    if (this.currentLanguage === 'en') {
                        this.finalSubmitError = "Please choose from all select fields as required"
                    } else if (this.currentLanguage === 'ro') {
                        this.finalSubmitError = "Alege atent din toate selectiile conform instructiunilor"
                    } else {
                        this.finalSubmitError = "Выберите товара из всеx раздела"
                    }
                }
            }
            else{
                this.finalName = this.singleProduct['name']
            }
        },
        onSubmit: function(event) {
            let name = document.getElementById('nameProduct')
            if (this.singleProduct['id'] === 77 || this.singleProduct['id'] === 78){
                this.setName()
                name.value= this.finalName
                if (!this.finalName) {
                    event.preventDefault(); // Prevent the form submission if conditions are not met
                }
            }else{
                name.value= this.singleProduct['name']
            }
        },
        updateSelectedItemsMeat(elem, event){
            if(this.singleProduct.id === 77) {
                if (event.target.checked) {
                    if (this.selectedMeatItems.length < 4) {
                        this.selectedMeatItems.push(elem);
                        console.log(this.selectedMeatItems)
                    }
                    if (this.selectedMeatItems.length > 3) {
                        console.log(this.selectedMeatItems.length)
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "Please choose three elements from meat select section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Alege 3 produse din sectiunea carne"
                        } else {
                            this.errorMessageProduct = "Выберите 3 товара из мясного раздела"
                        }
                    }else if(this.selectedMeatItems.length < 3){
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "PLease select 3 items from meat section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Poți alege doar 3 produse din secțiunea legume"
                        } else {
                            this.errorMessageProduct = "Выберите 3 товара из овощи раздела"
                        }
                    }else{
                        this.errorMessageProduct = ''
                    }
                } else {
                    const index = this.selectedMeatItems.indexOf(elem);
                    if (elem !== -1) {
                        this.selectedMeatItems.splice(index, 1);
                        if (this.selectedMeatItems.length <= 3) {
                            this.errorMessageProduct = '';
                        }
                    }
                }
            }else if(this.singleProduct.id === 78){
                if (event.target.checked) {
                    if (this.selectedMeatItems.length < 6) {
                        this.selectedMeatItems.push(elem);
                    }
                    if (this.selectedMeatItems.length > 5) {
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "Please choose five elements from veggies select section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Poți alege doar 5 produse din secțiunea legume"
                        } else {
                            this.errorMessageProduct = "Выберите 5 товара из овощи раздела"
                        }
                    }else if(this.selectedMeatItems.length < 5){
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "PLease select 5 items from vegetables section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Alege 5 produse din secțiunea legume"
                        } else {
                            this.errorMessageProduct = "Выберите 5 товара из овощи раздела"
                        }
                    }else{
                        this.errorMessageProduct = ''
                    }
                } else {
                    const index = this.selectedMeatItems.indexOf(elem);
                    if (elem !== -1) {
                        this.selectedMeatItems.splice(index, 1);
                        if (this.selectedMeatItems.length <= 5) {
                            this.errorMessageProduct = '';
                        }
                    }
                }
            }

        },
        updateSelectedItemsMurat(elem, event){
            if(this.singleProduct.id === 77) {
                if (event.target.checked) {
                    if (this.selectedCartofItems === '' || this.selectedCartofItems === null) {
                        this.selectedCartofItems += elem;
                    }
                    this.counterSingleError++;
                    console.log(this.counterSingleError)
                    if (this.counterSingleError > 1) {
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "Please choose only one element from salat select section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Alege doar un produs din sectiunea murături"
                        } else {
                            this.errorMessageProduct = "Выберите 1 товара из салаты раздела"
                        }
                    }
                } else {
                    if (this.counterSingleError >= 0) {
                        this.counterSingleError--;
                    }
                    this.selectedCartofItems = ''
                    if (this.counterSingleError === 1) {
                        this.errorMessageProduct = ""
                    }
                }
            }else if(this.singleProduct.id === 78){
                if (event.target.checked) {
                    if (this.selectedVeggieItems.length < 3) {
                        this.selectedVeggieItems.push(elem);
                    }
                    if (this.selectedVeggieItems.length > 2) {
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "Please choose two elements from sauces select section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Alege 2 produse din sectiunea sosuri"
                        } else {
                            this.errorMessageProduct = "Выберите 2 товара из соус раздела"
                        }
                    }else if(this.selectedVeggieItems.length < 2){
                        if (this.currentLanguage === 'en') {
                            this.errorMessageProduct = "PLease select 2 items from sauces section"
                        } else if (this.currentLanguage === 'ro') {
                            this.errorMessageProduct = "Alege 2 produse din secțiunea sosuri"
                        } else {
                            this.errorMessageProduct = "Выберите 2 товара из соус раздела"
                        }
                    }else{
                        this.errorMessageProduct = ''
                    }
                } else {
                    const index = this.selectedVeggieItems.indexOf(elem);
                    if (elem !== -1) {
                        this.selectedVeggieItems.splice(index, 1);
                        if (this.selectedVeggieItems.length <= 2) {
                            this.errorMessageProduct = '';
                        }
                    }
                }
            }
        },
        updateSelectedItemsSalat(elem, event){
            if (event.target.checked) {
                if (this.selectedSalatItems === '' || this.selectedSalatItems === null) {
                    this.selectedSalatItems += elem;
                }
                this.counterSingleSalatError ++;
                console.log(this.counterSingleSalatError)
                if (this.counterSingleSalatError > 1){
                    if (this.currentLanguage === 'en'){
                        this.errorMessageProductBelow = "Please choose only one element from salat select section"
                    }else if(this.currentLanguage === 'ro'){
                        this.errorMessageProductBelow = "Alege doar un produs din sectiunea salate"
                    }else{
                        this.errorMessageProductBelow = "Выберите 1 товара из салаты раздела"
                    }
                }
            } else {
                if (this.counterSingleSalatError >= 0){
                    this.counterSingleSalatError --;
                }
                this.selectedSalatItems = ''
                if (this.counterSingleSalatError === 1) {
                    this.errorMessageProductBelow = ""
                }
            }

        },
        updateSelectedItemsSauce(elem, event){
            if (event.target.checked) {
                if (this.selectedSauceItems === '' || this.selectedSauceItems === null) {
                    this.selectedSauceItems += elem;
                }
                this.counterSingleSauceError ++;
                if (this.counterSingleSauceError > 1){
                    if (this.currentLanguage === 'en'){
                        this.errorMessageProductBelow = "Please choose only one element from sauce select section"
                    }else if(this.currentLanguage === 'ro'){
                        this.errorMessageProductBelow = "Alege doar un produs din sectiunea sousuri"
                    }else{
                        this.errorMessageProductBelow = "Выберите 1 товара из салаты раздела"
                    }
                }
            } else {
                if (this.counterSingleSauceError >= 0){
                    this.counterSingleSauceError --;
                }
                this.selectedSauceItems = ''
                if (this.counterSingleSauceError === 1) {
                    this.errorMessageProductBelow = ""
                }
            }

        },
        platouCheck(itemId){
            let idsToCheck = [77,78,79,80,81,82,83,84]
            return !idsToCheck.includes(itemId);
        },
        platouCheckShow(itemId){
            let idsToCheck = [77,78,79,80,81,82,83,84]
            return idsToCheck.includes(itemId);
        },
        decodePath(encodedPath) {
        try {
            const parts = encodedPath.split('/').map(part => decodeURIComponent(part));
            const decodedPath = parts.join('/');
            return decodedPath;
        } catch (error) {
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
