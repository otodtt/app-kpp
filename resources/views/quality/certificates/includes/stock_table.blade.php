<table id="example" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
    <thead>
        <tr>
            <th>N</th>
            <th>Дата на издаване</th>
            <th>Серт. Номер/Дата</th>
            <th>Издаден на</th>
            <th>Култура</th>
            <th>Опаковки</th>
            <th>Количество</th>
            <th>Инспектор</th>
            <th>Виж</th>
        </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    @foreach($stocks as $stock)

        <tr>
            <td class="right"><?= $n++ ?></td>
            <td>{{ date('d.m.Y', $stock->date_issue) }}</td>
            <td>
                @foreach($certificates as $k=>$certificate)
                    <?php //break; ?>
                    <?php
                        if($certificate->id == $stock->certificate_id) {
                            ?>
                                {{ $certificate->import }} / {{ date('d.m.Y', $certificate->date_issue) }}
                            <?php
                            break;
                        }
                    ?>
                @endforeach

            </td>
            <td>
                @if($stock->import > 0)
                    <p>Внос</p>
                @endif
                @if($stock->export > 0)
                    <p>Износ</p>
                @endif
                @if($stock->internal > 0)
                    <p>Вътрешен</p>
                @endif
            </td>
            <td style="text-align: left">
                {{$stock->crops_name}} / {{$stock->crop_en}}
            </td>
            <td style="text-align: left;">
                <?php
                    if( $stock->type_pack == 1){
                        $type = 'Каси';
                    }
                    elseif($stock->type_pack == 2){
                        $type = 'Палети';
                    }
                    elseif($stock->type_pack == 3){
                        $type = 'Кашони';
                    }
                    elseif($stock->type_pack == 4){
                        $type = 'Торби';
                    }
                    elseif($stock->type_pack == 999){
                        $type = $stock->different;
                    }
                    else {
                        $type = '';
                    }
                ?>
                {{ $type }} <span style="float: right; margin-right: 10px">{{ $stock->number_packages }}</span>
            </td>
            <td style="text-align: right; padding-right: 4px">{{ number_format($stock->weight , 0, ',', ' ') }}</td>
            <td>{{$stock->updated_by}}</td>
            {{--<td><span class="{{$stock}}">{{$stock}}</span></td>--}}
            <td>
                @if ($stock->is_all === 0)
                <a href='/контрол/сертификат-внос/{{$stock->id}}/завърши' class="fa fa-edit btn btn-danger my_btn"></a>
                @else
                <a href='/контрол/сертификат/{{$stock->id}}' class="fa fa-binoculars btn btn-primary my_btn"></a>
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