<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = Collection::make([]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $users = Cache::get('users');
        return view('list_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list_user', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $users = Cache::get('users');
        // //store user
        Cache::put('users', $users->push(['user_name' => $request->user_name]));
        return redirect()->route('user.index');
    }

    public function storeListUser(Request $request)
    {
        $listUsers = explode("\r\n", $request->list_user);
        foreach ($listUsers as $user)
            User::create(['name'=> $user]);
        $users = User::orderBy('id', 'DESC')->get();
        return view('welcome', compact('users'));
    }

    public function sortToOneGroup(Request $request)
    {
        session()->put('member', $request->member1);
        $users = User::orderBy('id', 'DESC')->get();
        $results = array();
        $usersToOneGroup = array();
        $singleDimArray = array();
        $allUsers = User::query()->where('status', 0)->get()->toArray();
        foreach ($allUsers as $users=>$id) {
            $singleDimArray[$users] = $id['id'];
        }
        shuffle($singleDimArray);
        if (!empty($singleDimArray)) {
            if (count($singleDimArray) == 1) {
                $results[] = $singleDimArray[array_rand($singleDimArray, 1)];
            }elseif (count($singleDimArray) < $request->member1){
                $usersToOneGroup = array_rand($singleDimArray, count($singleDimArray));
                foreach ($usersToOneGroup as $item)
                    $results[] = $singleDimArray[$item];
            }else{
                $usersToOneGroup = array_rand($singleDimArray, $request->member1);
                foreach ($usersToOneGroup as $item)
                    $results[] = $singleDimArray[$item];
            }
            $updateStatus = User::query()->whereIn('id', $results)->update(['status' => 1]);
            $users = User::orderBy('id', 'DESC')->get();
        }
        return view('welcome', compact('users','results'));
    }

    public function sortToManyGroup(Request $request)
    {
        $singleDimArray = array();
        $allUsers = User::all('id')->toArray();
        shuffle($allUsers);
        foreach ($allUsers as $users=>$id) {
          $singleDimArray[$users] = $id['id'];
        }
        $userToManyGroup = array_chunk($singleDimArray, $request->member2);
        $users = User::orderBy('id', 'DESC')->get();
        return view('welcome', compact('users','userToManyGroup'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $users = Cache::get('users');
        $users = $users->forget($id);
        Cache::put('users', $users);
        return redirect()->route('user.index');
    }
}
