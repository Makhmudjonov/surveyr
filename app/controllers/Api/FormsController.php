<?php

namespace App\Controllers\Api;
use App\Controllers\Api\BaseController;

use App\Models\Form;
use Leaf\Database as DB;

class FormsController extends BaseController
{
    public function __construct()
    {
        AuthController::authorize();
        parent::__construct();
    }

    /**
     * Foydalanuvchi tomonidan yaratilgan barcha formalarning ro‘yxatini olish
     * 
     * @return void
     */
    public function index(){
        $forms = Form::userForms(auth()->id(), true);
        if(!$forms->count())
            return self::jsonError("Hech qanday forma topilmadi", 200);

        // Forma ID'sini MD5 formatiga o‘zgartirish
        $forms = $forms->map(function ($form) {
            return array_merge($form->toArray(), ['id' => md5($form->id)]);
        });        
        

        $this->forms = $forms;
        return self::jsonSuccess("Formalar muvaffaqiyatli olindi");
    }

    /**
     * Berilgan ID bo‘yicha formani olish
     * 
     * @param string $formId
     * @return void
     */
    public function fetch(string $formId)
    {
        try{
            $form = Form::where(DB::$capsule::raw("MD5(id)"), $formId)->first();
            if(!$form) return self::jsonError("Forma topilmadi", 404);

            # Forma egaligini tekshirish
            if(!$this->formOwnerShipCheck($form->id) && !$this->hasAccessbySpace($form->spaces))
                return self::jsonError("Sizda ushbu formaga kirish huquqi yo‘q", 403);

            $surveyMode = 'ruxsat berilgan';
            $formContent = $form->content;

            # Formaning ochiq yoki yopiq ekanligini tekshirish
            $this->formStatus = $formStatus = 
                ($form->start_date < now() && $form->end_date > now()) || $form->is_indefinite;

            if(!$formStatus){
                if($form->end_date < now()){
                    $this->message = "Forma yuborish muddati tugagan";
                    $formContent['mode'] = 'faqat ko‘rish';  // faqat o‘qish rejimi
                    $surveyMode = 'cheklangan';
                }else{
                    return response()->markup(view('app.forms.closed',[
                        'formId' => $form->id,
                    ]), 418);
                }
            }

            $unset = ['id', 'user', 'content'];
            foreach($unset as $key) unset($form->$key);

            # Ma’lumotlarni ajratish
            $this->form = $form;
            $this->publicForm = true;
            $this->surveyMode = $surveyMode;
            $this->formContent = $formContent;

            return self::jsonSuccess("Forma muvaffaqiyatli olindi");
        }

        catch(\Exception $e){
            return self::jsonException($e);
        }
    }

    public static function routes()
    {
        app()::get('', ['name'=>'api.forms.list', 'FormsController@index']);
        app()::get('fetch/{formId}', ['name'=>'api.forms.fetch', 'FormsController@fetch']);
    }
}
