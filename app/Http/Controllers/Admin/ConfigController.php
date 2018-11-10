<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //get admin/config
    public function Index()
    {
        $data = Config::orderBy('conf_order','asc')->get();

        foreach($data as $k=>$v){
            switch($v->field_type){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" class="lg" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    $arr = explode(',',$v->field_value);
                    $str = '';
                    foreach($arr as $m=>$n){
                    $r = explode('|',$n);
                    $c = $v->conf_content==$r[0]?' checked':'';
                    $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'"'.$c.'>'.$r[1].'　';
                    }
                    $data[$k]->_html = $str;
                    break;
            }

        }
        return view('admin.config.index',compact('data'));
    }

    public function Changeorder()
    {
        $input = Input::all();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re = $config->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '导航排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '导航排序更新失败！'
            ];
        }
        return $data;
    }

    public function Changecontent()
    {
        $input = Input::all();
        foreach($input['conf_id'] as $k=>$v){
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->PutFile();
        return back()->withErrors('配置项更新成功！');

    }

    public function PutFile()
    {
        //echo \Illuminate\Support\Facades\Config::get('web.web_title');
        $config = Config::pluck('conf_content','conf_name')->all();
        $path = base_path().'\config\web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);
    }

    //get admin/config/create
    public function Create()
    {
        return view('admin.config.add');
    }

    //post admin/config
    public function Store()
    {
        $input = Input::except('_token');

        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
        ];

        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required'=>'配置项标题不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Config::create($input);
            if($re)
                return redirect('admin/config');
            else
                return back()->withErrors('配置项创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/config/{config}/edit
    public function Edit($conf_id)
    {
        $field = Config::find($conf_id);
        return view('admin.config.edit',compact('field'));

    }

    //put admin/config/{config}
    public function Update($conf_id)
    {
        $input = Input::except('_token','_method');

        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
        ];

        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required'=>'配置项标题不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Config::where('conf_id',$conf_id)->update($input);
            if($re) {
                $this->PutFile();
                return redirect('admin/config');
            }else
                return back()->withErrors('配置项修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/config/{config}
    public function Destroy($conf_id)
    {
        $re = Config::where('conf_id',$conf_id)->delete();
        if($re){
            $this->PutFile();
            $data = [
                'status' => 0,
                'msg' => '配置项信息删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '配置项信息删除失败！',
            ];
        }
        return $data;
    }

    //get admin/config/{config}
    public function Show()
    {

    }
}
