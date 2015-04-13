@foreach(array_chunk($products->all(), 4) as $row)

    <div class='row'>   

        @foreach($row as $product) 

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

                    <div class="product-container">
                        <a href="{{action('ProductsController@show', [$product->slug])}}">
                            <div class="product-img">
                                <img src="../{{$product->picture}}">
                            </div>

                            <div class="product-name">
                                <h3>{{str_limit($product->name, $limit = 30, $end = '...')}}</h3>
                            </div>

                            <p>
                            ArtNo: {{$product->artNo}} <br>
                            Stock: {{$product->stock}} pcs <br>
                            Price: {{$product->price}} SEK
                            </p>

                        </a>
                        @if($product->categories->isEmpty())
                             <br>
                        @else
                            @foreach($product->categories as $categories)
                                <a href="{{action('CategoriesController@show', $categories->slug)}}"><span class="label label-info">{{$categories->name}}</span></a>
                            @endforeach
                        @endif

                    </div>

            </div>

        @endforeach


    </div>

        @endforeach