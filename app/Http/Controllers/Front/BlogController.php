<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CaseStudy;
use App\Models\SeoPage;
use App\Models\Blog;
use App\Models\PageContent;
use App\Interfaces\EventInterface;

class BlogController extends Controller
{
    public function __construct(EventInterface $EventRepository){
        $this->EventRepository = $EventRepository;
    }
    public function index(Request $request)
    {
        $seo = SeoPage::where('page', 'blog')->first();
        $blog_data = PageContent::where('id', 10)->first();
        $category = isset($request->category) && $request->category != "All" ? $request->category : 'All';

        $allCategories = Blog::select('event_category')->where('status', 1)->where('deleted_at', 1)->groupBy('event_category')->get();
        $categoryCondition = ($category == 'All') ? [] : ['event_category' => $category];
        $data = Blog::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->where($categoryCondition)
            ->inRandomOrder() // Shuffle the results
            ->limit(7)
            ->get();
        $PopularBlogs = Blog::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->where($categoryCondition)
            ->orderBy('view_counter', 'ASC')
            ->limit(5)
            ->get();

        return view('front.blog.index', compact('data', 'PopularBlogs', 'allCategories', 'blog_data'));
    }

    public function detail(Request $request, $slug)
    {
        $data = Blog::where('slug', $slug)->first();
        
        if (!empty($data)) {
            $relatedBlogs = Blog::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->where('event_category',$data->event_category)
            ->where('id', '!=',$data->id)
            ->limit(5)
            ->get();

            return view('front.blog.detail', compact('data', 'relatedBlogs'));
        } else {
            return view('front.error.404');
        }
    }

}
