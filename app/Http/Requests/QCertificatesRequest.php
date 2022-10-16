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
        return [
            // 'what_7'=>'required',
            'type_crops'=>'required',
            'importer_data'=>'required',
            'packer_name'=>'required|latin|min:3|max:500',
            'packer_address'=>'required|latin|min:5|max:500',
            'from_country'=>'required|min:5|max:300',
            'id_country'=>'required',
            'observations'=>'min:2|max:500',
            'transport'=>'required|latin|min:3|max:300',
            'customs_bg'=>'required|cyrillic_with|min:3|max:300',
            'customs_en'=>'required|latin|min:3|max:300',
            'place_bg'=>'required|cyrillic_with|min:3|max:300',
            'place_en'=>'required|latin|min:3|max:300',
            'valid_until'=>'required|date_format:d.m.Y|after:hidden_date',
            'invoice'=> 'required|numeric|min:1',
            'date_invoice'=> 'required|date_format:d.m.Y',
            'sum'=> 'required|numeric|min:1',
        ];
    }

    /**
     * Проверка на входящите данни и мои съобщения
     * @return array
     */
    public function messages()
    {
        return [
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

            'id_country.required' => 'Избери в Поле № 5. Регион или страна!',

            'observations.min' => 'Поле № 13. Забележки се изписва с минимум 2 символа!',
            'observations.max' => 'Поле № 13. Забележки се изписва с максимум 500 символа!',

            'transport.required' => 'Поле № 6 Идентификация на транспортните средства е задължително!',
            'transport.min' => 'Поле № 6. Идентификация се изписва с минимум 3 символа!',
            'transport.max' => 'Поле № 6. Идентификация се изписва с максимум 300 символа!',
            'transport.latin' => 'Поле № 6 За Идентификация използвай латиница!',

            'customs_bg.required' => 'Поле № 12. Митница на български е задължително!',
            'customs_bg.cyrillic_with' => 'Поле № 12. За Митница на български използвай кирилица!',
            'customs_bg.min' => 'Поле № 12. Митница на български се изписва с минимум 5 символа!',
            'customs_bg.max' => 'Поле № 12. Митница на български се изписва с максимум 300 символа!',

            'customs_en.required' => 'Поле № 12. Митница на латиница е задължително!',
            'customs_en.latin' => 'Поле № 12. За Митница на латиница използвай латиница!',
            'customs_en.min' => 'Поле № 12. Митница на латиница се изписва с минимум 5 символа!',
            'customs_en.max' => 'Поле № 12. Митница на латиница се изписва с максимум 300 символа!',

            'place_bg.required' => 'Поле № 12. Място на български е задължително!',
            'place_bg.cyrillic_with' => 'Поле № 12. За Място на български използвай кирилица!',
            'place_bg.min' => 'Поле № 12. Място на български се изписва с минимум 5 символа!',
            'place_bg.max' => 'Поле № 12. Място на български се изписва с максимум 300 символа!',

            'place_en.required' => 'Поле № 12. Място на латиница е задължително!',
            'place_en.latin' => 'Поле № 12. За Място на латиница използвай латиница!',
            'place_en.min' => 'Поле № 12. Място на латиница се изписва с минимум 5 символа!',
            'place_en.max' => 'Поле № 12. Място на латиница се изписва с максимум 300 символа!',

            'valid_until.required' => 'Поле № 12. Валиден до .. е задължително! Избери дата!',
            'valid_until.date_format' => 'Поле № 12. Валиден до .. е в Непозволен формат за дата!',
            'valid_until.after' => 'Поле № 12. Валиден до .. трябва да е поне 1 ден след дата на Сертификата!',

            'invoice.required' => 'Номера на Фактурата е здължителен!',
            'invoice.numeric' => 'За номер на Фактура използвай само цифри!',
            'invoice.min' => 'Номера на Фактурата не може да е нула - 0 или отрицателно число!',

            'date_invoice.required' => 'Дата на Фактурата е здължителна!',
            'date_invoice.date_format' => 'Непозволен формат за Дата на Фактура!',

            'sum.required' => 'Сумата е здължителен!',
            'sum.numeric' => 'За сумата на Фактура използвай само цифри!',
            'sum.min' => 'Сумата не може да е нула - 0 или отрицателно число!',
        ];
    }
}
