<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Log,Validator,Input,Redirect;
use Illuminate\Http\Request;
use App\Models\PCase;
use App\Models\Page;
use App\Models\Question;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Repositories\Eloquent\CourseRepositoryInterface;
use App\Repositories\Eloquent\PCaseRepositoryInterface;
use App\Repositories\Eloquent\QuestionRepositoryInterface;

class CompanyController extends BaseController
{
    public function __construct(PageRepositoryInterface $page_repository,
                                PageCategoryRepositoryInterface $page_category_repository,
                                CourseRepositoryInterface $course_repository,
                                PCaseRepositoryInterface $case_repository,
                                QuestionRepositoryInterface $question_repository)
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->page_category_repository = $page_category_repository;
        $this->course_repository = $course_repository;
        $this->case_repository = $case_repository;
        $this->question_repository = $question_repository;
        $this->view_prefix = 'company.';
    }
    public function about(Request $request)
    {
        $about = $this->page_repository->findBySlug('about');
        $dealer = $this->page_repository->findBySlug('dealer');
        $courses = $this->course_repository->orderBy('year','asc')->orderBy('month','asc')->orderBy('id','desc')->all();
        $cases = $this->case_repository->orderBy('order','asc')->orderBy('id','desc')->take(10)->get();
        return $this->response->title('关于我们')
            ->data(compact('about','dealer','courses','cases'))
            ->view($this->view_prefix.'about', true)
            ->output();
    }
    public function qualification(Request $request)
    {
        $qualification = $this->page_repository->findBySlug('qualification ');
        return $this->response->title('企业资质')
            ->data(compact('qualification'))
            ->view($this->view_prefix.'qualification', true)
            ->output();
    }
    public function news(Request $request)
    {
        $category_slug = "news";
        $category = $this->page_category_repository->findBySlug($category_slug);
        $where['category_id'] = $category->id;
        $search = $request->input('search','');
        if($search)
        {
            $where['title'] = ['title','like','%'.$search.'%'];
        }
        $news_list = $this->page_repository
            ->where($where)
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(10);
        return $this->response->title('企业动态')
            ->data(compact('news_list','search'))
            ->view($this->view_prefix.'news.home', true)
            ->output();
    }
    public function newsShow(Request $request,Page $news)
    {
        $news->increment('views');
        $category = $this->page_category_repository->find($news->category_id);
        $previous = $this->page_repository
            ->where([['id','<',$news->id]])
            ->where(['category_id' => $news->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();
        $next = $this->page_repository
            ->where([['id','>',$news->id]])
            ->where(['category_id' => $news->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();

        return $this->response->title($news->title)
            ->data(compact('news','previous','next'))
            ->view($this->view_prefix.'news.show', true)
            ->output();
    }
    public function contact(Request $request)
    {
        return $this->response->title('联系我们')
            ->view($this->view_prefix.'contact', true)
            ->output();
    }
    public function  questionStore(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'reemail' => [
                'required',
            ],
            'tel' => 'required',
            'location' => 'required',
            'content' => 'required',
        ];
        $messages = [
            'name.required' => trans('question.label.name').'必填',
            'email.required' => trans('question.label.email').'必填',
            'tel.required' => trans('question.label.tel').'必填',
            'location.required' => trans('question.label.location').'必填',
            'content.required' => trans('question.label.content').'必填',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $ip = $request->getClientIp();
        if($validator->errors()->first()){
            return [
                'code' => '400',
                'message' => $validator->errors()->first(),
            ];
        }
        if($request->input('email') !== $request->input('reemail')){
            return [
                'code' => '400',
                'message' => '邮箱不一致',
            ];
        }
        $data = [
            'name' =>  $request->input('name',''),
            'email' => $request->input('email',''),
            'tel' => $request->input('tel',''),
            'location' => $request->input('location',''),
            'content' => $request->input('content',''),
            'ip' => $ip
        ];
        $this->question_repository->create($data);
        return [
            'code' => '200',
            'message' => '提交成功，请勿重复提交',
        ];
    }
}
