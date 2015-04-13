@foreach(array_chunk($products->all(), 4) as $row)

    <div class='row'>   

        @foreach($row as $product) 

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="{{action('ProductsController@show', [$product->artNo])}}">
                <div class="product-container">            
                    <div class="product-img">
                        <img src="../{{$product->picture}}">
                    </div>
                    
                    <div class="product-name">
                        <h3>{{str_limit($product->name, $limit = 30, $end = '...')}}</h3>
                    </div>

                    <p>

                    ArtNo: {{$product->artNo}} <br>
                    Stock: {{$product->stock}} pcs <br>
                    Price: {{$product->price}} SEK</p>

                    @if($product->categories->isEmpty())
                         <span class="label label-default">Uncategorized</span>
                    @else 
                        @foreach($product->categories as $categories)
                            <a href="{{action('CategoriesController@show', $categories->slug)}}"><span class="label label-info">{{$categories->name}}</span></a>
                        @endforeach
                    @endif
                    
                </div>
                </a>
                

                @if(Auth::check())
                
                <div class="del_edit">
                    <div class="btn-group">
                        {!! Form::open(['method' => 'DELETE', 'action' => ['ProductsController@destroy', $product->artNo]]) !!}
                        
                        @if(Auth::user()->user_type == 0)
                        {!! Form::submit('Delete Product', ['class' => 'btn btn-danger']) !!}
                        @endif
                    </div>
                </div>
                @endif

                {!! Form::close() !!}

            </div>

        @endforeach


    </div>

        @endforeach