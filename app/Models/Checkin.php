<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    protected $fillable = ['date', 'image', 'name'];

    // Accessor for the 'image' attribute
    public function getImageAttribute($value)
    {
        $baseUrl = url('/')."/";

        // Concatenate the base URL with the image filename
        return $baseUrl . $value;
    }

    // Mutator for the 'image' attribute
    public function setImageAttribute($value)
    {
        $baseUrl = url('/')."/";

        // Remove the base URL if it exists in the provided value
        if (str_starts_with($value, $baseUrl)) {
            $value = str_replace($baseUrl, '', $value);
        }

        // Set the 'image' attribute without the base URL
        $this->attributes['image'] = $value;
    }


    public function getDateAttribute($value)
    {

        return date('d F Y', strtotime($value));
    }


    public function setDateAttribute($value)
    {
  
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }


   
}
