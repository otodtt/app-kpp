<table id="example" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
    <thead>
        <tr>
            <th>N</th>
            <th>Номер</th>
            <th>Дата на издаване</th>
            <th>Фирма</th>
            <th>Валиден до</th>
            <th>Инспектор</th>
            <th>OK</th>
            <th>Виж</th>
        </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    @foreach($certificates as $certificate)
            <?php
                if ($certificate->import != 0) {
                    $certificate_number = $certificate->import;
                }
                if ($certificate->export != 0) {
                    $certificate_number = $certificate->export;
                }
                if ($certificate->internal != 0) {
                    $certificate_number = $certificate->internal;
                }

                if($certificate->is_all === 0) {
                    $all = 'Не завършен';
                } else {
                    $all = '';
                }
            ?>
        <tr>
            <td class="right"><?= $n++ ?></td>
            <td>{{$certificate_number}}</td>
            <td>{{$certificate->date_invoice}}</td>
            <td>{{strtoupper($certificate->importer_name)}}</td>
            <td></td>
            <td>{{$certificate->inspector_bg}}</td>
            <td><span class="red">{{$all}}</span></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>