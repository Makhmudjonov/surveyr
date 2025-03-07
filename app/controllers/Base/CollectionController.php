<?php

namespace App\Controllers\Base;

/**
 * ----------------------------------------------------
 * To‘plam Kontrolleri
 * ----------------------------------------------------
 * 
 * Ushbu kontroller forma yuborish va tegishli funksiyalarni boshqarish uchun javobgardir.
 */

use App\Controllers\Controller;
use App\Controllers\Base\FormsController;

use App\Models\Collection;
use App\Models\Form;

class CollectionController extends Controller
{
    protected $formInstance;

    public function __construct()
    {
        parent::__construct();
        $this->formInstance = new FormsController();
    }

    /**
    * Yangi yuborilgan formani saqlash
    *
    * @param string $hash
    * @param string $slug
    * @return mixed
    */
    public function store($hash, $slug)
    {
        try{
            $form = Form::publicForm($hash, $slug);
            if(!$form) return $this->jsonError("Forma topilmadi");

            $content = request()->params('content');
            if(!$content) return $this->jsonError("Yuboriladigan ma'lumot talab qilinadi");

            $data =[
                'form_id' => $form->id,
                'submission' => $content
            ];

            $collection = Collection::create($data);
            if(!$collection) return $this->jsonError("Yuborilgan ma'lumotni saqlash muvaffaqiyatsiz tugadi");

            # TODO: Xabarnomalar va qo‘shimcha amallar

            return $this->jsonSuccess("Yuborilgan ma'lumot muvaffaqiyatli saqlandi");
        }

        catch(\Exception $e){
            return $this->jsonException($e);
        }
    }

    /**
    * Formaga yuborilgan barcha ma'lumotlarni ko‘rsatish
    *
    * @param int $formId
    * @return mixed
    */
    public function list($formId)
    {
        # so‘rovni tekshirish
        $form = Form::find($formId);
        if(!$form) return $this->errorPage(404);

        # foydalanuvchi huquqlarini tekshirish
        if(!$this->formInstance->formOwnerShipCheck($form->id) && !$this->formInstance->hasAccessbySpace($form->spaces)){
            return $this->errorPage(403);
        }
        
        # ma’lumotlarni ajratish
        $this->form = $form;
        $this->submissions = Collection::formCollections($formId, true);

        $this->renderPage("$form->title uchun yuborilgan ma'lumotlar", "app.collections.list");
    }

    /**
     * Formaga yuborilgan ma'lumotlarni vizualizatsiya qilish
     *
     * @param int $formId
     * @return mixed
     */
    public function visualize($formId)
    {
        # so‘rovni tekshirish
        $form = Form::find($formId);
        if(!$form) return $this->errorPage(404);

        # foydalanuvchi huquqlarini tekshirish
        if(!$this->formInstance->formOwnerShipCheck($form->id) && !$this->formInstance->hasAccessbySpace($form->spaces)){
            return $this->errorPage(403);
        }

        # ma’lumotlarni ajratish
        $this->form = $form;
        $this->tabsInfo = $this->tabifyInfo($form->content);
        $this->questions = $this->extractQuestions($form->content);
        $this->collections = Collection::formCollections($formId)->pluck('submission')->toArray();

        $this->renderPage("$form->title uchun yuborilgan ma'lumotlarni vizualizatsiya qilish", "app.collections.visualize");
    }

    /**
     * Yuborilgan ma'lumotni ko‘rsatish
     * 
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        # yuborilgan ma'lumotni va unga tegishli formani olish
        $collection = Collection::find($id);
        if(!$collection) return $this->errorPage(404);

        $form = Form::find($collection->form_id);
        if(!$form) return $this->errorPage(404);

        $formContent = $form->content;
        $formContent['mode'] = 'faqat ko‘rish';

        # foydalanuvchi huquqlarini tekshirish
        if(!$this->formInstance->formOwnerShipCheck($form->id) && !$this->formInstance->hasAccessbySpace($form->spaces)){
            return $this->errorPage(403);
        }

        # ma’lumotlarni ajratish
        $this->form = $form;
        $this->collection = $collection;
        $this->formContent = $formContent;

        $this->renderPage($form->title, "app.collections.show");
    }

    /**
     * Yuborilgan ma'lumotni ko‘rib chiqish
     * 
     * @param int $id
     * @return void
     */
    public function review($id)
    {
        try{
            # yuborilgan ma'lumotni va unga tegishli formani olish
            $collection = Collection::find($id);
            if(!$collection) return $this->jsonError("Yuborilgan ma'lumot topilmadi");

            $form = Form::find($collection->form_id);
            if(!$form) return $this->jsonError("Forma topilmadi");

            # foydalanuvchi huquqlarini tekshirish
            if(!$this->formInstance->formOwnerShipCheck($form->id) && !$this->formInstance->hasAccessbySpace($form->spaces)){
                return $this->jsonError("Sizda ushbu formaga kirish huquqi yo‘q");
            }

            $review = request()->params('review');
            if(!$review || !is_array($form->reviews))
                return $this->jsonError("Ko‘rib chiqish ma'lumoti talab qilinadi");

            $collection->review = $review;
            if(!$collection->save())
                return $this->jsonError("Ko‘rib chiqishni saqlash muvaffaqiyatsiz tugadi");

            return $this->jsonSuccess("Ko‘rib chiqish muvaffaqiyatli saqlandi");
        }

        catch(\Exception $e){
            return $this->jsonException($e);
        }

    }

    /**
     * Formadan savollarni ajratib olish
     * 
     * @param array $formQuestions
     * @return array
     */
    protected function extractQuestions(array $formQuestions) : array
    {
        $questions = [];
        foreach($formQuestions as $question){
            if(!isset($question['title'])) continue;
            $questions[$question['name']] = trim($question['title']) != '' ? $question['title'] : null; 
        }

        return $questions;
    }

    /**
     * Formani bo‘limlarga ajratish
     * 
     * @param array $formContent
     * @return array
     */
    function tabifyInfo($formContent) {
        
        $tabs = [];
        
        foreach ($formContent['pages'] as $page) {
            
            $questions = array_map(function($element) {
                return $element['name'];
            }, $page['elements']);
            
            // TODO: Vizualizatsiya bo‘limlarini yaratish
            $tabs[] = [
                'name' => $page['title'] ?? 'Sahifa',
                'questions' => $questions
            ];
        }
        
        return $tabs;
    }

    /**
     * Formaning barcha yuborilgan ma'lumotlarini o‘chirish
     * 
     * @param int $formId
     * @return void
     */
    public function clear($formId)
    {
        $form = Form::find($formId);
        if(!$form) return $this->errorPage(404);

        # foydalanuvchi huquqlarini tekshirish
        if(!$this->formInstance->formOwnerShipCheck($form->id)){
            return $this->errorPage(403);
        }

        Collection::where('form_id', $formId)->delete();
        return redirect(route('forms.submissions', $formId));    
    }
}
