<table id="example" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
    <thead>
        <tr>
            <th>N</th>
            <th>Номер</th>
            <th>Дата на издаване</th>
            <th>Фирма</th>
            <th>Фактура</th>
            <th>Сума</th>
            <th>Инспектор</th>
            <th>Завършен</th>
            <th>Виж</th>
        </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    @foreach($certificates as $certificate)
            <?php
                if($certificate->is_all === 0) {
                    $all = 'Не завършен';
                    $alert = 'red';
                } else {
                    $all = 'OK';
                    $alert = '';
                }
            ?>
        <tr>
            <td class="right"><?= $n++ ?></td>
            <td>{{$certificate->import}}</td>
            <td>{{ date('d.m.Y', $certificate->date_issue) }}</td>
            <td>{{strtoupper($certificate->importer_name)}}</td>
            <td style="text-align: right; padding-right: 4px">
                @if( $certificate->invoice_id == '0')
                    <a href='/контрол/фактури-внос/{{$certificate->id}}' class="fa fa-plus-circle btn btn-danger my_btn"> Add</a>
                @else
                    номер на фактура
                @endif
            </td>
            <td style="text-align: right; padding-right: 4px"></td>
            <td>{{$certificate->inspector_bg}}</td>
            <td><span class="{{$alert}}">{{$all}}</span></td>
            <td>
                @if ($certificate->is_all === 0)
                <a href='/контрол/сертификат-внос/{{$certificate->id}}/завърши' class="fa fa-edit btn btn-danger my_btn"></a>
                @else
                <a href='/контрол/сертификат/{{$certificate->id}}' class="fa fa-binoculars btn btn-primary my_btn"></a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" style="text-align:right">Всичко:</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>