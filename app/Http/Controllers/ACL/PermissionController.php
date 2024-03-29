<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Permission;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(Permission $permission)
    {
        $this->repository=$permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('permissions.index')
            ->with('message', 'Permissão Criada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->repository->findorfail($id);

        if (!$permission) {
            return redirect()->back();
        } else {
            return view('admin.pages.permissions.show', compact('permission'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->findorfail($id);

        if (!$permission) {
            return redirect()->back();
        } else {
            return view('admin.pages.permissions.edit', compact('permission'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        $permission = $this->repository->findorfail($id);


        if (!$permission) {
            return redirect()->back();
        } else {
            $permission->update($request->all());
            return redirect()->route('permissions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->findorfail($id);

        if (!$permission) {
            return redirect()->back();
        } else {

            $permission->Delete();
            return redirect()->route('permissions.index')
                ->with('message','Pemissão Deletada');
        }

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $permissions = $this->repository->search($request->filter);
        return view('admin.pages.permissions.index', compact('permissions', 'filters'));
    }
}
