<?php

namespace App\Controllers\Api;
use App\Controllers\Api\BaseController;

use App\Models\Form;
use App\Models\Collection;

use Leaf\Database as DB;

class CollectionController extends BaseController
{
    
    public function __construct()
    {
        AuthController::authorize();
        parent::__construct();
    }

    /**
     * Forma jo‘natmalarini saqlash
     * Yagona forma jo‘natmasini saqlaydi
     * 
     * @param request $formId
     * @param request $content
     * 
     * @return void
     */
    public function store()
    {
        try{
            $formId = request()->params('formId');
            $form = Form::where(DB::$capsule::raw("MD5(id)"), $formId)->first();
            if(!$form) return self::jsonError("Forma topilmadi", 404);

            $content = json_decode($_REQUEST['content']) ?? null;
            if(!$content) return self::jsonError("Jo‘natma ma’lumotlari talab qilinadi");

            $data =[
                'form_id' => $form->id,
                'submission' => $content
            ];

            $collection = Collection::create($data);
            if(!$collection) return self::jsonError("Jo‘natmani saqlash muvaffaqiyatsiz bo‘ldi");

            return self::jsonSuccess("Jo‘natma muvaffaqiyatli saqlandi");
        }

        catch(\Exception $e){
            return self::jsonException($e);
        }
    }

    /**
     * Bir nechta forma jo‘natmalarini saqlash
     * 
     * @param request $formId
     * @param request $content
     * 
     * @return void
     */
    public function multiple(){
        try{

            # Formani tekshirish
            $formId = request()->params('formId');
            $form = Form::where(DB::$capsule::raw("MD5(id)"), $formId)->first();
            if(!$form) return self::jsonError("Forma topilmadi", 404);

            # Kontentni tekshirish
            $content = json_decode($_REQUEST['content']) ?? null;
            if(!$content) return self::jsonError("Jo‘natma maydoni bo‘sh yoki noto‘g‘ri ma’lumotni o‘z ichiga oladi", 400);
            if(count($content) < 2) return self::jsonError("Jo‘natma kamida 2 ta elementni o‘z ichiga olishi kerak", 400);

            # Kiritish uchun ma’lumotlarni tayyorlash
            $data = array_map(fn($submission) => [
                'form_id' => $form->id,
                'submission' => json_encode($submission)
            ], $content);

            $collection = Collection::insert($data);
            if(!$collection) return self::jsonError("Jo‘natmalarni saqlash muvaffaqiyatsiz bo‘ldi", 500);

            return self::jsonSuccess("Jo‘natmalar muvaffaqiyatli saqlandi");
        }

        catch(\Exception $e){
            return self::jsonException($e);
        }
    }


    public static function routes()
    {
        app()::post('/store', ['name'=>'api.collection.store', 'CollectionController@store']);
        app()::post('/store/multiple', ['name'=>'api.collection.mstore', 'CollectionController@multiple']);
    }
}
