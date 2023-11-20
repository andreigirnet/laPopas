function app() {
    return {
        data: null,
        finalName: "",
        finalSubmitError: "",
        keyIndex: null,
        counterSingleError: 0,
        counterSingleSalatError: 0,
        counterSingleSauceError:0,
        selectedPlatouItems: {},
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
        async fetchData() {
            try {
                let lang = localStorage.getItem('lang');
                console.log("The value of lang is" + lang)
                if(!lang){
                    this.currentLanguage = 'ro'
                }else{
                    this.currentLanguage = lang
                }
                console.log(this.currentLanguage)
                if (window.location.pathname === '/cart') {
                    let cartDataResponse;
                    cartDataResponse = await axios.get('/data/cart.json');
                    this.cartData = cartDataResponse.data[this.currentLanguage]
                }
                if (window.location.pathname === '/service') {
                    let serviceResponse;
                    serviceResponse = await axios.get('/data/service.json');
                    this.serviceData = serviceResponse.data[this.currentLanguage];
                }
                if (window.location.pathname === '/contacts') {
                    let contactResponse;
                    contactResponse = await axios.get('/data/contacts.json');
                    this.contactData = contactResponse.data[this.currentLanguage];
                }
                if (window.location.pathname === '/delivery') {
                    let deliveryResponse;
                    deliveryResponse = await axios.get('/data/delivery.json');
                    this.deliveryData = deliveryResponse.data[this.currentLanguage];
                }
                if (window.location.pathname === '/checkout') {
                    let checkoutResponse;
                    checkoutResponse = await axios.get('/data/checkout.json');
                    this.checkoutData = checkoutResponse.data[this.currentLanguage];
                    console.log(this.checkoutData);
                }
                let singlePageResponse = await axios.get('/data/single.json');
                this.singlePageData = singlePageResponse.data[this.currentLanguage]

                const response = await axios.get('/data/data.json');
                this.allLangData = response.data
                this.data = response.data[this.currentLanguage];

                let currentPath = window.location.pathname;
                this.singleItem(currentPath)
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        findIndexByKey(array, key) {
            let keysArray = Object.keys(array);
            return keysArray.indexOf(key)
        },
        singleItem(path){
            let newPath = this.decodePath(path)
            let keys = newPath.split("/")
            let slicedArray = keys.slice(2)

            let categoryKey = Object.keys(this.data.products)[slicedArray[0]];
            let productKey = Object.keys(this.data.products[categoryKey])[slicedArray[1]]


            this.singleProduct = this.data.products[categoryKey][productKey]
            this.singleProduct['name'] = productKey
            let idsToCheck = [41,42,43,44,45,46,47,48,71,118]
            if (idsToCheck.includes( this.singleProduct.id)){
                this.bulkPrice = this.singleProduct.bulkPrice[0]
            }
            console.log(this.singleProduct)
        },
        updatePrice(value){
            this.bulkPrice = this.singleProduct.bulkPrice[value]
            this.platouSize = this.singleProduct.person[value]
        },
        setName(){
            if (this.singleProduct['id'] === 77) {
                if(this.selectedPlatouItems['meat'] && this.selectedPlatouItems['meat'].length === 3 && this.selectedPlatouItems['muraturi'] && this.selectedPlatouItems['salat'] && this.selectedPlatouItems['sauce'] && Object.keys(this.selectedPlatouItems).length > 0){
                    this.finalName = '(' + this.selectedPlatouItems['meat'][0] + '/' + this.selectedPlatouItems['meat'][1] + '/' + this.selectedPlatouItems['meat'][2] + ')'+ '(' + this.selectedPlatouItems['muraturi'][0] + ')' + '(' + this.selectedPlatouItems['salat'][0] + ')' + '(' + this.selectedPlatouItems['sauce'][0] + ')';
                }else{
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
                if(this.selectedPlatouItems['vegetables'] && this.selectedPlatouItems['vegetables'].length === 5 && this.selectedPlatouItems['veggieSauce']){
                    this.finalName = '(' + this.selectedPlatouItems['vegetables'][0] + '/' + this.selectedPlatouItems['vegetables'][1] + '/' + this.selectedPlatouItems['vegetables'][2] + this.selectedPlatouItems['vegetables'][3] + this.selectedPlatouItems['vegetables'][4] + ')' + '(' + this.selectedPlatouItems['veggieSauce'][0] + ')';
                }else{
                    this.finalNamePlatou = ''
                    if (this.currentLanguage === 'en') {
                        this.finalSubmitError = "Please choose from all select fields as required"
                    } else if (this.currentLanguage === 'ro') {
                        this.finalSubmitError = "Alege atent din toate selectiile conform instructiunilor"
                    } else {
                        this.finalSubmitError = "Выберите 3 товара из всеx раздела"
                    }
                }
            }
            else{
                this.finalName = this.singleProduct['name']
            }
        },
        updateSelectedItems(item, event, selectId){
            this.selectedPlatouItems[selectId] = this.selectedPlatouItems[selectId] || [];

            if (event.target.checked) {
                this.selectedPlatouItems[selectId].push(item);
            } else {
                this.selectedPlatouItems[selectId] =  this.selectedPlatouItems[selectId].filter(selectedItem => selectedItem !== item);
            }
            this.checkSelectionLimit(selectId);
        },
        checkSelectionLimit(selectId){
            let limit = this.getLimitForSelect(selectId);
            if (this.selectedPlatouItems[selectId].length >= limit) {
                this.disableUncheckedCheckboxes(selectId);
            } else {
                this.enableCheckboxes(selectId);
            }
        },
        disableUncheckedCheckboxes(selectId) {
            let checkboxes = document.querySelectorAll('.listContentPlatou input[type="checkbox"]');

            checkboxes.forEach(function (checkbox) {
                let checkboxSelectId = checkbox.closest('.multipleChoice').getAttribute('id');
                console.log(checkboxSelectId)
                if (checkboxSelectId === selectId && !checkbox.checked) {
                    checkbox.disabled = true;
                }
            });
        },
        enableCheckboxes(selectId) {
            let checkboxes = document.querySelectorAll('.listContentPlatou input[type="checkbox"]');

            checkboxes.forEach(function (checkbox) {
                let checkboxSelectId = checkbox.closest('.multipleChoice').getAttribute('id');
                if (checkboxSelectId === selectId) {
                    checkbox.disabled = false;
                }
            });
        },
        getLimitForSelect(selectId) {
            if (selectId === 'meat') {
                return 3;
            } else if (selectId === 'vegetables') {
                return 5;
            }else if(selectId === 'veggieSauce'){
                return 2;
            }
            else if(selectId === 'sauce'){
                return 2;
            }
            else{
                return 1;
            }
        },
        onSubmit: function(event) {
            let name = document.getElementById('nameProduct')
            if (this.singleProduct['id'] === 77 || this.singleProduct['id'] === 78){
                this.setName()
                name.value = this.finalName
                console.log( name.value)
                if (!this.finalName) {
                    event.preventDefault(); // Prevent the form submission if conditions are not met
                }
            }else{
                name.value= this.singleProduct['name']
            }
        },

        platouCheck(itemId){
            let idsToCheck = [41,42,43,44,45,46,47,48,71,118]
            return !idsToCheck.includes(itemId);
        },
        platouCheckShow(itemId){
            let idsToCheck = [41,42,43,44,45,46,47,48,71,118]
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
            let totalbefore = Number(this.cartTotalBefore.replace(/,/g, ''));
            console.log(totalbefore)
            if(totalbefore > 100 && totalbefore < 200){
                this.discount = '5%'
                console.log(this.discount)
            }else if(totalbefore > 200){
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
