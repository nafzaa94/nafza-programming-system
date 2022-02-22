<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderProjectRequest;
use App\Models\OrderProject;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;

class OrderProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OrderProject::all();

        $data_detail_standard = json_decode($data[0]->package_detail);

        $data_detail_premium = json_decode($data[1]->package_detail);

        $data_detail_business = json_decode($data[2]->package_detail);

        return view('order_project.orderprojectpage', [
            "title" => "orderproject",
            "data" => $data,
            "data_detail_standard" => $data_detail_standard,
            "data_detail_premium" => $data_detail_premium,
            "data_detail_business" => $data_detail_business,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OrderProject $orderProject, User $user, ProfileUser $profileUser, $id)
    {
        $data = $orderProject::where('package_name', $request->namepackage)->get();
        $datapackage = $data[0];
        $datadetail = json_decode($data[0]->package_detail);

        $datauser = $user::where('user_id', $id)->get()[0];

        $profileUser::where('id_user', $id)
            ->update(['package' => $request->namepackage]);

        return view('order_project.orderprojectcomfirm', [
            "title" => "orderprojectcomfirm",
            "datauser" => $datauser,
            "datapackage" => $datapackage,
            "datadetail" => $datadetail,
        ]);
    }

    public function halfpayment(Request $request, $id, ProfileUser $profileUser, User $user)
    {

        //ddd($request);
        $data = $request->validate([
            'imagehalfpayment' => 'image',
        ]);

        $data1 = array(
            "url_imagehalfpayment" => "",
        );

        if ($request->has('imagehalfpayment')) {
            //$data['imagehalfpayment'] = $request->file('imagehalfpayment')->store('halfpayment-image');

            $file = $request->file('imagehalfpayment');
            $path = "Image-Half-Payment/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['imagehalfpayment'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['url_imagehalfpayment'] = $image;
        }

        $datafull = array_merge($data, $data1);

        $profileUser::where('id_user', $id)
            ->update($datafull);

        $user::where('user_id', $id)->update(['status_payment' => 'half payment']);

        return view('order_project.orderprojecthalfdone', [
            "title" => "orderprojecthalfdone",
        ]);
    }

    public function fullpayment(Request $request, $id, ProfileUser $profileUser, User $user)
    {
        $data = $request->validate([
            'imagefullpayment' => 'image',
        ]);

        $data1 = array(
            "url_imagefullpayment" => "",
        );

        if ($request->has('imagefullpayment')) {
            //$data['imagefullpayment'] = $request->file('imagefullpayment')->store('fullpayment-image');

            $file = $request->file('imagefullpayment');
            $path = "Image-Full-Payment/" . time() . $file->getClientOriginalName();
            \Storage::disk('s3')->put($path, file_get_contents($file));
            $data['imagefullpayment'] = $path;
            $image = \Storage::disk('s3')->url($path);
            $data1['url_imagefullpayment'] = $image;
        }

        $datafull = array_merge($data, $data1);

        $profileUser::where('id_user', $id)
            ->update($datafull);

        $user::where('user_id', $id)->update(['status_payment' => 'full payment']);

        return view('order_project.orderprojectfulldone', [
            "title" => "orderprojectfulldone",
        ]);
    }

    public function submit(Request $request, $id, ProfileUser $profileUser)
    {
        $profileUser::where('id_user', $id)
            ->update(['package' => $request->namepackage]);

        return redirect('/');
    }

    public function mypayment($id, ProfileUser $profileUser)
    {
        $data = $profileUser::where('id_user', $id)->get();

        $datauser = $data[0];

        $package = $data[0]->package;

        $balance = "";

        if ($package === "Standard Package") {
            $balance = "RM 100";
        } elseif ($package === "Premium Package") {
            $balance = "RM 150";
        } elseif ($package === "Business Package") {
            $balance = "RM 200";
        }

        return view('profiles.mypayment', [
            "title" => "my payment",
            "data" => $datauser,
            "balance" => $balance,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProject  $orderProject
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProject $orderProject, ProfileUser $profileUser, User $user, $id)
    {
        $datanamepackage = $profileUser::where('id_user', $id)->get();

        $namepackage = $datanamepackage[0]->package;

        $data = $orderProject::where('package_name', $namepackage)->get();
        $datapackage = $data[0];
        $datadetail = json_decode($data[0]->package_detail);

        $datauser = $user::where('user_id', $id)->get()[0];

        return view('order_project.orderprojectpurchases', [
            "title" => "orderprojectcomfirm",
            "datauser" => $datauser,
            "datapackage" => $datapackage,
            "datadetail" => $datadetail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProject  $orderProject
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProject $orderProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderProjectRequest  $request
     * @param  \App\Models\OrderProject  $orderProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderProjectRequest $request, OrderProject $orderProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProject  $orderProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProject $orderProject)
    {
        //
    }
}
