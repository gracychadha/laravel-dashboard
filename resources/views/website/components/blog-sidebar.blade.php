@php
    $blogs = \App\Models\Blog::where('status', 'active')->get();
@endphp
<div class="col-lg-4">
    <!-- widget sidebar start -->
    <div class="widget-sidebar">
        <!-- widget recent post start -->
        <div class="widget widget-recent-post">
            <!-- widget title start -->
            <div class="widget-title">
                <h3>Recent Post</h3>
            </div>
            <!-- widget title end -->
            <!-- widget content start -->
            <div class="widget-content">
                @forelse($blogs as $blog)
                    <div class="recent-post-item d-flex">
                        <div class="recent-post-image flex-shrink-0">
                            <figure class="image-anime">
                                <img src="{{ Storage::url(path: $blog->image) }}" alt="recent post one">
                            </figure>
                        </div>
                        <div class="recent-post-content flex-grow-1 ms-3">
                            <h4><a href="{{ route('blog-details', $blog->slug) }}">{{ Str::limit($blog->title, 40) }}</a></h4>
                            <p class="post-date">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    No Blog to show
                @endforelse

            </div>
            <!-- widget content end -->
        </div>
        <!-- widget recent post end -->
        @php
            $categories = \App\Models\BlogCategory::where('status', 'active')->get();
        @endphp
        <!-- widget categories list start -->
        <div class="widget widget-categories-list">
            <!-- widget title start -->
            <div class="widget-title">
                <h3>Categories List</h3>
            </div>
            <!-- widget title end -->
            <!-- widget content start -->
            <div class="widget-content">
                <ul class="category-list">
                    @forelse($categories as $category)
                    <li>
                        <a class="text-center" href{{ route('blog-details', $blog->slug) }}"><span class="categories-name"></span> {{ $category->name }}
                            <span
                                class="categories-count"></span></a>
                    </li>
                    @empty
                    no categories found
                    @endforelse
                    
                </ul>
            </div>
            <!-- widget content end -->
        </div>
        <!-- widget categories list end -->

    </div>
    <!-- widget sidebar end -->
</div>