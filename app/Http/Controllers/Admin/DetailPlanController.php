<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUpdateDetail;
use App\Models\DetailPlan;

use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{

    protected $repository,$plan;

    public function __construct(DetailPlan $detailPlan,Plan $plan)
    {
        $this->repository=$detailPlan;
        $this->plan=$plan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlPlan)
    {
       if (!$plan=$this->plan->where('url',$urlPlan)->first()){
          return redirect()->back();
       }
       $details= $plan->details()->paginate();

        return view('admin.pages.plans.details.index',compact(['details','plan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlPlan)
    {
        if (!$plan=$this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }

       return view('admin.pages.plans.details.create',compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDetail $request,$urlPlan)
    {
//        dd('aqui');
        if (!$plan=$this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }
//       $data=$request->all();
//        $data['plan_id']=$plan->id;
//        $this->repository->create($data);

        $plan->details()->create($request->all());
       return redirect()->route('details.index',$plan->url)
           ->with('message','Registro Criado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlPlan,$id)
    {
        $plan=$this->plan->where('url',$urlPlan)->first();
        $detail=$this->repository->findorfail($id);
        if (!$plan) {
            return redirect()->back();
        } else {
            return view('admin.pages.plans.details.show', compact('plan','detail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlPlan,$idDetail)
    {
        $plan=$this->plan->where('url',$urlPlan)->first();
        $detail=$this->repository->findorfail($idDetail);

        if (!$plan || !$detail){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit',compact('plan','detail'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDetail $request,$urlPlan, $idDetail)
    {
        $plan=$this->plan->where('url',$urlPlan)->first();
        $detail=$this->repository->findorfail($idDetail);

        if (!$plan|| !$detail){
            return redirect()->back();
        }

        $detail->update($request->all());
        return redirect()->route('details.index',$plan->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlPlan, $idDetail)
    {
        $plan=$this->plan->where('url',$urlPlan)->first();
        $detail=$this->repository->findorfail($idDetail);
        $detail->Delete();
        if (!$detail) {
            return redirect()->back();
        } else {
            return redirect()
                ->route('details.index',$plan->url)
                ->with('message','Registro Deletado');
        }
    }
}
