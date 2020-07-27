<table class="table borderless">
    <thead>
    <tr>
        <th>Key Result Areas(KRA)</th>
        <th>Appraisee</th>
        <th>Appraiser</th>
    </tr>
    </thead>
    <tbody>

    @for($i=1; $i<= 5; $i++)
        <tr>
            <td>
                {!! Form::text('kpi_'.$i, null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_'.$i, null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5, 'id'=>'score_'.$i]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_'.$i, null, ['class' => 'form-control', 'disabled' ,'min'=>0, 'max'=>5]) !!}
            </td>
        </tr>
    @endfor


    @push('scripts')
        <script>
            $(function(){

            const calculateAverage = ()=>{
                let message= '';
                let score_1;
                let score_2;
                let score_3;
                let score_4;
                let score_5;
                let average = 0.0;
                if($('#score_1').val() ===''){
                    score_1 = 0;
                }else{
                    score_1 = parseInt($('#score_1').val())
                }
                if($('#score_2').val() === ''){
                    score_2 = 0;
                }else{
                    score_2 = parseInt($('#score_2').val())
                }
                if($('#score_3').val() === ''){
                    score_3 = 0;
                }else{
                    score_3 = parseInt($('#score_3').val())
                }
                if($('#score_4').val() === ''){
                    score_4 = 0;
                }else{
                    score_4 = parseInt($('#score_4').val())
                }
                if($('#score_5').val() === ''){
                    score_5 = 0;
                }else{
                    score_5 = parseInt($('#score_5').val())
                }


                average = (score_1 + score_2 + score_3 + score_4 + score_5)/5

                if(average > 3.5){
                    message = `Average so far is ${average} and You are likely to have  a DOUBLE INCREMENT`
                }else if(average >=2.0 && average <= 3.4) {
                    message = `Average so far is ${average} and You are likely to have a NORMAL INCREMENT`
                }else{
                    message = `Average so far is ${average} and You are likely to have NO INCREMENT`
                }
                if(score_1 >  5.0 || score_2 >  5.0 || score_3 >  5.0 || score_4 >  5.0 || score_5 >  5.0){
                    message ='One of your ratings exceeds 5. Please Check !!!!!'
                    $('#the_alert').addClass('alert alert-danger')
                }else{
                    $('#the_alert').removeClass('alert alert-danger')
                    $('#the_alert').addClass('alert alert-info')
                }




                    $('#the_alert').fadeIn('fast', ()=>{
                        $('#the_alert > p').text(`${message}`)

                    })


            }
            $('#score_1').keyup(()=> {
                calculateAverage()
            })
            $('#score_2').keyup(()=> {
                calculateAverage()

            })
            $('#score_3').keyup(()=> {
                calculateAverage()

            })
            $('#score_4').keyup(()=> {
                calculateAverage()

            })
            $('#score_5').keyup(()=> {
                calculateAverage()

            })

            })

        </script>

    @endpush


    </tbody>
</table>






