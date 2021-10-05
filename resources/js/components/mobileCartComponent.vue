<template>
    <div class="container pd-v-3">
        <div class="cart-item" v-for="item in cartItems">
            <div class="row">
                <div class="col-7">
                    <img v-bind:src="item.Product.thumbnail" class="responsive-image" alt="">
                </div>

                <div class="col-5">
                    <div class="cart-item-detail">
                        <span class="item-title">{{ item.Product.title }}</span>

                        <div class="item-market">
                            <img src="" alt="">
                            <span class="px-1">Inferno</span>
                        </div>
                        <div class="item-market">
                            <img src="" alt="">
                            <span class="px-1">ارسال توسط اینفرنو</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
            </div>

            <div class="col-12">
                <div class="cart-item-footer">
                    <div class="quantity-control">
                        <div class="quantity-control-btn">
                            <img v-if="checkQuantity(item)" src="/images/mobile/plus.png"
                                 class="add-to-cart-btn" alt=""
                                 @click="addItem(item)">
                        </div>
                        <span class="quantity-control-btn">{{ item.quantity }}</span>
                        <div class="quantity-control-btn">
                            <img v-if="item.quantity > 1" src="/images/mobile/minus.png" alt=""
                                 @click="reduceItem(item.id)">
                            <img v-if="item.quantity == 1" src="/images/mobile/trash-can.png" alt=""
                                 @click="deleteItem(item.id)">

                        </div>
                    </div>

                    <div class="cart-item-price-wrap">
                        <span v-if="item.Product.discount>0" class="cart-item-discount">{{
                                itemDiscount(item)
                            }} :تخفیف </span>
                        <span class="cart-item-price">{{ itemPrice(item) }}</span>
                    </div>
                </div>
            </div>

            <div class="cart-approve-section">
                <div class="cart-approve-wrap">
                    <form action="/order/register" method="post">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="submit" class="btn cart-approve-btn" value="تکمیل فرایند خرید">
                    </form>
                </div>
                <div class="cart-price-wrap">

                    <span>مبلغ قابل پرداخت</span>
                    <span class="cart-price">
                        {{ cartPrice() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            cartItems: null,
            csrf: document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '',
        }
    },
    name: 'Cart',
    mounted() {
        axios
            .get('http://localhost:8000/cart/serialized')
            .then(response => {
                this.cartItems = response.data
            });
        console.log(this.cartItems)
    },
    methods: {
        addItem(item) {
            let data = {
                number:1
            }
            let id = item.Product.id;
            if ('Variety' in item){
                data.type = 'Variety'
                 id = item.Variety.id
            }
            axios.post('http://localhost:8000/cart/addItem/' + id, data).then(response => this.cartItems = response.data)
        },
        reduceItem(itemId) {
            axios.patch('http://localhost:8000/cart/reduce/' + itemId, {
                number: -1,
            }).then(response => {
                this.cartItems = response.data
            })
        },
        deleteItem(itemId) {
            axios.delete('http://localhost:8000/cart/removeItem/ajax/' + itemId).then(response => this.cartItems = response.data)
        },
        itemPrice(item) {
            return (item.Product.basePrice - ((item.Product.basePrice / 100) * item.Product.discount)) * item.quantity
        },
        itemDiscount(item) {
            return ((item.Product.basePrice / 100) * item.Product.discount) * item.quantity
        },
        cartPrice() {
            return (this.cartItems.map(item => this.itemPrice(item)).reduce((a, b) => a + b))
        },
        checkQuantity(item){
            if ('Variety' in item){
                return item.quantity + 1 <= item.Variety.inventory
            }
            return item.quantity + 1 <= item.Product.inventory
        }
    }
}
</script>
