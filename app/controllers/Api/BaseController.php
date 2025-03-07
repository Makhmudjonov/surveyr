<?php

namespace App\Controllers\Api;

use App\Models\Form;
use App\Models\Space;

/**
 * 
 * API Asosiy Kontrolleri
 *
 * Bu sizning Leaf MVC loyihangiz uchun asosiy kontroller.
 * Bu yerda paketlarni ishga tushirishingiz yoki boshqa 
 * barcha kontrollerlaringizda ishlatish uchun metodlarni aniqlashingiz mumkin.
 * 
 */

 class BaseController extends \Leaf\Controller
 {
    protected static array $data = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        session()->destroy();
    }
    

    public function __set(string $name, mixed $value): void
    {
        static::$data[$name] = $value;
    }

    /**
     * JSON formatida muvaffaqiyatli javob qaytarish.
    *
    * @param string $message
    * @return Response
    */
    protected static function jsonSuccess(string $message)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            ...static::$data,
        ]);
    }

    /**
     * JSON formatida xato haqida javob qaytarish.
    *
    * @param string $message
    * @param int $code
    * @return Response
    */
    protected static function jsonError(string $message, int $code = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            ...static::$data,
        ], $code);
    }

    /**
     * Istisnolarni qayta ishlash va JSON formatida xato javobi qaytarish.
    *
    * @param Throwable $e
    * @return Response
    */
    protected static function jsonException(\Throwable $e)
    {
        $response = [
            'status' => false,
            'message' => 'Kutilmagan xatolik yuz berdi',
        ];

        if (filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOL)) {
            $response['debug'] = [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ];
        }

        return response()->json([...$response, ...static::$data]);
    }


    /* Forma yordamchilari */

    /**
     * Forma egasini tekshirish
     *
     * @param int $id
     * @return bool
     */
    public function formOwnerShipCheck($id) : bool
    {
        $form = Form::find($id);
        if(!$form) return false;

        return (auth()->user()->role == 'admin') || ($form->user_id == auth()->id()) || 
            in_array((string) auth()->id(), $form->collaborators);
    }

    /**
     * Foydalanuvchida forma uchun ruxsat borligini tekshirish
     *
     * @param array $spaces
     * @return bool
     */
    public function hasAccessbySpace(array $spaces) : bool
    {
        $spaces = Space::whereIn('id', $spaces)
            ->where('user_id', auth()->id())
            ->orWhereJsonContains('members', (string) auth()->id())
            ->get();

        if($spaces->count()) return true;
        return false;
    }
}
