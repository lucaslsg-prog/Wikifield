<?php

namespace App\Services;

use App\Model\Smartphone as ModelSmartphone;
use Illuminate\Support\Facades\Log;
use Throwable;

class AutorService
{
    public static function store($request)
    {
        try {
            return ModelSmartphone::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update($request, $smartphone)
    {
        try {
            return $smartphone->update($smartphone);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy($smartphone)
    {
        try {
            $smartphone->smartphones()->detach();
            return $smartphone->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function listaSmartphones($request){

        $termoPesquisa = trim($request->searchTerm);

        if (empty($termoPesquisa)){
            return ModelSmartphone::select('id', 'mdoel as text')->get();
        }

        return ModelSmartphone::select('id','model as text')
                    ->where('model','like', '%' . $termoPesquisa . '%')
                    ->get();
    }
} 