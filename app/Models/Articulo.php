<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class Articulo extends Model
{
    use HasFactory;

    private function imagen_url_relativa()
    {
        return '/uploads/' . $this->imagen;
    }

    private function miniatura_url_relativa()
    {
        return '/uploads/' . $this->miniatura;
    }

    protected $fillable = ['nombre', 'autor', 'precio', 'categoria_id', 'ruta_imagen'];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getImagenAttribute()
    {
        return $this->id . '.png';
    }

    public function getMiniaturaAttribute()
    {
        return $this->id . '_mini.png';
    }

    public function getImagenUrlAttritube()
    {
        return Storage::url(mb_substr($this->imagen_url_relativa(), 1));
    }

    public function getMiniaturaUrlAttribute()
    {
        return Storage::url(mb_substr($this->miniatura_url_relativa(), 1));
    }

    public function existeImagen()
    {
        return Storage::disk('public')->exists($this->imagen_url_relativa());
    }

    public function existeMiniatura()
    {
        return Storage::disk('public')->exists($this->miniatura_url_relativa());
    }

    public function guardar_Imagen(UploadedFile $imagen, string $nombre, int $escala, ?ImageManager $manager = null)
    {
        if ($manager === null) {
            $manager = new ImageManager(new Driver());
        }

        $imagen = $manager->read($imagen);
        $imagen->scaleDown($escala);
        $ruta = Storage::path('public/uploads/'. $nombre);
        $imagen->save($ruta);
    }
}
