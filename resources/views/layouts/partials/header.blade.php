<header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-envelope"></i>
                                <em>Contact</em>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-question-circle"></i>
                                <em>Help</em>
                            </a>
                        </li>
                    </ul>
                    <div class="tg-userlogin">
                        <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/users/img-01.jpg') }}" alt="image description"></a></figure>
                        <span>Hi, {{ (Auth::guard('web')->user()) ? ucwords(Auth::guard('web')->user()->firstname) : 'Guest' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="The Author Republic" style="max-height:65px;"></a></strong>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch">
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
                                <button type="submit" class="tg-btn">Search</button>
                            </fieldset>
                            <a href="javascript:void(0);">+  Advanced Search</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-navigationholder">
                        <nav id="tg-nav" class="tg-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                <ul>
                                {{--<li class="menu-item-has-children menu-item-has-mega-menu">
                                    <a href="javascript:void(0);">All Categories</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#artandphotography" aria-controls="artandphotography" role="tab" data-toggle="tab">Art &amp; Photography</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#biography" aria-controls="biography" role="tab" data-toggle="tab">Biography</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#childrensbook" aria-controls="childrensbook" role="tab" data-toggle="tab">Children’s Book</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#craftandhobbies" aria-controls="craftandhobbies" role="tab" data-toggle="tab">Craft &amp; Hobbies</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#crimethriller" aria-controls="crimethriller" role="tab" data-toggle="tab">Crime &amp; Thriller</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#fantasyhorror" aria-controls="fantasyhorror" role="tab" data-toggle="tab">Fantasy &amp; Horror</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#fiction" aria-controls="fiction" role="tab" data-toggle="tab">Fiction</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#fooddrink" aria-controls="fooddrink" role="tab" data-toggle="tab">Food &amp; Drink</a>
                                            </li><li role="presentation">
                                                <a href="#graphicanimemanga" aria-controls="graphicanimemanga" role="tab" data-toggle="tab">Graphic, Anime &amp; Manga</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#sciencefiction" aria-controls="sciencefiction" role="tab" data-toggle="tab">Science Fiction</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tg-themetabcontent">
                                            <div role="tabpanel" class="tab-pane active" id="artandphotography">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="biography">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="childrensbook">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="craftandhobbies">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="crimethriller">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="fantasyhorror">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="fiction">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="fooddrink">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="graphicanimemanga">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="sciencefiction">
                                                <ul>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>History</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Veniam quis nostrud</a></li>
                                                            <li><a href="products.html">Exercitation</a></li>
                                                            <li><a href="products.html">Laboris nisi ut aliuip</a></li>
                                                            <li><a href="products.html">Commodo conseat</a></li>
                                                            <li><a href="products.html">Duis aute irure</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Architecture</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Tough As Nails</a></li>
                                                            <li><a href="products.html">Pro Grease Monkey</a></li>
                                                            <li><a href="products.html">Building Memories</a></li>
                                                            <li><a href="products.html">Bulldozer Boyz</a></li>
                                                            <li><a href="products.html">Build Or Leave On Us</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                    <li>
                                                        <div class="tg-linkstitle">
                                                            <h2>Art Forms</h2>
                                                        </div>
                                                        <ul>
                                                            <li><a href="products.html">Consectetur adipisicing</a></li>
                                                            <li><a href="products.html">Aelit sed do eiusmod</a></li>
                                                            <li><a href="products.html">Tempor incididunt labore</a></li>
                                                            <li><a href="products.html">Dolore magna aliqua</a></li>
                                                            <li><a href="products.html">Ut enim ad minim</a></li>
                                                        </ul>
                                                        <a class="tg-btnviewall" href="products.html">View All</a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/img-01.png') }}" alt="image description"></figure>
                                                        <div class="tg-textbox">
                                                            <h3>More Than<span>12,0657,53</span>Books Collection</h3>
                                                            <div class="tg-description">
                                                                <p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
                                                            </div>
                                                            <a class="tg-btn" href="products.html">view all</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>--}}
                                <li class="{{ ($activePage == 'home') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="{{ ($activePage == 'books') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('books') }}">All Books</a>
                                </li>
                                <li class="{{ ($activePage == 'about') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('about') }}">About Us</a>
                                </li>
                                <li class="{{ ($activePage == 'authors') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('authors') }}">Authors</a>
                                </li>
                                <li class="{{ ($activePage == 'news') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('news') }}">Latest News</a>
                                </li>
                                <li class="{{ ($activePage == 'forum') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('forum') }}">Forum</a>
                                </li>
                                <li class="{{ ($activePage == 'contact') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);"><i class="icon-menu"></i></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="aboutus.html">Products</a>
                                            <ul class="sub-menu">
                                                <li><a href="products.html">Products</a></li>
                                                <li><a href="productdetail.html">Product Detail</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="aboutus.html">About Us</a></li>
                                        <li><a href="404error.html">404 Error</a></li>
                                        <li><a href="comingsoon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </nav>
                        <div class="tg-wishlistandcart">
                            <div class="tg-themedropdown">
                                @php 
                                    $savedItems = 0;
                                    if (Auth::guard('web')->user()) {
                                        $wishlist = Illuminate\Support\Facades\DB::table('wishlist')->where('user_id', Auth::guard('web')->id());
                                        $savedItems = $wishlist->count();
                                    }
                                @endphp
                                <a href="{{ route('user.wishlist') }}" id="tg-wishlisst" class="tg-btnthemedropdown">
                                    <span class="tg-themebadge">{{ $savedItems }}</span>
                                    <i class="icon-heart"></i>
                                </a>
                            </div>
                            <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                @php 
                                    $cookie = \App\Models\Cart::getCookie();
                                    $shoppingCart = \App\Models\Cart::where($cookie[0], $cookie[1])->get();
                                @endphp
                                <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="tg-themebadge">{{ $shoppingCart->count() }}</span>
                                    <i class="icon-cart"></i> 
                                </a>
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                    @if ($shoppingCart->count() > 0)
                                    @php $totalItem = ($shoppingCart->count() < 3) ? $shoppingCart->count() : 3; @endphp
                                    <div class="tg-minicartbody">
                                        @for($i = 0; $i < $totalItem; $i++)
                                        <div class="tg-minicarproduct">
                                            @php $book = $allBooks[$shoppingCart[$i]->book_id]; @endphp
                                            <figure>
                                                <img src="{{ asset('frontend/images/products/img-01.jpg') }}" alt="image description">
                                            </figure>
                                            <div class="tg-minicarproductdata">
                                                @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                                <h5><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ $book->title }}</a></h5>
                                                <h6>₦ {{ number_format($book->price, 2) }}</h6>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                    <div class="tg-minicartfoot">
                                        {{--<a class="tg-btnemptycart" href="{{ route('cart.clear') }}">
                                            <i class="fa fa-trash-o"></i>
                                            <span>Clear Your Cart</span>
                                        </a>
                                        <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>--}}
                                        <div class="tg-btns">
                                            <a class="tg-btn tg-active" href="{{ route('cart') }}">View All</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="tg-minicartbody text-center">
                                        <h5>Your cart is empty</h5>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="dropdown tg-themedropdown tg-currencydropdown">
                            <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="icon-user"></i></span>
                            </a>
                            <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                                @guest('web')
                                <li>
                                    <a href="{{ route('login') }}">
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <span>Register</span>
                                    </a>
                                </li>
                                @endguest
                                @auth('web')
                                <li>
                                    <a href="{{ route('user.home') }}">
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @endauth
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>