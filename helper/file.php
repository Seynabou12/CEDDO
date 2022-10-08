<?php

use Illuminate\Support\Facades\Route;

function defaultRoutesFor(string $route, string $controller = null)
{

    Route::get("/$route/{uuid?}", [$controller, 'get'])->name("{$route}.get")->where('uuid', '[0-9a-z\-]+');
    Route::post("/$route/{uuid?}", [$controller, 'save'])->name("{$route}.save")->where('uuid', '[0-9a-z\-]+');
    Route::get("/$route/{uuid}/delete", [$controller, 'delete'])->name("{$route}.delete")->where('uuid', '[0-9a-z\-]+');
}


function storefile($file)
{

    $directory = 'uploads/' . (new DateTime())->format('Y-m-d');

    $filename = substr(bin2hex(random_bytes(32)), 0, 15) . '.' . $file->getClientOriginalExtension();

    $path = $file->storeAs(
        $directory,
        $filename,
        'public'
    );

    return  'storage/' . $directory . '/' . $filename;
}
