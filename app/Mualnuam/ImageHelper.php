<?php
/**
 * Created by PhpStorm.
 * User: alanpachuau
 * Date: 06/07/14
 * Time: 4:50 AM
 */
namespace Mualnuam;
use Illuminate\Filesystem\Filesystem;

class ImageHelper extends Filesystem
{
    public static function store($fileName)
    {
        $source = public_path('uploads/temp/' . $fileName);
        if ((new self)->exists($source)) {
            $hash = pathinfo($source, PATHINFO_FILENAME);
            $path = chunk_split($hash, 2, '/');
            $uploadDir = public_path('uploads/images/') . $path;
            $target = $uploadDir . $fileName;
            (new self)->makeDirectory($uploadDir, 0777, true);
            (new self)->move($source, $target);

            return 'uploads/images/' . $path . $fileName;
        }
    }

    public static function remove($file)
    {
        return (new self)->delete($file);
    }
}