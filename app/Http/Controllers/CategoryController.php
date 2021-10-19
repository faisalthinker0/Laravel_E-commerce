<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }

    public function manage_category(Request $request,$id='')
    {
        if($id>0)
        {
            $arr=$model=Category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']=0;
        }
        return view('admin/manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0)
        {
            $model=Category::find($request->post('id'));
            $msg="Catgory Updated";
        }
        else
        {
            $model=new Category();
            $msg="Catgory Inserted";
        }
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function delete(REQUEST $request,$id)
    {
        $model=Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }    

    public function status(REQUEST $request,$status,$id)
    {
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category Status Updated');
        return redirect('admin/category');

    }   
    


    
}
