<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    private $permission, $profile;

    public function __construct(Permission $permission, Profile $profile)
    {
        $this->permission = $permission;
        $this->profile = $profile;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->with('permissions')->findorfail($idProfile);
        if (!$profile) {
            return redirect()->back();
        }

        $permissions= $profile->permissions;
        return view('admin.pages.profiles.permissions.index', compact('profile','permissions'));
    }


    public function permissionsAvailable(Request $request,$idProfile)
    {

        if (!$profile=$this->profile->with('permissions')->findorfail($idProfile)) {
            return redirect()->back();
        }
        $filters = $request->except('_token');

//        $permissions=$this->permission->all();
      $permissions= $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.create', compact('profile','permissions'));

    }


    public function attachPermissionProfile(Request $request,$idProfile)
    {
        $profile = $this->profile->with('permissions')->findorfail($idProfile);
        if (!$profile) {
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions)==0){
            return redirect()->back()->with('error','Necessario escolher 1 permissão');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions',$profile->id);
    }

    public function detachPermissionProfile($idProfile,$idPermission)
    {
        $profile = $this->profile->with('permissions')->findorfail($idProfile);
        $permission = $this->permission->findorfail($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions',$profile->id);
    }

///////////////////////////////////////////////
    public function profiles($idPermission)
    {
        $permission = $this->permission->with('profiles')->findorfail($idPermission);
        if (!$permission) {
            return redirect()->back();
        }

        $profiles= $permission->profiles;
        return view('admin.pages.profiles.profiles_permissions.index', compact('profiles','permission'));

    }

    public function detachProfilePermission($idPermission,$idProfile)
    {
        $permission = $this->permission->with('profiles')->findorfail($idPermission);
        $profile = $this->profile->findorfail($idProfile);

        if (!$permission || !$profile) {
            return redirect()->back();
        }

        $permission->profiles()->detach($profile);
        return redirect()->route('permissions.index');
//        return redirect()->route('permission.profiles',$permission->id);
    }

}
