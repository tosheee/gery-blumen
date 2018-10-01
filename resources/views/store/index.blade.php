@extends('layouts.app')

@section('content')
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            font-size: .95em;

        }

        a:link {
            text-decoration: none;
            color: #000;
        }

        a:visited {
            color: #000;
        }

        .button {
            border: 1px solid black;
            padding: .5em 1.5em;
            cursor: pointer;
            outline: none;
            font-size: .8em;
            background: #fff;
        }

        .close {
            display: inline;
            position: absolute;
            top: 0;
            left: 0;
            padding-bottom: .1em;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        .wrapper {
            position: relative;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            background: #fff;
        }

        #cart {
            position: fixed;
            right: -16em;
            width: 15em;
            padding: 1em;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            background: #fff;
            z-index: 99999;
            transition: all .5s ease;
        }

        #cart:hover {
            right: 0;
        }

        #cart span {
            display: block;
        }

        .cart-title {
            padding: .5em 0 1em;
            font-size: 1.5em;
            border-bottom: 1px solid black;
        }

        .cart-title .fa-shopping-cart {
            display: inline-block;
            position: relative;
            margin-right: .6em;
        }

        .fa-shopping-cart .cart-counter {
            position: absolute;
            top: -.3em;
            right: -.3em;
            font-size: .5em;
            padding: .1em .3em;
            background: #20B2AA;
        }

        .cart-product {
            margin-top: 2em;
            text-transform: uppercase;
        }

        .cart-product-img {
            float: left;
            width: 5em;
        }

        .cart-product-img img {
            width: 100%;
        }

        .cart-product-info {
            float: left;
            width: 10em;
            margin-bottom: .8em;
        }

        .cart-product-footer {
            clear: both;
            padding: .6em 0;
            border-top: 1px dotted #000;
            border-bottom: 1px solid #000;
        }

        #cart .product-price {
            display: inline-block !important;
            float: none;
        }

        .cart-product-footer .fa-trash-o {
            float: right;
            margin-top: 6px;
        }

        .cart-total {
            margin-top: .2em;
            border-top: 1px solid #000;
        }

        .cart-total .product-price {
            padding: .3em 0;
            font-size: 2.5em;
        }

        .cart-total .product-price .fa-rub {
            font-size: .6em;
        }

        .order {
            display: block;
            width: 100%;
            transition: all ease .2s;
        }

        #catalog {text-align: center;}

        .product {
            display: inline-block;
            width: 100%;
            min-height: 40em;
            padding: 15px;
            border: 5px solid transparent;
            vertical-align: top;
            text-transform: uppercase;
            text-align: left;
            transition: all ease .3s;
        }

        .product:hover {
            /*border-color: #20B2AA;*/
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
        }

        .product-wrapper {
            height: 100%;
        }

        .product-img img {
            width: 100%;
        }

        .product span {
            display: block;
            margin: .1em 0;
        }

        .product-info {
            position: relative;
            height: 9em;
        }

        .product-brand {
            font-weight: bold;
        }

        .product-footer {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .product-footer span {
            display: inline-block;
            margin: 0;
        }

        .product-price {
            float: right;
            font-weight: bold;
            font-size: 1.7em;
            line-height: 1;
        }

        .product-price .fa-rub {
            margin-bottom: -.1em;
            font-size: .9em;
        }

        .add-cart {
            transition: all ease .2s;
        }

        .add-cart:hover,
        .order:hover {
            background: #20B2AA;
            border-color: #20B2AA;
        }

        .add-cart:active,
        .order:active {
            background: silver;
            border-color: silver;
        }
    </style>

    <div class="container-fluid">
        <div class="col-md-2" id="vertical-nav-bar" style="width: 22%">
            @include('partials.vertical_navigation')
        </div>


        <br/><br/><br/>

        <div id="grid">
            <div class="col-md-9">
                @if(count($products) > 0 )

                    <!-- end col-md-10-->
                    <section id="catalog">
                        @foreach($products as $product)
                            <?php $descriptions = json_decode($product->description, true); ?>

                            <div class="col-md-3">
                                @if ($product->sale == 1)
                                    <div class="ribbon-wrapper-1">
                                        <div class="ribbon-1" style="z-index: 100; font-size: 12px;  background-color: #ff3f0e;">Разпродажба</div>
                                    </div>
                                @elseif($product->recommended == 1)
                                    <div class="ribbon-wrapper-1">
                                        <div class="ribbon-1" style="z-index: 100; font-size: 12px;  background-color: #ff99a1;">Препоръчан</div>
                                    </div>

                                @elseif($product->best_sellers == 1)
                                    <div class="ribbon-wrapper-1">
                                        <div class="ribbon-1" style="z-index: 100; font-size: 12px;   background-color: #6daaab;">Най-продаван</div>
                                    </div>
                                @endif

                                    <article class="product" data-product-id="1">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                @if (isset($descriptions['main_picture_url']))
                                                    <img style="max-width: 270px; max-height: 320px;" src="{{ $descriptions['main_picture_url'] }}"  alt="{{ $descriptions['title_product'] }}"/>
                                                @elseif(isset($descriptions['upload_main_picture']))
                                                    <img style="max-width: 270px; max-height: 320px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="{{ $descriptions['title_product'] }}" />
                                                @else
                                                    <img style="max-width: 400px; max-height: 450px;" src="/storage/common_pictures/noimage.jpg" alt="{{ $descriptions['title_product'] }}" />
                                                @endif
                                            </div>

                                            <div class="product-info">
                                                <span class="product-brand">{{ $descriptions['title_product'] }}</span>
                                                <span class="product-decription">Coca Cola</span>
                                                <span class="product-volume">500 ml</span>
                                                <div class="product-footer">
                                                    <button class="add-cart button add-product-button">


                                                        Добави
                                                        <i class="fa fa-shopping-cart" ></i>

                                                        <?php if(Session::has('cart'))
                                                        {
                                                            $oldCart = Session::get('cart');
                                                            if(isset($oldCart->items[$product->id]['qty']))
                                                            {
                                                                $product_qty = $oldCart->items[$product->id]['qty'];
                                                            }

                                                        }
                                                        ?>

                                                        @if(!empty($oldCart->items[$product->id]) )
                                                            <sup id="sup-product-qty"> {{ isset($product_qty) ? $product_qty : '' }}</sup>
                                                            <input id="quantity-product" type="hidden" value="{{ isset($product_qty) ? $product_qty + 1 : '1' }}"  >
                                                        @else
                                                            <sup id="sup-product-qty"></sup>
                                                            <input id="quantity-product" type="hidden" value="1"  >
                                                        @endif

                                                        <input id="id-product" type="hidden" value="{{ $product->id }}"/>


                                                    </button>




                                                    <span class="product-price">
                                                        @if(isset($descriptions['old_price']))
                                                            {{ $descriptions['old_price'] }}
                                                            {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}
                                                        @endif
                                                            {{ isset($descriptions['price']) ? $descriptions['price'] : '' }}
                                                            {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                            </div>
                        @endforeach
                    </div>
            </div>
            <!-- end col-md-10-->

            <div style="margin-left: 10%">
                @if( method_exists($products,'links') )
                    {{  $products ->links() }}
                @endif
            </div>
            @else
                <div style="text-align: center;">
                    Резултати от търсенето: <p style="color: #ff7a11;font-size: large;"><h2>Няма намерени резултати!</h2></p>
                    <div style="margin-top: -30%">
                        <script>//setTimeout(function(){ window.location.href = '/'; }, 3000); </script>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <script>
        $(window).resize(function () {
            var viewportWidth = $(window).width();

            if (viewportWidth < 800) {
                $("#vertical-nav-bar").css('display', 'none')
            }else{
                $("#vertical-nav-bar").css('display', 'inline-block')
            }
        });
    </script>
@endsection