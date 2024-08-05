<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug','file', 'dimension','user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function uploadDate() {
        return $this->created_at->diffForHumans();
    }

    public static function makeDirectory() {        
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public  static function getImageDimension($image) {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width . 'x' . $height;
    }

    public function scopePublished($query) {
        return $query->where('is_published',true);
    }

    public function fileURL() {
        return Storage::url($this->file);
    }

    public function link() {
        return route('image.show',$this->slug);
    }

    public function getSlug() {
        $slug = str($this->title)->slug();
        $numSlugs = static::where('slug','LIKE',"$slug%")->count();
        if ($numSlugs > 0) {
            return $slug . '-' . $numSlugs + 1;
        }
        return $slug;
    }

    protected static function booted(): void
    {
        static::creating(function ($image) {
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }

        });

        static::updating(function ($image) {
            if ($image->title && !$image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }

        });

        static::deleted(function ($image) {
            Storage::delete($image->file);
        });
    }
}
