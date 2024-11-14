<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BlogInterface;
use App\Repositories\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Request as Req;
class HomeController extends Controller
{
    protected $blogRepository;
    protected $categoryRepository;

    public function __construct(BlogInterface $blogRepository, CategoryInterface $categoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function home()
    {
        session()->flash('title-page', 'Trang chủ');
        session()->flash('meta-keywords', 'Trang chủ');
        session()->flash('meta-description', 'Tin tức công nghệ, đời sống');
        session()->flash('author', 'Trang chủ');



        $blogNew =  $this->blogRepository->getAllBlog();

        // Hiển thị đầu trang
        $priorityBlog = $this->blogRepository->getBlogByIdWithDetails(1);

        // sidebar
        $blogTagWidgets =  $this->blogRepository->getAllTagLimit(30);
        $blogWidgets =  $this->blogRepository->getBlogLimit(6);
        $listCategory = $this->categoryRepository->getAllCategory();

        $blogByView = $this->blogRepository->getBlogByView();

        $blogLimitNew = $this->blogRepository->getBlogByCategoryIdLimit(3, 6);
        $blogLimitOld = $this->blogRepository->getBlogByCategoryIdLimit(3, 6, 'asc');

        

        $data = [
            'blogNew' => $blogNew,
            'priorityBlog' => $priorityBlog,
            'blogWidgets' => $blogWidgets,
            'blogByView' => $blogByView,
            'blogLimitNew' => $blogLimitNew,
            'blogLimitOld' => $blogLimitOld,
            'blogTagWidgets' => $blogTagWidgets,
            'listCategory' => $listCategory,
        ];

        return view('client.home.home', $data );
    }

    public function blogDetail($slug)
    {
        // sidebar
        $blogWidgets =  $this->blogRepository->getBlogLimit(6);
        $blogTagWidgets =  $this->blogRepository->getAllTagLimit(10);
        $listCategory = $this->categoryRepository->getAllCategory();

        $blogDetail = $this->blogRepository->getBlogBySlug($slug);
        $blogTags = $this->blogRepository->getBlogTag($blogDetail->id);

        $listBlogs =  $this->blogRepository->getAllBlog();

        if(!empty($blogDetail)) {
            session()->flash('title-page', $blogDetail->title);
            session()->flash('meta-keywords', $blogDetail->meta_keyword);
            session()->flash('meta-description', $blogDetail->meta_description);
            session()->flash('author', $blogDetail->user_name);

//          Tăng lượt xem bài viết
            $this->blogRepository->updateViewBlog($blogDetail->id);

            $data = [
                'blog' => $blogDetail,
                'blogTags' => $blogTags,
                'listCategory' => $listCategory,
                'blogWidgets' => $blogWidgets,
                'blogTagWidgets' => $blogTagWidgets,
                'listBlogs' => $listBlogs
            ];


            return view('client.blog.single', $data);
        }else {
            abort(404);
        }
    }

    public function search()
    {
        $query = Req::get('query');
        $result = $this->blogRepository->searchBog($query, 10);

        // sidebar
        $blogWidgets =  $this->blogRepository->getBlogLimit(6);
        $blogTagWidgets =  $this->blogRepository->getAllTagLimit(10);
        $listCategory = $this->categoryRepository->getAllCategory();

        $data = [
            'blogSearch' => $result,
            'listCategory' => $listCategory,
            'blogWidgets' => $blogWidgets,
            'blogTagWidgets' =>  $blogTagWidgets,
        ];

        return view('client.blog.search', $data);
    }

    public function contact()
    {
        $listCategory = $this->categoryRepository->getAllCategory();

        $data = [
            
            'listCategory' => $listCategory,
        ];

        return view('client.home.contact', $data);
    }

    public function blogDetails()
    {
        return view('client.blog.single2');
    }

    public function blogCategory($slug)
    {
        // sidebar
        $blogWidgets =  $this->blogRepository->getBlogLimit(6);
        $blogTagWidgets =  $this->blogRepository->getAllTagLimit(10);
        $listCategory = $this->categoryRepository->getAllCategory();

        $category = $this->categoryRepository->getAllBySlug($slug);
        $blogNewWidget = $this->blogRepository->getBlogLimit('8');

        if(!empty($category) && is_object($category)) {
            $blogByCate = $this->blogRepository->getBlogByCategoryIdPagination($category->id, 10);
        }

        if(!empty($blogByCate) && is_object($blogByCate)) {
            $data = [
                'blogByCate' => $blogByCate,
                'blogNewWidget' => $blogNewWidget,
                'category' => $category,
                'listCategory' => $listCategory,
                'blogWidgets' => $blogWidgets,
                'blogTagWidgets' =>  $blogTagWidgets,
            ];

            return view('client.blog.category', $data);
        }else {
            abort(404);
        }


    }

    public function blogTag($name)
    {
        $blogByTag = $this->blogRepository->getBlogByBlogTagName($name, 8);

        $blogNewWidget = $this->blogRepository->getBlogLimit('8');

        // $listCategory = $this->categoryRepository->getAllCategory();
        // sidebar
        $blogTagWidgets =  $this->blogRepository->getAllTagLimit(30);
        $blogWidgets =  $this->blogRepository->getBlogLimit(6);
        $listCategory = $this->categoryRepository->getAllCategory();

        if(!empty($blogByTag) && is_object($blogByTag)) {
            $data = [
                'blogByTag' => $blogByTag,
                'blogNewWidget' => $blogNewWidget,
                'tagName' => $name,
                'listCategory' => $listCategory,
                'blogTagWidgets' => $blogTagWidgets,
                'blogWidgets' => $blogWidgets,

            ];

            return view('client.blog.tag', $data);
        }else {
            abort(404);
        }
    }
}
