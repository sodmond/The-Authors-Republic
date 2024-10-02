<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
    <aside id="tg-sidebar" class="tg-sidebar">
        <div class="tg-widget tg-widgetsearch">
            <form class="tg-formtheme tg-formsearch" method="GET" action="{{ route('books') }}">
                <div class="form-group">
                    <button type="submit"><i class="icon-magnifier"></i></button>
                    <input type="search" name="search" class="form-group" placeholder="Search book by title or author's name...">
                </div>
            </form>
        </div>
        <div class="tg-widget tg-catagories">
            <div class="tg-widgettitle">
                <h3>Book Categories</h3>
            </div>
            <div class="tg-widgetcontent">
                <ul>
                    @foreach($book_categories as $category)
                        @php 
                            $slug = \App\Models\Book::getSlug($category->title); 
                            $catLink = route('books.category', ['id' => $category->id, 'slug' => $slug]);
                        @endphp
                        <li><a href="{{ $catLink }}"><span>{{ $category->title }}</span><em>{{count($category->books)}}</em></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tg-widget tg-widgettrending">
            <div class="tg-widgettitle">
                <h3>Recent News</h3>
            </div>
            <div class="tg-widgetcontent">
                <ul>
                    @foreach($recentNews as $news)
                    <li>
                        <article class="tg-post">
                            @php 
                                $slug = \App\Models\Article::getSlug($news->title);
                                $articleLink = route('news.get', ['id' => $news->id, 'slug' => $slug]);
                            @endphp
                            <figure style="width: 75px;"><a href="{{ $articleLink }}">
                                <img src="{{ asset('storage/'.$news->image) }}" alt="article image" style="max-width:75px;">
                            </a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="{{ $articleLink }}">{{ $news->title }}</a></h3>
                                </div>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </aside>
</div>