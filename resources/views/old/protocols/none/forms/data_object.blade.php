<?php
if(isset($protocols)){
    if($protocols->firm == 1){
        $fl = true;
        $et = false;
        $ood = false;
        $eod = false;
        $ad = false;
        $coo = false;
        $dr = false;
    }
    elseif($protocols->firm == 2){
        $fl = false;
        $et = true;
        $ood = false;
        $eod = false;
        $ad = false;
        $coo = false;
        $dr = false;
    }
    elseif($protocols->firm == 3){
        $fl = false;
        $et = false;
        $ood = true;
        $eod = false;
        $ad = false;
        $coo = false;
        $dr = false;
    }
    elseif($protocols->firm == 4){
        $fl = false;
        $et = false;
        $ood = false;
        $eod = true;
        $ad = false;
        $coo = false;
        $dr = false;
    }
    elseif($protocols->firm == 5){
        $fl = false;
        $et = false;
        $ood = false;
        $eod = false;
        $ad = true;
        $coo = false;
        $dr = false;
    }
    elseif($protocols->firm == 6){
        $fl = false;
        $et = false;
        $ood = false;
        $eod = false;
        $ad = false;
        $coo = true;
        $dr = false;
    }
    elseif($protocols->firm == 7){
        $fl = false;
        $et = false;
        $ood = false;
        $eod = false;
        $ad = false;
        $coo = false;
        $dr = true;
    }
    else{
        $fl = false;
        $et = false;
        $ood = false;
        $eod = false;
        $ad = false;
        $coo = false;
        $dr = false;
    }

    if($protocols->firm == 1){
        $name_person = $protocols->name;
        $name_firm = '';
    }
    else{
        $name_person = '';
        $name_firm = $protocols->name;
    }

    $pin = $protocols->pin;
    $bulstat = $protocols->bulstat;

    if($protocols->sex == 1){
        $male = true;
        $female = false;
        $non = false;
    }
    elseif($protocols->sex == 2){
        $male = false;
        $female = true;
        $non = false;
    }
    elseif($protocols->sex == 0){
        $male = false;
        $female = false;
        $non = true;
    }
    else{
        $male = false;
        $female = false;
        $non = false;
    }

    if(strlen($protocols->bulstat)>0){
        $bull_yes = true;
        $bull_no = false;
    }
    else{
        $bull_yes = false;
        $bull_no = true;
    }
    ///
    $owner = $protocols->owner;
    $pin_owner = $protocols->pin_owner;
    if($protocols->sex_owner == 1){
        $male_owner = true;
        $female_owner = false;
        $non_owner = false;
    }
    elseif($protocols->sex_owner == 2){
        $male_owner = false;
        $female_owner = true;
        $non_owner = false;
    }
    elseif($protocols->sex_owner == 0){
        $male_owner = false;
        $female_owner = false;
        $non_owner = true;
    }
    else{
        $male_owner = false;
        $female_owner = false;
        $non_owner = false;
    }
}
else{
    $fl = false;
    $et = false;
    $ood = false;
    $eod = false;
    $ad = false;
    $coo = false;
    $dr = false;

    $name_person = '';
    $name_firm = '';

    $pin = '';
    $bulstat = '';

    $male = false;
    $female = false;
    $non = false;

    $bull_yes = false;
    $bull_no = false;

    $owner = '';
    $pin_owner = '';
    $male_owner = false;
    $female_owner = false;
    $non_owner = false;
}
?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <fieldset class="small_field"><legend class="small_legend">?????????? ???? ??????????????/????????????</legend>
                <div class="col-md-8 col-md-6_my inspectors_divs border_divs" >
                    <label >????/??????
                        {!! Form::radio('firm', 1, $fl) !!}
                    </label>&nbsp; | &nbsp;

                    <label >????
                        {!! Form::radio('firm', 2, $et) !!}
                    </label>&nbsp; | &nbsp;

                    <label >??????
                        {!! Form::radio('firm', 3, $ood) !!}
                    </label>&nbsp; | &nbsp;

                    <label >????????
                        {!! Form::radio('firm', 4, $eod) !!}
                    </label>&nbsp; | &nbsp;

                    <label >????
                        {!! Form::radio('firm', 5, $ad) !!}
                    </label>&nbsp; | &nbsp;

                    <label >????????????????????
                        {!! Form::radio('firm', 6, $coo) !!}
                    </label>&nbsp; | &nbsp;

                    <label >??????????
                        {!! Form::radio('firm', 7, $dr) !!}
                    </label>&nbsp;
                </div>
                <div class="col-md-4 col-md-6_my inspectors_divs">
                    <p class="description" >
                        &nbsp;&nbsp;&nbsp;<span class="bold">????????????????????????!</span> ???????????? ???????? ???? ???????????????? ??????????????????????!<br>
                        &nbsp;&nbsp;&nbsp;?? "??????????" ???????? ???? ???????? ????????????, ?????????? ???????????? ?? ??.??.
                    </p>
                </div>

                <div id="firm_data" class="hidden">
                    <div class="col-md-12 col-md-6_my inspectors_divs border_divs" >
                        <div class="col-md-8 col-md-6_my" >
                            <p class="description" >?????????????? ???? ???????? ?????????? ???? ?????????????? ?????? ????, ?????? ?????? ????????! ?????????????????? ???????? ?????????????? - 4.<br/>
                                ?????? ?? ?????????????? <span class="bold">"??????????" ?????? "???????????????????? "</span> ???????????? ???? ?????????????? ?????? ???????????????????????? - ?????? ??????????????</p>
                            {!! Form::label('name_firm', ' ?????? ???? ??????????????:', ['class'=>'my_labels']) !!}
                            {!! Form::text('name_firm', $name_firm, ['class'=>'form-control form-control-my', 'size'=>40, 'maxlength'=>250 ]) !!}

                            {!! Form::label('bulstat', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ??????/??????????????:', ['class'=>'my_labels']) !!}
                            {!! Form::text('bulstat', $bulstat, ['class'=>'form-control form-control-my', 'maxlength'=>13, 'size'=>10 ]) !!}
                            &nbsp;
                            <label class="labels"><span>????: </span>
                                {!! Form::radio('bulls', 1, $bull_yes) !!}
                            </label>&nbsp;&nbsp;|
                            <label class="labels"><span>&nbsp;&nbsp;????: </span>
                                {!! Form::radio('bulls', 0, $bull_no) !!}
                            </label>
                        </div>
                        <div class="col-md-4 col-md-6_my" >
                            <p class="description" >
                                &nbsp;&nbsp;&nbsp;<span class="red bold"><i class="fa fa-warning"></i> ??????????!!!</span> ?????? ???? ???? ???????? ???????????? ???? ?????????????? ???????????????? "????"!
                            </p>
                        </div>
                    </div>

                    <div class="col-md-8 col-md-6_my" >
                        {!! Form::label('owner', '????????????????????????:&nbsp;&nbsp;&nbsp; &nbsp; ', ['class'=>'labels']) !!}
                        {!! Form::text('owner', $owner, ['class'=>'form-control form-control-my', 'maxlength'=>250, 'size'=>30 ]) !!}
                        &nbsp;
                        <label class="labels"><span>??????: </span>
                            {!! Form::radio('gender_owner', 'male', $male_owner) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels"><span>&nbsp;&nbsp;????????: </span>
                            {!! Form::radio('gender_owner', 'female', $female_owner) !!}
                        </label>&nbsp;&nbsp;|
                        {!! Form::label('pin_owner', '??????:', ['class'=>'labels']) !!}
                        {!! Form::text('pin_owner', $pin_owner, ['class'=>'form-control form-control-my', 'maxlength'=>10, 'size'=>10, 'id'=>'pin' ]) !!}&nbsp;&nbsp;

                        <label class="labels"><span>&nbsp;&nbsp;?????? ??????: </span>
                            {!! Form::radio('gender_owner', 'n', $non_owner) !!}
                        </label>
                    </div>

                    <div class="col-md-4 col-md-6_my" >
                        <p class="description" >
                            &nbsp;&nbsp;&nbsp;<span class="red bold"><i class="fa fa-warning"></i> ??????????!!!</span> ?????? ???? ???? ???????? ??????-????, ???????????????? <span class="bold">"?????? ??????"</span>!
                        </p>
                    </div>
                </div>
                <div id="person_data" class="hidden">
                    <div class="col-md-8 col-md-6_my" >
                        {!! Form::label('name', '?????? ???? ????/??????: &nbsp;', ['class'=>'labels']) !!}
                        {!! Form::text('name', $name_person, ['class'=>'form-control form-control-my', 'maxlength'=>250, 'size'=>28 ]) !!}
                        &nbsp;
                        <label class="labels"><span>??????: </span>
                            {!! Form::radio('gender', 'male', $male) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels"><span>&nbsp;&nbsp;????????: </span>
                            {!! Form::radio('gender', 'female', $female) !!}
                        </label>&nbsp;&nbsp;|
                        {!! Form::label('pin', '??????:', ['class'=>'labels']) !!}
                        {!! Form::text('pin', $pin, ['class'=>'form-control form-control-my', 'maxlength'=>10, 'size'=>10, 'id'=>'pin' ]) !!}&nbsp;&nbsp;

                        <label class="labels"><span>&nbsp;&nbsp;?????? ??????: </span>
                            {!! Form::radio('gender', 'n', $non) !!}
                        </label>
                    </div>

                    <div class="col-md-4 col-md-6_my" >
                        <p class="description" >
                            &nbsp;&nbsp;&nbsp;<span class="red bold"><i class="fa fa-warning"></i> ??????????!!!</span> ?????? ???? ???? ???????? ??????-????, ???????????????? <span class="bold">"?????? ??????"</span>!
                        </p>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>