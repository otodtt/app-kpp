<table id="example" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
    <thead>
    <tr>
        <th>N</th>
        <th>Идентификатор</th>
        <th>Номер/дата на Фактурата</th>
        <th>Стойност</th>
        <th>Издадена на</th>
        <th>Издадена за</th>
    </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    @foreach($invoices as $invoice)
        <tr>
            <td class="center"><?= $n++ ?></td>
            <td>
                {{$invoice->identifier}}
            </td>
            <td>
                {{$invoice->number_invoice}}/{{ date('d.m.Y', $invoice->date_invoice)  }}
            </td>
            <td class="right">
                {{$invoice->sum}}
            </td>
            <td>
                {{$invoice->importer_name}}
                <a href="{!!URL::to('/контрол/търговци/'.$invoice->id.'/show')!!}" class="fa fa-binoculars btn btn-default my_btn" style="float: right"></a>
            </td>
            <td>
                @if($invoice->invoice_for == 1)
                    <span>Сетификат за внос - </span>
                @elseif($invoice->invoice_for == 2)
                    <span>Сетификат за износ - </span>
                @endif
                {{$invoice->certificate_number}}
                    <a href="{!!URL::to('/контрол/сертификат/'.$invoice->certificate_id )!!}" class="fa fa-search-plus btn btn-default my_btn" style="float: right"></a>
            </td>
            {{--<td class="center last-column">--}}
                {{--<a href="{!!URL::to('/контрол/търговци/'.$invoice->id.'/edit')!!}" class="fa fa-edit btn btn-primary my_btn"></a>--}}
            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3" style="text-align:right">Всичко:</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </tfoot>
</table>