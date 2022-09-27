<?php

namespace odbh\Http\Requests;

use odbh\Http\Requests\Request;

class QCertificatesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        $id = $this->segment(3);

        $request = Request::all();
//        dd($request);

//        if ($request['is_bulgarian'] == 0) {
//            $is_valid = 'required|max:9|is_valid';
//            $required = '|required';
//        } else {
//            $is_valid = '';
//            $required = '';
//        }

        return [
            'what_7'=>'required',
            'type_crops'=>'required',
            'importer_data'=>'required',
            'packer_name'=>'required|latin|min:3|max:500',
            'packer_address'=>'required|latin|min:5|max:500',
            'from_country'=>'required|min:5|max:300',



//            'name_bg'=>'cyrillic_with|min:3|max:300'.$required,
//            'address_bg'=>'cyrillic_with|min:5|max:500'.$required,
//            'name_en'=>'required|latin|min:3|max:300',
//            'address_en'=>'required|latin|min:5|max:500',
//            'vin'=> $is_valid.'|unique:importers,vin,'.$id,
        ];
    }

    /**
     * Проверка на входящите данни и мои съобщения
     * @return array
     */
    public function messages()
    {
        return [
            'what_7.required' => 'Избери Поле № 7. За какво се издава сертификата!',
            'type_crops.required' => 'Избери дали е за консумация или преработка!',
            'importer_data.required' => 'Избери Поле № 1 Избери фирмата! Търговеца!',

            'packer_name.required' => 'Поле № 2 Опаковчик е задължително!',
            'packer_name.latin' => 'Поле № 2 За Име на Опаковчик използвай латиница!',
            'packer_name.min' => 'Името на Опаковчик се изписва с минимум 3 символа!',
            'packer_name.max' => 'Името на Опаковчик се изписва с максимум 500 символа!',

            'packer_address.required' => 'Поле № 2 Адреса на Опаковчик е задължително!',
            'packer_address.latin' => 'Поле № 2 За Адреса на Опаковчик използвай латиница!',
            'packer_address.min' => 'Адреса на Опаковчик се изписва с минимум 5 символа!',
            'packer_address.max' => 'Адреса на Опаковчик се изписва с максимум 500 символа!',

            'from_country.required' => 'Поле № 4. Място на инспекцията/страна е задължително!',
            'from_country.min' => 'Поле № 4. Място на инспекцията се изписва с минимум 5 символа!',
            'from_country.max' => 'Поле № 4. Място на инспекцията се изписва с максимум 300 символа!',



//            'is_bulgarian.required' => 'Избери дали фирмата е българска или не!',

//            'name_bg.cyrillic_with' => 'Използвай кирилица!',
//            'name_bg.min' => 'Името се изписва с минимум 3 символа!',
//            'name_bg.max' => 'Името се изписва с максимум 300 символа!',
//            'name_bg.required' => 'Напиши името на фирмата на български!',
//
//            'address_bg.cyrillic_with' => 'Използвай кирилица!',
//            'address_bg.min' => 'Адреса се изписва с минимум 5 символа!',
//            'address_bg.max' => 'Адреса се изписва с максимум 500 символа!',
//            'address_bg.required' => 'Напиши адреса на фирмата на български!',
//

//
//            'address_en.required' => 'Напиши адреса на фирмата на английски!',
//            'address_en.latin' => 'Използвай латиница!',
//            'address_en.min' => 'Адреса се изписва с минимум 5 символа!',
//            'address_en.max' => 'Адреса се изписва с максимум 500 символа!',
//
//            'vin.required' => 'Попълни ЕИК/Булстат!',
//            'vin.max' => 'Максимален брой символи за ЕИК/Булстат - 9! Провери дали няма прзен символ преди или след номера!',
//            'vin.is_valid' => 'Невалиден ЕИК/Булстат!',
//            'vin.unique' => 'ЕИК/Булстат е уникален! Виж дали няма вече добавена фирма с този ЕИК/Булстат!',
        ];
    }
}
