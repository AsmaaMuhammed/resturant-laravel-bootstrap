<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Dish;
use App\Models\Event;
use App\Models\FollowUs;
use App\Models\GeneralDesc;
use App\Models\News;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Service;
use App\User;
use Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class HomeSiteController
 * @package App\Http\Controllers\Site
 */
class HomeSiteController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        $aboutData = About::orderBy('id', 'desc')->take(3)->get();
        $servicesData = Service::orderBy('id', 'desc')->take(3)->get();
        $newsData = News::orderBy('id', 'desc')->take(4)->get();
        $data = [
            'generalDesc' => $generalDesc,
            'aboutData' => $aboutData,
            'servicesData' => $servicesData,
            'newsData' => $newsData,
            'route' => $route
        ];
        return view('site/home', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu()
    {
        //dd(url()->current()->getName());
        $perPage = 10;
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        $dishes = Dish::latest()->paginate($perPage);
        return view('site/menu', ['generalDesc' => $generalDesc, 'dishes' => $dishes, 'route' => $route]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        return view('site/contacts', ['generalDesc' => $generalDesc, 'route' => $route]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postContact(Request $request)
    {
        $requestData = $request->all();
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        $client = Client::create([
            'name' => $requestData['name'],
            'phone' => $requestData['phone'],
            'email' => $requestData['email']
        ]);
        $contact = ['client_id' => $client->id, 'message' => $requestData['message']];
        Contact::create($contact);
        return view('site/contacts', ['generalDesc' => $generalDesc, 'route' => $route]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function events()
    {
        $perPage = 10;
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        $events = Event::latest()->paginate($perPage);
        return view('site/events', ['generalDesc' => $generalDesc, 'events' => $events, 'route' => $route]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog(Request $request)
    {
        $perPage = 10;
        $route = Route::getFacadeRoot()->current()->uri();
        $generalDesc = GeneralDesc::all();
        $dishes = Dish::latest()->paginate($perPage);
        return view('site/blog', ['generalDesc' => $generalDesc, 'dishes' => $dishes, 'route' => $route]);
    }

    /**
     * @param $id
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comments($id, $type)
    {
        $route = request()->segment(1);
        $data = [];
        $row = null;
        if ($type === 'dish') {
            $row = Dish::find($id);
        } else if ($type === 'news') {
            $row = News::find($id);
        }
        else if($type === 'event')
        {
            $row = Event::find($id);
        }
        else if($type === 'post')
        {
            $row = Post::find($id);
        }
        return view('site/comments', ['data' => $data, 'row' => $row, 'action'=>'add-comment', 'route' => $route]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function addClient(Request $request)
    {
        $requestData = $request->all();


        if($request->has('photo')) {
            $path = $request->file('photo')->store('/images');
            $requestData['photo'] = $path;
        }
        else
        {
            $requestData['photo'] = '';
        }

        $client = Client::create([
            'name' => $requestData['name'],
            'phone' => $requestData['phone'],
            'email' => $requestData['email'],
            'photo' => $requestData['photo']
        ]);
        return $client;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addComment(Request $request)
    {
        $requestData = $request->all();
        $client = $this->addClient($request);
        $client_id = $client->id;
        $type = $requestData['type'];
        $id = $requestData['type_id'];

        if ($type === 'dish') {
            $model = Dish::find($id);
        }
        else if($type === 'news')
        {
            $model = News::find($id);
        }
        else if($type === 'event')
        {
            $model = Event::find($id);
        }
        else if($type === 'post')
        {
            $model = Post::find($id);
        }

        $model->comments()->create([
            'client_id' => $client_id,
            'comment' => $requestData['comment'],
        ]);
        return redirect('comments/' . $id . '/' . $type);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addReply(Request $request)
    {
        $requestData = $request->all();
        $client = $this->addClient($request);
        $client_id = $client->id;
        $type = $requestData['type'];
        $id = $requestData['type_id'];
        $comment_id = $requestData['comment_id'];
        Reply::create([
            'client_id'=>$client_id,
            'comment_id'=>$comment_id,
            'reply'=>$requestData['comment']
        ]);
        if ($type === 'dish') {
            $model = Dish::find($id);
        }
        else if($type === 'news')
        {
            $model = News::find($id);
        }
        else if($type === 'event')
        {
            $model = Event::find($id);
        }
        else if($type === 'post')
        {
            $model = Post::find($id);
        }
        return redirect('comments/' . $id . '/' . $type);
    }

    /**
     * @param Request $request
     * @param null $cat_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchForDishes(Request $request, $cat_id = null)
    {
        $perPage = 10;
        $route = request()->segment(1);
        $generalDesc = GeneralDesc::all();

        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $dishes = Dish::where('title', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dishes = Dish::latest()->paginate($perPage);
        }

        return view('site/blog', ['generalDesc' => $generalDesc, 'dishes' => $dishes, 'route' => $route]);
    }

    /**
     *
     */
    public function share(Request $request)
    {
        //https://github.com/prodeveloper/social-share
        $url = $request->fullUrl();
        return Share::load($url, 'Link description')->services('facebook', 'gplus', 'twitter', 'linkedin');
    }

}