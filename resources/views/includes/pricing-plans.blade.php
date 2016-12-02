<style>
    body .container .card {
        margin: 0 auto;
        display: inline-block;
        margin-right: 30px;
        transform: scale(0);
        width: 280px;
        text-align: center;
        position: relative;
        transition: all .2s;
        cursor: pointer;
        /*opacity: 0.5;*/
        box-shadow: 0px 17px 46px -10px #777777;
        height: 375px;
        border-radius: 14px;
        line-height: 1;
    }
    body .container .card:nth-of-type(1) {
        animation: intro 1s 0.1s forwards;
    }
    body .container .card:nth-of-type(2) {
        animation: intro 1s 0.2s forwards;
    }
    body .container .card:nth-of-type(3) {
        animation: intro 1s 0.3s forwards;
    }
    body .container .card:nth-of-type(1) {
        background: -webkit-linear-gradient(45deg, #c96881 0%, #f7b695 100%);
        background: -moz-linear-gradient(45deg, #c96881 0%, #f7b695 100%);
    }
    body .container .card:hover .card_inner__header img {
        left: -50px;
        transition: all 3.4s linear;
    }
    body .container .card:hover .card_inner__cta button {
        transform: scale(1);
    }
    body .container .card:nth-of-type(1):hover .card_inner__circle img {
        animation: launch 1s forwards;
    }
    body .container .card:nth-of-type(1) .card_inner__circle img {
        top: 22px;
        left: 1px;
    }
    body .container .card:hover {
        opacity: 1;
    }
    body .container .card_inner__circle {
        overflow: hidden;
        width: 70px;
        position: absolute;
        background: #F1F0ED;
        z-index: 10;
        height: 70px;
        border-radius: 100px;
        left: 0;
        box-shadow: 0px 7px 20px rgba(0, 0, 0, 0.28);
        right: 0;
        margin: auto;
        border: 4px solid white;
        top: 82px;
    }
    body .container .card_inner__circle img {
        height: 26px;
        position: relative;
        top: 17px;
        transition: all .2s;
    }
    body .container .card_inner__header {
        height: 120px;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
        overflow: hidden;
    }
    body .container .card_inner__header img {
        width: 120%;
        position: relative;
        top: -30px;
        left: 0;
        transition: all 0.1s linear;
    }
    body .container .card_inner__content {
        padding: 20px;
    }
    body .container .card_inner__content .price {
        color: white;
        font-weight: 100;
        font-size: 70px;
    }
    body .container .card_inner__content .valute {
        color: white;
        font-weight: 100;
        font-size: 20px;
    }
    body .container .card_inner__content .text {
        color: rgba(255, 255, 255, 0.6);
        font-weight: 100;
        margin-top: 20px;
        font-size: 13px;
        line-height: 16px;
    }
    body .container .card_inner__content .title {
        font-weight: 800;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.64);
        margin-top: 15px;
        font-size: 25px;
        letter-spacing: 1px;
    }
    body .container .card_inner__cta {
        position: absolute;
        bottom: -24px;
        left: 0;
        right: 0;
        margin: auto;
        width: 200px;
    }
    body .container .card_inner__cta button {
        padding: 16px;
        width: 100%;
        background: -webkit-linear-gradient(-90deg, #fe5e7d 0%, #e5375b 100%);
        background: -moz-linear-gradient(-90deg, #fe5e7d 0%, #e5375b 100%);
        border: none;
        font-family: 'Roboto', sans-serif;
        color: white;
        outline: none;
        font-size: 20px;
        border-radius: 6px;
        transform: scale(0.94);
        cursor: pointer;
        transition: box-shadow .3s, transform .3s .1s;
    }
    body .container .card_inner__cta button span {
        text-shadow: 0px 4px 18px #BA3F57;
    }
    body .container .card_inner__cta button:hover {
        box-shadow: 0px 0px 60px 8px #F76583, 0px 0px 0px 2px rgba(255, 255, 255, 0.19) inset;
    }

    @keyframes launch {
        0% {
            left: 1px;
        }
        25% {
            top: -50px;
            left: 1px;
        }
        50% {
            left: -100px;
        }
        75% {
            top: 100px;
            transform: rotate(40deg);
        }
        100% {
            left: 1px;
        }
    }
    @keyframes fly {
        0% {
            left: 0px;
        }
        25% {
            top: -50px;
            left: 50px;
        }
        50% {
            left: -130px;
        }
        75% {
            top: 60px;
        }
        100% {
            left: 0px;
        }
    }
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(720deg);
        }
    }
    @keyframes intro {
        0% {
            transform: scale(0);
        }
        25% {
            transform: scale(1.06);
        }
        50% {
            transform: scale(0.965);
        }
        75% {
            transform: scale(1.02);
        }
        100% {
            transform: scale(1);
        }
    }

</style>

<div class="modal fade" id="submiting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="jumbotron text-center modal-payment">
            <h2><i class="fa fa-spinner fa-spin fa-fw"></i> Submiting your payment...</h2>
            <p>Please don't close this window</p>
        </div>
    </div>
</div>

    <section class='card'>
        <div class='card_inner'>
            <div class='card_inner__circle'>
                <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/rocket.png'>
            </div>
            <div class='card_inner__header'>
                <img src='http://www.pixeden.com/media/k2/galleries/343/002-city-vector-background-town-vol2.jpg'>
            </div>
            <div class='card_inner__content'>
                <div class='title'>Go Premium</div>
                <div class='price'>5€</div>
                <div class='valute'>per month</div>
                <div class='text'>Unlock the premium features such as more images storage, full support, badge from us and much more.</div>
            </div>
            <div class='card_inner__cta'>
                <button id="pay-monthly">
                    <span>Subscribe</span>
                </button>
            </div>
        </div>
    </section>


@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script>
        function changeModal(){

            $('.modal-payment h2')
                .html('<i class="fa fa-check" aria-hidden="true"></i> Payment accepted!')
                .parent('.jumbotron')
                .addClass('alert-success');

            $('.modal-payment p')
                .delay('1000')
                .html('Thank you.<br>You will be redirected automatically.')

            setTimeout(function(){
                $('#submiting').modal('hide');
                setTimeout(function(){
                    location.href = '{{ route('dashboard') }}';
                },1000);
            }, 5000);
        }

        var handler = StripeCheckout.configure({
            key: 'pk_test_jnQoANlW94gaHnZ8LXl7V6AH',
            image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            locale: 'auto',
            token: function(token) {
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
                $('#submiting').modal('show');
                $.ajax({
                    type: "POST",
                    url: "{{ route('sex') }}",
                    data: {
                        'token': token.id,
                        '_token': Laravel.csrfToken
                    },
                    success: function (message) {
                        console.log('success');
                        console.log(message);
                        changeModal();
                    },
                    error: function (message) {
                        console.log('error');
                        console.log(message);
                    },
                    dataType: 'json'
                });
            }
        });

        document.getElementById('pay-monthly').addEventListener('click', function(e) {
            // Open Checkout with further options:
            handler.open({
                name: 'Premium plan',
                description: 'Monthly subscription',
                amount: 500,
                email: '{{ $user->email }}',
                allowRememberMe: false
            });
            e.preventDefault();
        });

        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
            handler.close();
        });


    </script>


@endsection