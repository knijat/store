<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product;
use App\category;
use Carbon\Carbon;
use App\Http\Requests\ProValidation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminPostController extends Controller{


    public function addcategory(Request $request)
    {
        try{$category=new category();
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            $category->save();


        }catch (\Exception $e){
            return redirect()->back()->with('unsuccess',$e);
        }

        return 'true';
    }

    public function addproduct(ProValidation $request)
    {

        if(Input::hasFile('image')){


            $image=Input::file('image');
            $size=$image->getSize();
            $path='images';
            $name=$image->getClientOriginalName();

            $extension=File::extension($name);
            $new_name=$request->input('name').time().'.'.$extension;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(250, 300);
//            $image_resize->blur();
//            $image_resize->blur(15);

            if($size<=1024*1024*2){

                try{$image_resize->save(public_path($path.'/'.$new_name));}catch (\Exception $e){
                    return redirect()->back()->with('success',$e);
                }

               try{$product=new product();
                $product->id_category=$request->input('category');
                $product->name=$request->input('name');
                $product->description=$request->input('description');
                $product->price=$request->input('price');
                $product->quantity=$request->input('quantity');
                $product->image=$new_name;
                $product->slug=$new_name;
                $product->save();
                }catch (\Exception $e){
                   File::delete('images/'.$new_name);
                    return redirect()->back()->with('unsuccess',$e);
               }
            }


        }

        return 'true';

//        return redirect()->back()->with('success','Action happened successfully');
//        $product->image=$request->input('image');
//        $product->slug=$request->input('slug');

    }

}

?>