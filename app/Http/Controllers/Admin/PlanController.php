<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $plans=$this->repository->all();

        //Paginar
        $plans = $this->repository->paginate();
        return view('admin.pages.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlan $request)
    {

        //Usando observer para a url,precisa registar em AppServiceProvider
        //Importante mudar os metodos para CREATING e UPDATING para executar as açõeos antes ;
        $this->repository->create($request->all());


//        $this->repository->create($request->all());
        return redirect()->route('plans.index')
            ->with('message', 'Registro Criado');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        } else {
            return view('admin.pages.plans.show', compact('plan'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        } else {
            return view('admin.pages.plans.edit', compact('plan'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlan $request, $id)
    {
        $plan = $this->repository->findorfail($id);


        if (!$plan) {
            return redirect()->back();
        } else {
            $plan->update($request->all());
            return redirect()->route('plans.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = $this->repository->with('details')->findorfail($id);

        if (!$plan) {
            return redirect()->back();
        } else {
            if ($plan->details->count() > 0) {
                return redirect()->back()
                    ->with('error', 'Existem Detalhes Vinculados a esse plano,Portando não e possivel excluir!');
            } else {
                $plan->Delete();
                return redirect()->route('plans.index')
                    ->with('message','Registro Deletado');
            }
        }
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }
}
