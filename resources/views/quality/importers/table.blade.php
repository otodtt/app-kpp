<table id="example" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
    <thead>
        <tr>
            <th>N</th>
            <th>Име на Фирмата</th>
            <th>Адрес</th>
            <th>Булстат</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    @foreach($importers as $importer)
        <tr>
            <td class="center"><?= $n++ ?></td>
            <td>
                {{mb_strtoupper($importer->name_en, 'UTF-8')}}
                <br>
                {{mb_strtoupper($importer->name_bg), 'UTF-8'}}
            </td>
            <td class="">
                {{mb_strtoupper($importer->address_en, 'UTF-8')}}
                <br>
                {{$importer->address_bg}}
            </td>
            <td>
                @if($importer->is_bulgarian == 0)
                    <span >BG: </span>
                @else
                    <span ></span>
                @endif
                {{$importer->vin}}
            </td>
            <td class="center last-column">
                <a href="{!!URL::to('/контрол/търговци/'.$importer->id.'/edit')!!}" class="fa fa-edit btn btn-primary my_btn"></a>
            </td> 
        </tr>
    @endforeach
    </tbody>
</table>