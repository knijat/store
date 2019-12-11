<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/5/2019
 * Time: 10:10 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends  Model
{
    protected $table='products';
    protected $fillable = ['id_category','name','price','image','slug','description','quantity'];


}


?>