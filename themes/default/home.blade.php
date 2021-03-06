@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div style="min-height: 400px; background-color: #F44336;"></div>
                        <div class="carousel-caption">
                            First Slide
                        </div>
                    </div>
                    <div class="item">
                        <div style="min-height: 400px; background-color: #9C27B0;"></div>
                        <div class="carousel-caption">
                            Second Slide
                        </div>
                    </div>
                    <div class="item">
                        <div style="min-height: 400px; background-color: #2196F3;"></div>
                        <div class="carousel-caption">
                            Third Slide
                        </div>
                    </div>

                    <div class="item">
                        <div style="min-height: 400px; background-color: #009688;"></div>
                        <div class="carousel-caption">
                            Fourth Slide
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        </div>
        <div class="clearfix">
            <p>&nbsp;</p>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Featured Products</h4></div>
                <div class="panel-body">
                    @foreach($featuredProducts as $product)
                        <div class="col-md-4">
                            <div class="thumbnail">

                                <a href="{{ route('product.view', $product->id)}}" title="{{ $product->title }}">
                                    @if(isset($product->getProductImages($first = true)->value))
                                        <img alt="{{ $product->title }}"
                                             class="img-responsive"
                                             src="/uploads/catalog/images/{{ $product->getProductImages($first= true)->value }}" />
                                    @else
                                        <img alt="{{ $product->title }}"
                                             class="img-responsive"
                                             src="/img/default-product.jpg" />
                                    @endif
                                </a>
                                <div class="caption">
                                    <h3>
                                        <a href="{{ route('product.view', $product->id)}}" title="{{ $product->title }}">
                                            {{ $product->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        {{ $product->price }}
                                    </p>
                                    <p>
                                        <a class="btn btn-primary" href="{{ route('cart.add-to-cart', $product->id) }}">Add to Cart</a>
                                        @if(isset(Auth::user()->id) && Auth::user()->isInWishlist($product->id))
                                            <a class="btn btn-danger" href="{{ route('wishlist.remove', $product->id) }}">Remove from Wishlist</a>
                                        @else
                                            <a class="btn btn-warning" href="{{ route('wishlist.add', $product->id) }}">Add to Wishlist</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
